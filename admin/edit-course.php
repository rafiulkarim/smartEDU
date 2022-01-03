<?php
if (isset($_GET['courseid'])){
    $id = $_GET['courseid'];
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
                        <h4 class="card-title">Edit Course</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if( $_GET['status'] == 'success') {
                            echo "
                            <div class='alert alert-success text-center' role='alert'>
                                Successfully Edited !
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
                            $query = "select * from Course where id = '$id'";
                            $data = $db->select($query);
                            while ($result = $data->fetch_assoc()){
                                ?>
                                <form id="addTeacher" method="post" action="action.php" enctype="multipart/form-data">
                                    <input type="hidden" name="edit_course" value="edit_course">
                                    <input type="hidden" name="courseID" value="<?php echo $result['id']?>">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control " placeholder="Enter Name" name="name" id="name" value="<?php echo $result['name']?>">
                                        </div>
                                        <div class="form-group col-md-6">
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

