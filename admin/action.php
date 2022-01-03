<?php
include "../config/config.php";
include "../lib/Database.php";
$db = new Database();
// teacher
if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['add_teacher'])) {
    $name = mysqli_real_escape_string($db->link, $_POST['name']);
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $phone = mysqli_real_escape_string($db->link, $_POST['phone']);
    $designation = mysqli_real_escape_string($db->link, $_POST['designation']);
    $date = date("Y-m-d H:i:s");

    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "../images/".$unique_image;
    move_uploaded_file($file_temp, $uploaded_image);

    $query = "INSERT INTO teacher(name, email, phone, image, designation, created_at, updated_at)
                VALUES('$name', '$email', '$phone', '$unique_image','$designation','$date',
                '$date')";
    $result = $db->insert($query);
    if($result){
        header('location:add-teacher.php?status=success');
    }else{
        header('location:add-teacher.php?status=danger');
    }
}

if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['edit_teacher'])) {
    $id =  mysqli_real_escape_string($db->link, $_POST['teacherID']);
    $name = mysqli_real_escape_string($db->link, $_POST['name']);
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $phone = mysqli_real_escape_string($db->link, $_POST['phone']);
    $designation = mysqli_real_escape_string($db->link, $_POST['designation']);
    $date = date("Y-m-d H:i:s");

    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "../images/".$unique_image;
    move_uploaded_file($file_temp, $uploaded_image);

    $query = "UPDATE teacher SET
                    name='$name',
                    email='$email',
                    phone='$phone',
                    image='$unique_image',
                    designation='$designation',
                    created_at='$date',
                    updated_at='$date'
                    WHERE id='$id'";
    $result = $db->update($query);
    if($result){
        header('location:teacher-list.php?status=success');
    }else{
        header('location:teacher-list.php?status=danger');
    }
}

if(isset($_GET['teacherid'])) {
    $id = $_GET['teacherid'];
    $query = "DELETE FROM teacher WHERE id='$id'";
    $result = $db->delete($query);
    if ($result){
        header('location:teacher-list.php?status=success');
    }else{
        header('location:teacher-list.php?status=danger');
    }
}

// Course

if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['add_course'])) {
    $course = mysqli_real_escape_string($db->link, $_POST['name']);
    $date = date("Y-m-d");

    $query = "INSERT INTO Course(name, created_at, updated_at)
                VALUES('$course', '$date', '$date')";
    $result = $db->insert($query);
    if($result){
        header('location:add-course.php?status=success');
    }else{
        header('location:add-course.php?status=danger');
    }
}

if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['edit_course'])) {
    $id =  mysqli_real_escape_string($db->link, $_POST['courseID']);
    $name = mysqli_real_escape_string($db->link, $_POST['name']);
    $date = date("Y-m-d");
    $query = "UPDATE Course SET
                    name='$name',
                    created_at='$date',
                    updated_at='$date'
                    WHERE id='$id'";
    $result = $db->update($query);
    if($result){
        header('location:Course-list.php?status=success');
    }else{
        header('location:Course-list.php?status=danger');
    }
}

if(isset($_GET['courseid'])) {
    $id = $_GET['courseid'];
    $query = "DELETE FROM Course WHERE id='$id'";
    $result = $db->delete($query);
    if ($result){
        header('location:Course-list.php?status=success');
    }else{
        header('location:Course-list.php?status=danger');
    }
}

// Course Teacher
if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['add_course_teacher'])) {
    $course_id = mysqli_real_escape_string($db->link, $_POST['course']);
    $teacher_id = mysqli_real_escape_string($db->link, $_POST['teacher']);
    $date = date("Y-m-d");

    $query = "INSERT INTO course_teacher(course_id, teacher_id, created_at, updated_at)
                VALUES('$course_id', '$teacher_id', '$date', '$date')";
    $result = $db->insert($query);
    if($result){
        header('location:add-course-teacher.php?status=success');
    }else{
        header('location:add-course-teacher.php?status=danger');
    }
}

