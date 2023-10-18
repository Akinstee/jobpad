<?php

//To handle session on this page
session_start();

if(empty($_SESSION['company_id'])){
    header("Location:dashboard.php");
}

//Include DB file
require_once("Db.php");

//If user Actually clicked on Login button
if(isset($_POST)){

    //Escape Special Characters in String
    $password = mysqli_real_escape_string($conn, $_POST ['password']);

    //sql query to check user login
    $sql = "UPDATE company SET password='$password' WHERE company_id='$_SESSION[company_id]'";
    if($conn->query($sql) === true){
        header("Location: dashboard.php");
        exit();
    }else{
        echo $conn->error;
    }

    //Close database connection. Not compulsory but good practice.
 	$conn->close();
}else{
    //redirect them back to login page if they didn't click login button
    header("Location: settings.php");
    exit();
}
?>