
<?php
include "config/config.php";
include "lib/Database.php";
$db = new Database();

if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['contact'])){
    $first_name = mysqli_real_escape_string($db->link, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db->link, $_POST['last_name']);
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $comments = mysqli_real_escape_string($db->link, $_POST['comments']);

    $query = "INSERT INTO contact(first_name, last_name, email, message)
              VALUES('$first_name', '$last_name', '$email', '$comments')";
    $result = $db->insert($query);

    if($result){
        header('location:contact-us.php?status=success');
    }else{
        header('location:contact-us.php?status=danger');
    }
}

// online admission
if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['admission'])){
    $fullName = mysqli_real_escape_string($db->link, $_POST['fullName']);
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $applicationForAdmission = mysqli_real_escape_string($db->link, $_POST['applicationForAdmission']);
    $applyingLevel = mysqli_real_escape_string($db->link, $_POST['applyingLevel']);
    $desiredProgram = mysqli_real_escape_string($db->link, $_POST['desiredProgram']);
    $sscPassingYear = mysqli_real_escape_string($db->link, $_POST['sscPassingYear']);
    $sscRoll = mysqli_real_escape_string($db->link, $_POST['sscRoll']);
    $sscGrade = mysqli_real_escape_string($db->link, $_POST['sscGrade']);
    $hscPassingYear = mysqli_real_escape_string($db->link, $_POST['hscPassingYear']);
    $hscRoll = mysqli_real_escape_string($db->link, $_POST['hscRoll']);
    $hscGrade = mysqli_real_escape_string($db->link, $_POST['hscRoll']);
    $address = mysqli_real_escape_string($db->link, $_POST['address']);
    $date = date("Y-m-d H:i:s");

    $query = "INSERT INTO admission(full_name, email, application_admission, applying_level, desired_program, ssc_year, ssc_roll,
                            ssc_grade, hsc_year, hsc_roll, hsc_grade, address, created_at, updated_at)
                                VALUES('$fullName', '$email', '$applicationForAdmission', '$applyingLevel',
                                       '$desiredProgram', '$sscPassingYear', '$sscRoll', '$sscGrade', 
                                       '$hscPassingYear', '$hscRoll', '$hscGrade', '$address', '$date', '$date')";
    $result = $db->insert($query);
    if ($result){
        header('location:admission.php?status=success');
    }else{
        header('location:admission.php?status=danger');
    }
}





