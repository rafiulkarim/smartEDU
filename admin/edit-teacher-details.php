<?php
    if (isset($_GET['teacherid'])){
        $id = $_GET['teacherid'];
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
                        <h4 class="card-title">Edit teacher details</h4>
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
                                $query = "select * from teacher where id = '$id'";
                                $data = $db->select($query);
                                while ($result = $data->fetch_assoc()){
                            ?>
                            <form id="addTeacher" method="post" action="action.php" enctype="multipart/form-data">
                                <input type="hidden" name="edit_teacher" value="edit_teacher">
                                <input type="hidden" name="teacherID" value="<?php echo $result['id']?>">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control " placeholder="Enter Name" name="name" id="name" value="<?php echo $result['name']?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" placeholder="Enter Email" name="email" id="email" value="<?php echo $result['email']?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control " placeholder="Enter Phone Number" name="phone" id="phone" value="<?php echo $result['phone']?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" placeholder="Enter Designation" name="designation" id="designation" value="<?php echo $result['designation']?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="file" name="image" id="image" class="form-control" value="<?php echo $result['image']?>" >
                                        <img src="../images/<?php echo $result['image']?>" width="100px" height="100px" alt="">
                                    </div>
                                    <div class="col-md-6">
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

