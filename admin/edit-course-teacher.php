<?php
    if (isset($_GET['courseteacherid'])){
        $id = $_GET['courseteacherid'];
    }
?>
<?php
include 'inc/header.php';
?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Course Teacher</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if( $_GET['status'] == 'success') {
                            echo "
                            <div class='alert alert-success text-center' role='alert'>
                                Course Teacher added Successfully !
                            </div>
                        ";
                        }
                        if( $_GET['status'] == 'danger') {
                            echo "<div class='alert alert-danger role='alert'>
                            Something went wrong !
                        </div>";
                        }
                        ?>
                        <div class="basic-form">
                            <?php
                            $cquery = "select Course.name as cName, Course.id as courseId, teacher.name as Name,
                                            teacher.id as teacherId, course_teacher.id as course_teacher_id from course_teacher
                                           INNER JOIN Course ON Course.id = course_teacher.course_id 
                                           INNER JOIN teacher ON teacher.id = course_teacher.teacher_id where course_teacher.id='$id'";
                            $data = $db->select($cquery);
                            while ($qresult=$data->fetch_assoc()){

                            ?>
                            <form id="addTeacher" method="post" action="action.php" enctype="multipart/form-data">
                                <input type="hidden" name="edit_course_teacher" value="edit_course_teacher">
                                <input type="hidden" name="course_teacher_id" value="<?php echo $qresult['course_teacher_id']?>">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" name="course">
                                                <option selected value="<?php echo $qresult['courseId'];?>" ><?php echo $qresult['cName'];?></option>
                                                <option disabled >-- Select Course --</option>
                                                <?php
                                                $query = "select * from Course";
                                                $data = $db->select($query);
                                                if ($data){
                                                    while ($result = $data->fetch_assoc()){
                                                        ?>
                                                        <option value="<?php echo $result['id']?>"><?php echo $result['name']?></option>
                                                <?php } }else{?>

                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" name="teacher">
                                                <option selected value="<?php echo $qresult['teacherId']?>"><?php echo $qresult['Name'];?></option>
                                                <option disabled >-- Select Teacher --</option>
                                                <?php
                                                $query = "select * from teacher";
                                                $data = $db->select($query);
                                                if ($data){
                                                    while ($result = $data->fetch_assoc()){
                                                        ?>
                                                        <option value="<?php echo $result['id']?>"><?php echo $result['name']?></option>
                                                    <?php } }else{?>

                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-2 pl-2">
                                    <button class="btn btn-primary" type="submit" value="submit">Submit</button>
                                </div>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include 'inc/footer.php';
?>

