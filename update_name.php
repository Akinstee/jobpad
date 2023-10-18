<?php 
session_start();

require_once("Db.php");

if(empty($_SESSION['company_id'])){
    header("Location: ../index.php");
}

//if user Actually clicked login button
if(isset($_POST)){

    //Escape Special Characters in String
    $fullname = mysqli_real_escape_string($conn, $_POST ['fullname']);

    //sql query to check user login
    $sql = "UPDATE company SET fullname='$fullname' WHERE company_id='$_SESSION[company_id]'";
    if($conn->query($sql) === true){
        header("Location: company/dashboard.php");
        exit();
    }else{
        echo $conn->error;
    }

    //Close database connection.
 	$conn->close();
}else{
    //redirect them back to login page if they didn't click login button
	header("Location: settings.php");
	exit();
}

?>