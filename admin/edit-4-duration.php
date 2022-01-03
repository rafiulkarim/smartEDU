<?php
    if (isset($_GET['duration4id'])){
        $id = $_GET['duration4id'];
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
                        <h4 class="card-title">Edit 4 years tuition and Credit list</h4>
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
                            <?php
                            $query = "select Course.name as CName,Course.id as cid, hsc_tuition_fees.id as id,
                                      hsc_tuition_fees.credit as dCredit, hsc_tuition_fees.fees as Fees
                                        from hsc_tuition_fees
                                      INNER JOIN Course on Course.id = hsc_tuition_fees.course_id where hsc_tuition_fees.id = '$id'";
                            $data = $db->select($query);
                            $result = $data->fetch_assoc();
                            ?>
                            <form id="addTeacher" method="post" action="action.php" enctype="multipart/form-data">
                                <input type="hidden" name="edit_4_tuition" value="edit_4_tuition">
                                <input type="hidden" name="edit_4_tuition_id" value="<?php echo $result['id']?>">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control " placeholder="Enter Credit" name="credit" id="name" value="<?php echo $result['dCredit'] ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control " placeholder="Enter tuition Fees" name="fees" id="name" value="<?php echo $result['Fees']?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <select class="form-control" name="course">
                                            <option selected value="<?php echo $result['cid']?>"><?php echo $result['CName']?></option>
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

