<?php
session_start();

require_once("Db.php");

if(empty($_SESSION['company_id'])){
    header("Location: ../index.php");
    exit();
}

if(isset($_POST)){
    $sql = "UPDATE company SET active = '?' WHERE company_id='$_SESSION[company_id]'";

    if($conn->query($sql) == TRUE){
        header("Location:../logout.php");
        exit();
    }else{
        echo $conn->error;
    }
}else{
    header("Location: settings.php");
    exit();
}



?>