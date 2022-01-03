<?php
if (isset($_GET['noticeid'])){
    $id = $_GET['noticeid'];
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
                            <h4 class="card-title">Add Notice</h4>
                        </div>
                        <div class="card-body">
                            <?php
                            if( $_GET['status'] == 'success') {
                                echo "
                            <div class='alert alert-success text-center' role='alert'>
                                Successfully added notice !
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
                                    <input type="hidden" name="add_notice" value="add_notice">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control " placeholder="Enter Name" name="title" id="name" value="<?php echo $result['title']?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                        </div>
                                    </div>
                                    <textarea name="description" id="description" class="form-control " cols="30" rows="10"><?php echo $result['description']?></textarea>
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