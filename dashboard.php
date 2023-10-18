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
                <nav class="nav flex-column mt-3">
                    <a href="dashboard.php" class="nav-link active"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    <a href="edit_company.php" class="nav-link active"><i class="fas fa-user-edit"></i>Company Profile</a>
                    <a href="add_job.php" class="nav-link active"><i class="fas fa-plus"></i>Add New Job</a>
                    <!-- <a href="dashboard.php" class="nav-link active"><i class="fas fa-building"></i>Company Profile</a> -->
                    <a href="dashboard.php" class="nav-link active"><i class="fas fa-eye"></i>View Jobs</a>
                    <a href="job_application.php" class="nav-link active"><i class="fas fa-file-alt"></i>Job Application</a>
                    <!-- <a href="change_password.php" class="nav-link active"><i class="fas fa-plus"></i>Change Password</a> -->
                    <a href="settings.php" class="nav-link active"><i class="fas fa-spanner"></i>Settings</a>
                    <a href="resume.php" class="nav-link active"><i class="fas fa-spanner"></i>Resume</a>
                    <a href="../logout.php" class="nav-link active"><i class="fas fa tachometer-alt"></i>Logout</a>
                </nav>
            </div>
            <div class="col-md-9 col-lg-10 main-content">
                <div class="card">
                    <div class="card-header">
                        <h1>Welcome <?php echo $companyName; ?></h1>
                    </div>
                    <div class="cards">
                        <div class="card col-md-3">
                            <h2>Jobs Posted <br> <?php echo $totalJobPostings; ?></h2>
                        </div>
                        <div class="card col-md-3">
                            <h2>Number of active job postings <br> <?php echo $activeJobPostings; ?></h2>
                        </div>
                        <div class="card col-md-3">
                            <h2>Number of Applications Submitted <br> <?php echo $totalJobApplications; ?></h2>
                        </div>
                        <div class="card col-md-3">
                            <h2>Jobs Posted <?php echo $totalJobPostings; ?></h2>
                        </div>
                        <div class="company-overview col-md-12">
                            <h2>Company Overview</h2>
                            <p>This is a brief overview of the company <?php echo $companyOverview; ?></p>
                        </div>
                        <div class="recent-applicants col-md-6">
                            <h2>Recent Applicants</h2>
                            <table border="1">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                </tr>
                                <?php foreach($recentApplicants as $applicant) { ?>
                                    <tr>
                                        <td><?php echo $applicant['fullname']?></td>
                                        <td><?php echo $applicant['email']?></td>
                                        <td><?php echo $applicant['phone']?></td>
                                    </tr>
                                    <?php }?>
                            </table>
                        </div>
                        <div class="recent-notifications col-md-6">
                            <h2>Recent Posts Applied For</h2>
                            <table border="1">
                                <tr>
                                    <th>Job Title</th>
                                    <th>Applicant Name</th>
                                    <th>Status</th>
                                </tr>
                                <?php foreach ($recentNotifications as $notification) {?>
                                    <tr>
                                        <td><?php echo $notification['job_title']?></td>
                                        <td><?php echo $notification['applicant_name']?></td>
                                        <td><?php echo $notification['status']?></td>
                                    </tr>
                                    <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    

</body>
</html>