if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['edit_course_teacher'])) {
    $id = mysqli_real_escape_string($db->link, $_POST['course']);
    $course_id = mysqli_real_escape_string($db->link, $_POST['course']);
    $teacher_id = mysqli_real_escape_string($db->link, $_POST['teacher']);
    $date = date("Y-m-d");

    $query = "UPDATE course_teacher SET
                    course_id='$course_id',
                    teacher_id='$teacher_id',
                    created_at='$date',
                    updated_at='$date'
                    WHERE id='$id'";
    $result = $db->update($query);
    if($result){
        header('location:Course-teacher-list.php?status=success');
    }else{
        header('location:Course-teacher-list.php?status=danger');
    }
}

if(isset($_GET['courseteacherid'])) {
    $id = $_GET['courseteacherid'];
    $query = "DELETE FROM course_teacher WHERE id='$id'";
    $result = $db->delete($query);
    if ($result){
        header('location:Course-teacher-list.php?status=success');
    }else{
        header('location:Course-teacher-list.php?status=danger');
    }
}

// notice

if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['add_notice'])) {
    $title = mysqli_real_escape_string($db->link, $_POST['title']);
    $description = mysqli_real_escape_string($db->link, $_POST['description']);
    $date = date("Y-m-d");

    $query = "INSERT INTO notice(title, description, created_at, updated_at)
                VALUES('$title', '$description', '$date', '$date')";
    $result = $db->insert($query);
    if($result){
        header('location:add-notice.php?status=success');
    }else{
        header('location:add-notice.php?status=danger');
    }
}


if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['edit_notice'])) {
    $id = mysqli_real_escape_string($db->link, $_POST['noticeID']);
    $title = mysqli_real_escape_string($db->link, $_POST['title']);
    $description = mysqli_real_escape_string($db->link, $_POST['description']);
    $date = date("Y-m-d H:i:s");

    $query = "UPDATE notice SET
                    title='$title',
                    description='$description',
                    created_at='$date',
                    updated_at='$date'
                    WHERE id='$id'";
    $result = $db->update($query);
    if($result){
        header('location:notice-list.php?status=success');
    }else{
        header('location:notice-list.php?status=danger');
    }
}

if(isset($_GET['noticeid'])) {
    $id = $_GET['noticeid'];
    $query = "DELETE FROM notice WHERE id='$id'";
    $result = $db->delete($query);
    if ($result){
        header('location:notice-list.php?status=success');
    }else{
        header('location:notice-list.php?status=danger');
    }
}

// 3 years duration
if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['add_3_tuition'])) {
    $course_id = mysqli_real_escape_string($db->link, $_POST['course']);
    $query = "select course_id from Diploma_tuition_fees where course_id = '$course_id' ";
    $data = $db->select($query);
    if($data){
        $result = $data->fetch_assoc();
        if($result['course_id']){
            header('location:add-3-tuiton.php?status=danger');
        }
    }else{
        $credit = mysqli_real_escape_string($db->link, $_POST['credit']);
        $fees = mysqli_real_escape_string($db->link, $_POST['fees']);

        $query = "INSERT INTO Diploma_tuition_fees(course_id, credit, fees)
            VALUES('$course_id', '$credit','$fees')";
        $dresult = $db->insert($query);

        if($dresult){
            header('location:add-3-tuiton.php?status=success');
        }else{
            header('location:add-3-tuiton.php?status=danger');
        }
    }
}

if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['edit_3_tuition'])) {
    $id = mysqli_real_escape_string($db->link, $_POST['edit_3_tuition_id']);
    $course_id = mysqli_real_escape_string($db->link, $_POST['course']);
    $fees = mysqli_real_escape_string($db->link, $_POST['fees']);
    $credit = mysqli_real_escape_string($db->link, $_POST['credit']);

    $query = "UPDATE Diploma_tuition_fees SET
                    course_id='$course_id',
                    credit='$credit',
                    fees='$fees'
                    WHERE id='$id'";
    $result = $db->update($query);
    if($result){
        header('location:duration-3-list.php?status=success');
    }else{
        header('location:duration-3-list.php?status=danger');
    }
}

if (isset($_GET['duration3id'])){
    $id = $_GET['duration3id'];
    $query = "DELETE FROM Diploma_tuition_fees WHERE id='$id'";
    $result = $db->delete($query);
    if ($result){
        header('location:duration-3-list.php?status=success');
    }else{
        header('location:duration-3-list.php?status=danger');
    }
}

