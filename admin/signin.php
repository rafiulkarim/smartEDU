<?php
    include "../lib/Session.php";
    Session::checklogin();
?>
<?php
    include "../config/config.php";
    include "../lib/Database.php";
    include "../helpers/format.php";

?>
<?php
    $db = new Database();
    $fm = new Format();
?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $fm->validation($_POST['email']);
    $password = $fm->validation(md5($_POST['password']));

    $email = mysqli_real_escape_string($db->link, $email);
    $password = mysqli_real_escape_string($db->link, $password);

    $query = " SELECT * FROM users WHERE email='$email' AND 
		password = '$password' ";

    $result = $db->select($query);

    if($result != false){
        $value = $result->fetch_assoc();
        Session::set("login", true);
        Session::set("name", $value['name']);
        Session::set("userId", $value['id']);
        header("Location: index.php");

    }else{
        echo "<span style='color:red;'>username or password not match !!</span>";
    }
}
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./css/style.css" rel="stylesheet">
</head>

<body class="h-100">
<div class="authincation h-100">
    <div class="container-fluid h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <h4 class="text-center mb-4">Sign in your account</h4>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label><strong>Email</strong></label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter Email">
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Password</strong></label>
                                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block" value="submit">Sign in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="./vendor/global/global.min.js"></script>
<script src="./js/quixnav-init.js"></script>
<script src="./js/custom.min.js"></script>

</body>

</html>