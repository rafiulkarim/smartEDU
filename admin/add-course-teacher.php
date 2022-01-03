<?php
include 'inc/header.php';
?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Course Teacher</h4>
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
                            <form id="addTeacher" method="post" action="action.php" enctype="multipart/form-data">
                                <input type="hidden" name="add_course_teacher" value="add_course_teacher">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <select class="form-control" name="course">
                                                <option disabled selected>-- Select Course --</option>
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
                                                <option disabled selected>-- Select Teacher --</option>
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

