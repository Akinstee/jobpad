<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        .btn-customized {
            display: block;
            margin: 15px auto; /* Center the button horizontally */
        }
    </style>
</head>
<body class="h-100">
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6 border rounded py-4 mt-5">
            <!-- Form -->
            <form class="forms" action="login_process.php" method="post">
                <h1 style="text-align: center;"><b>Login</b></h1>
                <!-- Input fields -->
                <div class="form-group row g-2">
                    <label for="email"><b>Email Address:</b></label>
                    <input type="email" class="form-control email" id="email" placeholder="email..." name="email">
                </div>
                <div class="form-group row g-2">
                    <label for="password"><b>Password:</b></label>
                    <input type="password" class="form-control password" id="password" placeholder="Password..." name="password">
                </div class="form-group">
                <button type="submit" class="btn btn-primary btn-customized col-md-4">Login</button>
                <!-- End input fields -->
            </form>
            <!-- Form end -->
        </div>
    </div>
</div>
</body>
</html>