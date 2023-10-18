<?php
require("fetch_data.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company DashBoard</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="test3.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 sidebar">
                <div class="d-flex flex-column align-items-center">
                    <img src="img.jpg" alt="" class="img-fluid">
                    <h3 class="mt-3"><?php echo $companyName ?></h3>
                </div>
                <nav class="nav flex-column mt-3"><a href="dashboard.php" class="nav-link active"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    <a href="dashboard.php" class="nav-link active"><i class="fas fa-user-edit"></i>Edit Profile</a>
                    <a href="dashboard.php" class="nav-link active"><i class="fas fa-building"></i>Company Profile</a>
                    <a href="dashboard.php" class="nav-link active"><i class="fas fa-eye"></i>View Jobs</a>
                    <a href="dashboard.php" class="nav-link active"><i class="fas fa-file-alt"></i>Application</a>
                    <a href="add_job.php" class="nav-link active"><i class="fas fa-plus"></i>Add New Job</a>
                    <a href="change_password.php" class="nav-link active"><i class="fas fa-plus"></i>Change Password</a>
                    <a href="settings.php" class="nav-link active"><i class="fas fa-spanner"></i>Settings</a>
                    <a href="../logout.php" class="nav-link active"><i class="fas fa tachometer-alt"></i>Logout</a>
                </nav>
            </div>
            <div class="col-md-9 col-lg-10 main-content">
                <div class="card">
                  <h1>Welcome <?php echo $companyName; ?></h1>
                  <h2><i>Account Settings</i></h2>
                            <p>You can Update your Company Profile here</p>
                            <div class="row">
                                <div class="col-md-6">
                                        <form action="update_name.php" method="post"><div class="form-group">
                                                <label for="fullname"><b>Company Name</b></label>
                                                <input type="text" class="form-control input-lg mt-3" name="fullname">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-flat btn-primary btn-lg mt-3">Change Name</button>
                                            </div>
                                        </form>
                                </div>
                                <div class="col-md-6">
                                    <form action="change_password.php" id="changePassword" method="post">
                                        <div class="form-group">
                                            <input class="form-control input-lg mt-3" type="password" name="password" id="password" placeholder="password" required>
                                        </div>
                                        <div class="form-group">
                                            <input id="cpassword" class="form-control input-lg mt-3" type="password" placeholder="Confirm password" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class=" btn btn-success btn-lg  mt-3">Change Password</button>
                                        </div>
                                        <div id="passwordError" class="color-red text-center hide-me">Mismatch Password !!
                                        </div>
                                    </form>   
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="deactivate.php" method="post">
                                        <label for="deactivate"><input type="checkbox" name="deactivate" id="deactivate"> I want to Deactivate My Account
                                        </label>
                                        <br>
                                        <button class="btn btn-danger btn-flat btn-lg">Deactivate My Account</button>
                                    </form>
                                </div>
                            </div>
                      

                </div>
            </div>
        </div>
    </div>
      <script src="assets/jquery.js"></script>
      <script>
       $("#changePassword").on("submit", function(e){
        e.preventDefault();
        if($('#password').val() !=$('#cpassword').val()){
            $('#passwordError').show();
        }else{
            $(this).unbind('submit').submit();
        }
        });

    </script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>



<?php
session_start();

require_once("Db.php");

// Get the company ID from the session
$companyId = $_SESSION['company_id'];

// Prepare the SQL statement
$sql = 'SELECT * FROM company WHERE company_id = :company_id';

// Bind the company ID to the prepared statement
$stmt = $conn->prepare($sql);
$stmt->bindParam(':company_id', $companyId);

// Execute the prepared statement
$stmt->execute();

// Get the company data
$company = $stmt->fetch();

// ...
?>


