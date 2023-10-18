<?

session_start();
if(empty($_SESSION['company_id'])){
    header("Location: dashboard.php");
    exit();
}

require_once("./classes/db.php");


//if user clicked on the update profile button
if(isset($_POST)){
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $website = mysqli_real_escape_string($conn, $_POST['website']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $lga = mysqli_real_escape_string($conn, $_POST['lga']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $contactno = mysqli_real_escape_string($conn, $_POST['contactno']);
    $aboutme = mysqli_real_escape_string($conn, $_POST['aboutme']);

    
    
    $uploadOk = true;

    if(is_uploaded_file ($_FILES['image']['tmp_name'])){
        $folder_dir = "../upload/logo";

        $base = basename($_FILES['image']['name']);

        $imageFIleType = pathinfo($base, PATHINFO_EXTENSION);

        $file = uniqid() . "." . $imageFIleType;

        $filename = $folder_dir .$file;

        if(file_exists($_FILES['image']['tmp_name'])){
            if($imageFIleType == "jpg" || $imageFIleType == "png"){
                if($_FILES['image']['size']< 500000){ //File Size is less than 5mb
                    //if all conditions are met, then copy file from server tmp to upload folder
                    move_uploaded_file($_FILES['image']['tmp_name'], $filename);
                }else{
                    $_SESSION['uploadError'] = "Wrong Image Size. Max Size Allowed: 5mb";
                    header("Location: edit_company.php");
                    exit();
                }
            }else{
                $_SESSION['uploadError'] = "Wrong Format. Only jpg & png Allowed";
                    header("Location: edit_company.php");
                    exit();
            }
        }
    }else{
        $uploadOk = false;
    }


    //Update User Details Query
    $sql = "UPDATE company SET fullname = '$fullname', website='$website', email='$email', lga='$lga', state='$state', contactno='$contactno', aboutme='$aboutme'";

    if($uploadOk == true){
        $sql = $sql . ", logo='$file'";
    }

    $sql = $sql. "WHERE company_id= '$_SESSION[company_id]'";

    if($conn->query($sql) == TRUE){
        $_SESSION['fullname'] = $fullname;

        //if data updated successfully, then redirect to dashboard
        header("Location: dashboard.php");
        exit();
    }else{
        echo "Error ". $sql . "<br>" . $conn->error;
    }
    $conn->close();
}else{
    header("Location: edit_company.php");
    exit();
}




?>