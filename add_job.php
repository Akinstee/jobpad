<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
//Start Session
session_start();
$company_id = $_SESSION['company_id'];

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
                  <div class="container border rounded py-3 mt-3">
                            <h2 style="text-align:center;"><b>Add A Job</b></h2>
                            <form action="job_process.php" method="post" class="row row-cols-lg" style="align-items:center;"> 
                                <div class="row g-2">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="job_title"><b>Job Title</b></label>
                                            <input type="text" class="form-control" name="job_title" id="job_title" placeholder="Job Title">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="job_description"><b>Job Description</b></label>
                                            <input type="text" class="form-control" name="job_description" id="job_description" placeholder="Job Description">
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="job_level"><b>Job Level</b></label>
                                            <input type="text" class="form-control" name="job_level" id="job_level" placeholder="Job Level">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="form-group" for="specificSizeSelect"><b>Job Function</b></label>
                                        <select class="form-select" id="specificSizeSelect" name="job_function">
                                        <option selected><b>Job Function</b></option>
                                        <option value="1" name="job_function"><b>IT</b></option>
                                        <option value="2" name="job_function"><b>Management</b></option>
                                        <option value="3" name="job_function"><b>Education</b></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row g-2">
                                    <div class="col">
                                        <label class="form-group" for="specificSizeSelect"><b>State</b></label>        
                                        <select class="form-select specificSizeSelect" name="state" id="stateid">
                                        <option value="">SELECT STATE</option>
                                        <?php foreach ($states as $state) { ?>
                                            <option value="<?php echo $state['state_id']; ?>"><?php echo $state['state_name']; ?></option>
                                        <?php } ?>
                                        </select>

                                    </div>
                                    <div class="col">
                                        <label class="form-group" for="specificSizeSelect"><b>Select Lga</b></label>
                                        <select class="form-select specificSizeSelect" id="specificSizeSelect" name="lga" id="lga">
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="row g-2">
                                    <div class="col">
                                        <label class="form-group" for="specificSizeSelect"><b>Employment Type</b></label>
                                            <select class="form-select" name="employment_type" id="employment">
                                            <option selected><b>Employment Type</b></option>
                                            <option value="employment_type"><b>Internship</b></option>
                                            <option value="employment_type"><b>Part Time</b></option>
                                            <option value="employment_type"><b>Full Time</b></option>
                                            </select>
                                    </div>
                                    <div class="col">
                                        <label class="form-group" for="specificSizeSelect"><b>Location Type</b></label>
                                            <select class="form-select" name="location_type" id="location_type">
                                            <option selected><b>location Type</b></option>
                                            <option value="location_type"><b>Remote</b></option>
                                            <option value="location_type"><b>Hybrid</b></option>
                                            <option value="location_type"><b>Onsite</b></option>
                                            </select>
                                    </div>
                                </div>

                                <div class="row g-2">
                                    <div class="col">
                                        <label class="form-group" for="maximum_salary"><b>Minimum Salary</b></label>
                                        <input type="number" min="1000" max="1000000" class="form-control" name="minimumsalary" id="minimumsalary" placeholder="Minimum Salary" required="">
                                    </div>
                                    <div class="col">
                                        <label class="form-group" for="maximumsalary"><b>Maximum Salary</b></label>
                                        <input type="number" min="1000" max="1000000" class="form-control" name="maximumsalary" id="maximumsalary" placeholder="Maximum Salary" required="">
                                    </div>
                                </div>

                                <div class="row g-2">
                                    <div class="col">
                                        <label class="form-group" for="experience"><b>Experience</b></label>
                                        <input type="number" min="1000" max="1000000" class="form-control" name="experience" id="experience" placeholder="experience" required="">
                                    </div>
                                    <div class="col">
                                        <label class="form-group" for="specificSizeSelect"><b>Qualification</b></label>
                                            <select class="form-select" name="qualification" id="qualification">
                                            <option selected><b>Qualification</b></option>
                                            <option value="qualification"><b>High School</b></option>
                                            <option value="qualification"><b>Diploma</b></option>
                                            <option value="qualification"><b>Bachelor Degree</b></option>
                                            <option value="qualification"><b>Masters' Degree</b></option>
                                            </select>
                                    </div>
                                </div>
                                <br>
                                <div class=" form-group col-12 g-3 text-center">
                                <button type="submit" class="btn btn-success col-md-4"><b>Sign in</b></button>
                                </div>  
                            </form>
                        </div>
                      

                </div>
            </div>
        </div>
    </div>
      <script src="assets/jquery.js"></script>
      <script>
    $(document).ready(function() {
      $('#stateid').on('change', function() {
        var state_id = $(this).val();
        $.ajax({
          url: 'get_lgas.php',
          type: 'GET',
          data: {
            state_id: state_id
          },
          success: function(data) {
            $('#lga').empty();
            $.each(data, function(key, value) {
              $('#lga').append('<option value="' + key + '">' + value + '</option>');
            });
          }
        });
      });
    });
  </script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>