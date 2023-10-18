<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobPad</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="index.php" class="logo logo-bg">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>J</b>P</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Job</b> Pad</span>
            </a>

            <nav class="navbar navbar-static-top">
                <!--Navbar Right Menu-->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                    </ul>
                </div>
            </nav>
        </header>

        <div class="content-wrapper" style="margin-left: 0px;">

            <section id="applicants" class="content-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="box box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Welcome <b><?php echo $_SESSION['fullname']; ?> </b>
                                    </h3>
                                </div>
                                <div class="box-body no-padding">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                                        <li><a href="edit_company.php"><i class="fa fa-tv"></i> My Company</a></li>
                                        <li><a href="add_job.php"><i class="fa fa-file-o"></i> Add Job</a></li>
                                        <li><a href="job_post.php"><i class="fa fa-file-o"></i> My Job Posts</a></li>
                                        <li><a href="job_application.php"><i class="fa fa-file-o"></i> Job Application</a></li>
                                        <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                                        
                                        <li><a href="resume.php"><i class="fa fa-user"></i> Resume</a></li>
                                        <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 bg-white padding-3">
                            <h2><i>Account Settings</i></h2>
                            <p>You can Update your Company Profile here</p>
                            <div class="row">
                                <div class="col-md-6">
                                        <form action="update_name.php" method="post"><div class="form-group">
                                                <label for="fullname">Company Name</label>
                                                <input type="text" class="form-control input-lg" name="fullname">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-flat btn-primary btn-lg">Change Name</button>
                                            </div>
                                        </form>
                                </div>
                                <div class="col-md-6">
                                    <form action="change_password.php" id="changepassword" method="post">
                                        <div class="form-group">
                                            <input class="form-control input-lg g-3" type="password" name="password" id="password" placeholder="password" required>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control input-lg g-3" type="password" id="cpassword" placeholder="password" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-lg">Change Password</button>
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
                                        <label for="deactivate"><input type="checkbox" name="deactivate" id="deactivate"> I want to Deactivate My Account</label>
                                        <button class="btn btn-danger btn-flat btn-lg">Deactivate My Account</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
    
        
    
    
        </div>
        <div class="control-sidebar-bg"></div>
    </div>
    <script>
        $("#changepassword").on("submit", function(e){
            e.preventDefault();
            if($('#password').val() !=$('#cpassword').val()){
                $('#passwordError').show();
            }else{
                $(this).unbind('submit').submit();
            }
        });
    </script>
</body>
</html>