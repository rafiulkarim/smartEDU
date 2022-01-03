<?php
if(isset($_GET['courseteacherid'])){
    $id =  $_GET['courseteacherid'];
}
?>
<?php
include 'inc/header.php';
?>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 text-center pt-4 pb-4">

            <h1 style="background: orange; padding: 5px; color: #FFFFFF">
                <?php
                $query = "Select * from Course where id = '$id'";
                $slogan = $db->select($query);
                while ($result = $slogan->fetch_assoc()){
                    ?>
                    <?php echo $result['name']; } ?> Course Teachers
            </h1>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <?php

    ?>
    <div id="teachers" class="section wb">
        <div class="container">
            <div class="row">
                <?php
                $query = "Select * from course_teacher where course_id = '$id'";
                $data = $db->select($query);
                if($data){
                    $datacollect = array();
                    while ($result = $data->fetch_assoc()){
                        array_push($datacollect, $result['teacher_id']);
                    }

                    foreach ($datacollect as $item){
                        $t_query = "Select * from teacher where id = '$item'";
                        $data = $db->select($t_query);
                        while ($result = $data->fetch_assoc()){
                ?>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="our-team">
                        <div class="team-img">
                            <img src="images/<?php echo $result['image']; ?>">
                            <div class="social">
                                <ul>
                                    <li><a href="#" class="fa fa-facebook"></a></li>
                                    <li><a href="#" class="fa fa-twitter"></a></li>
                                    <li><a href="#" class="fa fa-linkedin"></a></li>
                                    <li><a href="#" class="fa fa-skype"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content">
                            <a href="teacher-details.php?teacherid=<?php echo $result['id']?>">
                                <h3 class="title"><?php echo $result['name']; ?></h3>
                                <span class="post"><?php echo $result['email']; ?></span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php } } }else{ ?>
                    <p>No Data found</p>
                <?php } ?>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
<?php
include 'inc/footer.php';
?>