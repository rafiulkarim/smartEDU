
<?php
include 'inc/header.php';
?>
<div class="content-body">
    <div class="container-fluid">
        <?php
        if( $_GET['status'] == 'success') {
            echo "
                            <div class='alert alert-success text-center' role='alert'>
                                Your action Successfully done!
                            </div>
                        ";
        }
        if( $_GET['status'] == 'danger') {
            echo "<div class='alert alert-danger role='alert'>
                            Something went wrong !
                        </div>";
        }
        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">4 years tuition and Credit list</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-sm">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course</th>
                                    <th>Credit</th>
                                    <th>Tuition fees</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query = "select Course.name as CName, hsc_tuition_fees.id as id,
                                          hsc_tuition_fees.credit as credit, hsc_tuition_fees.fees as fees
                                            from hsc_tuition_fees
                                          INNER JOIN Course on Course.id = hsc_tuition_fees.course_id order by id desc";
                                $data = $db->select($query);
                                if ($data){
                                    $i = 0;
                                    while ($result = $data->fetch_assoc()){
                                        $i++;
                                        ?>
                                        <tr>
                                            <td class="text-dark"><?php echo $i; ?></td>
                                            <td class="text-dark"><?php echo $result['CName']; ?></td>
                                            <td class="text-dark"><?php echo $result['credit']; ?></td>
                                            <td class="text-dark"><?php echo $result['fees']; ?></td>
                                            <td>
                                                <a href="edit-4-duration.php?duration4id=<?php echo $result['id']?>" class="btn btn-outline-primary">Edit</a>
                                                <a href="action.php?duration4id=<?php echo $result['id']?>" class="btn btn-outline-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } } else{ ?>
                                    <p>No data found</p>
                                <?php } ?>
                                </tbody>
                            </table>
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

