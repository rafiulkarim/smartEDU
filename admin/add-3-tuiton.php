<?php
include 'inc/header.php';
?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add 3 year tuition fees and credit</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if( $_GET['status'] == 'success') {
                            echo "
                            <div class='alert alert-success text-center' role='alert'>
                                Credit and tuition fees added Successfully !
                            </div>
                        ";
                        }
                        if( $_GET['status'] == 'danger') {
                            echo "<div class='alert alert-danger role='alert'>
                            Already exists this course tuition fees and credit !
                        </div>";
                        }
                        ?>
                        <div class="basic-form">
                            <form id="addTeacher" method="post" action="action.php" enctype="multipart/form-data">
                                <input type="hidden" name="add_3_tuition" value="add_3_tuition">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control " placeholder="Enter Credit" name="credit" id="name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control " placeholder="Enter tuition Fees" name="fees" id="name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
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
                                    <div class="form-group col-md-6">
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

