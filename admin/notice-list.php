
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
                        <h4 class="card-title">Notice List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-sm">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query = "select * from notice order by id desc";
                                $data = $db->select($query);
                                if ($data){
                                    $i = 0;
                                    while ($result = $data->fetch_assoc()){
                                        $i++;
                                        ?>
                                        <tr>
                                            <td class="text-dark"><?php echo $i; ?></td>
                                            <td class="text-dark"><?php echo $result['title']; ?></td>
                                            <td class="text-dark"><?php echo $fm->testShorten($result['description']); ?></td>
                                            <td>
                                                <a href="edit-notice.php?noticeid=<?php echo $result['id']?>" class="btn btn-outline-primary">Edit</a>
                                                <a href="action.php?noticeid=<?php echo $result['id']?>" class="btn btn-outline-danger">Delete</a>
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

