<?php
    include "config/config.php";
    include "lib/Database.php";
    $db = new Database();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>SmartEDU - Education Responsive HTML5 Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico"/>
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="host_version">
    <!-- Modal -->

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader-container">
            <div class="progress-br float shadow">
                <div class="progress__item"></div>
            </div>
        </div>
    </div>
    <!-- END LOADER -->

    <!-- Start header -->
    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="images/logo.png" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-host">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="index.php">About Us</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Course </a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <?php
                                    $query = "Select * from Course";
                                    $slogan = $db->select($query);
                                    if($slogan){
                                    while($result = $slogan->fetch_assoc()) {
                                        ?>
                                        <a class="dropdown-item" href="course-details.php?courseid=<?php echo $result['id']?>"><?php echo $result['name']?></a>
                                <?php }} else{ ?>
                                        No data available
                                <?php }?>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Teachers </a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <?php
                                $query = "Select * from Course";
                                $slogan = $db->select($query);
                                if($slogan){
                                while($result = $slogan->fetch_assoc()) {
                                    ?>
                                    <a class="dropdown-item" href="course-teacher.php?courseteacherid=<?php echo $result['id']?>"><?php echo $result['name']?></a>
                                <?php }} else{ ?>
                                    No data available
                                <?php } ?>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="notice.php">Notice</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="hover-btn-new log orange" href="admission.php"><span>Online Admission</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->