// 4 year duration
if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['add_4_tuition'])) {
    $course_id = mysqli_real_escape_string($db->link, $_POST['course']);
    $query = "select course_id from hsc_tuition_fees where course_id = '$course_id' ";
    $data = $db->select($query);
    if($data){
        $result = $data->fetch_assoc();
        if($result['course_id']){
            header('location:add-4-tuiton.php?status=danger');
        }
    }else{
        $credit = mysqli_real_escape_string($db->link, $_POST['credit']);
        $fees = mysqli_real_escape_string($db->link, $_POST['fees']);

        $query = "INSERT INTO hsc_tuition_fees(course_id, credit, fees)
            VALUES('$course_id', '$credit','$fees')";
        $dresult = $db->insert($query);

        if($dresult){
            header('location:add-4-tuiton.php?status=success');
        }else{
            header('location:add-4-tuiton.php?status=danger');
        }
    }
}

if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['edit_4_tuition'])) {
    $id = mysqli_real_escape_string($db->link, $_POST['edit_4_tuition_id']);
    $course_id = mysqli_real_escape_string($db->link, $_POST['course']);
    $fees = mysqli_real_escape_string($db->link, $_POST['fees']);
    $credit = mysqli_real_escape_string($db->link, $_POST['credit']);

    $query = "UPDATE hsc_tuition_fees SET
                    course_id='$course_id',
                    credit='$credit',
                    fees='$fees'
                    WHERE id='$id'";
    $result = $db->update($query);
    if($result){
        header('location:duration-4-list.php?status=success');
    }else{
        header('location:duration-4-list.php?status=danger');
    }
}

if (isset($_GET['duration4id'])){
    $id = $_GET['duration4id'];
    $query = "DELETE FROM hsc_tuition_fees WHERE id='$id'";
    $result = $db->delete($query);
    if ($result){
        header('location:duration-4-list.php?status=success');
    }else{
        header('location:duration-4-list.php?status=danger');
    }
}

// masters
if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['add_masters_tuition'])) {
    $course_id = mysqli_real_escape_string($db->link, $_POST['course']);
    $query = "select course_id from masters_tuition_fees where course_id = '$course_id' ";
    $data = $db->select($query);
    if($data){
        $result = $data->fetch_assoc();
        if($result['course_id']){
            header('location:add-4-tuiton.php?status=danger');
        }
    }else{
        $credit = mysqli_real_escape_string($db->link, $_POST['credit']);
        $fees = mysqli_real_escape_string($db->link, $_POST['fees']);

        $query = "INSERT INTO masters_tuition_fees(course_id, credit, fees)
            VALUES('$course_id', '$credit','$fees')";
        $dresult = $db->insert($query);

        if($dresult){
            header('location:masters-tuition.php?status=success');
        }else{
            header('location:masters-tuition.php?status=danger');
        }
    }
}

if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['edit_masters_tuition'])) {
    $id = mysqli_real_escape_string($db->link, $_POST['edit_masters_tuition_id']);
    $course_id = mysqli_real_escape_string($db->link, $_POST['course']);
    $fees = mysqli_real_escape_string($db->link, $_POST['fees']);
    $credit = mysqli_real_escape_string($db->link, $_POST['credit']);

    $query = "UPDATE masters_tuition_fees SET
                    course_id='$course_id',
                    credit='$credit',
                    fees='$fees'
                    WHERE id='$id'";
    $result = $db->update($query);
    if($result){
        header('location:masters-tuition.php?status=success');
    }else{
        header('location:masters-tuition.php?status=danger');
    }
}

if (isset($_GET['masterid'])){
    $id = $_GET['masterid'];
    $query = "DELETE FROM masters_tuition_fees WHERE id='$id'";
    $result = $db->delete($query);
    if ($result){
        header('location:masters-tuition.php?status=success');
    }else{
        header('location:masters-tuition.php?status=danger');
    }
}

if (isset($_GET['asmissionid'])){
    $id = $_GET['asmissionid'];
    $query = "UPDATE admission SET
                    status = 1
                    WHERE id='$id'";
    $result = $db->update($query);
    if ($result){
        header('location:admission-list.php?status=success');
    }else{
        header('location:admission-list.php?status=danger');
    }
}

