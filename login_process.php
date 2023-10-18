<?php

//Start Session
session_start();

//Include DB
include_once("classes/Db.php");

    
    //Get Company input/Credentials
    $email = $_POST['email'];
    $password = $_POST['password'];

    //validate input and check for empty fileds
    if(empty($email) || empty($password)){
        //Handle the case of empty fileds
        echo "Both Email and Password are required";
        exit();
    }

    //Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    //Verify Company Credentials using a prepared statement
    $stmt = $conn->prepare("SELECT company_id, password FROM company WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 1){
        //Company found, fetch the stored hashed password
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];

        //Vaerify the Password
        if(password_verify($password, $storedPassword)){
            //Start a session
            session_start();

            //Store the company information in the session
            $_SESSION['company_id'] = $row['company_id'];
            $_SESSION['email'] = $email;

            //Redirect the user to the main page of the website
            header("Location: dashboard.php");
        }else{
            //Password is incorrect
            echo "Invalid Password";
        }

    }else{
        //Company Not Found
        echo "Invalid Email or Password";
    }

    $stmt->close();
    $conn->close();
?>