<?php 

session_start();

require_once("classes/Db.php");


// ['job_title'], $_POST['job_description'], $_POST['job_level'], $_POST['job_function'], $_POST['state'], $_POST['lga'], $_POST['employment_type'], $_POST['location_type'], $_POST['minimumsalary'], $_POST['maximumsalary'], $_POST['experience'], $_POST['qualification']

//if user actually login

if(isset($_POST)){

    //Prepare the SQL Statement
    $sql = "INSERT INTO job_posts(job_post_company_id, job_title, job_description, job_level, job_function, state, lga, employment_type, location_type, minimumsalary, maximumsalary, experience, qualification) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    //Prepare the statement
    $stmt = $conn->prepare($sql);

    //Bind the parameters to the statement
    $stmt->bind_param("issssss", $_SESSION['company_id'], $job_title, $job_description, $job_level, $job_function, $state, $lga, $employment_type, $location_type, $minimumsalary, $maximumsalary, $experience, $qualification);

    //Get the value from the post request

    $job_title = mysqli_real_escape_string($conn, $_POST['job_title']);
    $job_description = mysqli_real_escape_string($conn, $_POST['job_description']);
    $job_level = mysqli_real_escape_string($conn, $_POST['job_level']);
    $job_function = mysqli_real_escape_string($conn, $_POST['job_function']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $lga = mysqli_real_escape_string($conn, $_POST['lga']);
    $employment_type = mysqli_real_escape_string($conn, $_POST['employment_type']);
    $location_type = mysqli_real_escape_string($conn, $_POST['location_type']);
    $minimumsalary = mysqli_real_escape_string($conn, $_POST['minimumsalary']);
    $maximumsalary = mysqli_real_escape_string($conn, $_POST['maximumsalary']);
    $experience = mysqli_real_escape_string($conn, $_POST['experience']);
    $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);

    //execute stamtent
    $stmt->execute();

    //Check if the statement was execute successfully
    if($stmt->affected_rows ==1){
        //If the data was inserted successfully, then redirect to dashboard
        $_SESSION['jobPostSuccess'] =true;
        header("Location: dashboard.php");
        exit();
    }else{
        //If data failed to insert, then show Error
        echo "Error";
    }

    //Close the statement
    $stmt->close();

    //Close Database Connection
    $conn->close();
}else{

    //Redirect them back to the dashboar page if they didn't click on Add Post button
    header("Location: Add_job.php");
    exit();
}

?>