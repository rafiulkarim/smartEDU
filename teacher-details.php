<?php
if(isset($_GET['teacherid'])){
    $id =  $_GET['teacherid'];
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
                $query = "Select * from teacher where id = '$id'";
                $slogan = $db->select($query);
                while ($result = $slogan->fetch_assoc()){
                    ?>
                    <?php echo $result['name']; ?>
            </h1>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <div class="container pb-5">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <img src="images/<?php echo $result['image']; ?>" style="object-fit: cover" alt="">
            </div>
            <div class="col-md-4" style="background: #4c5a7d; color: #FFFFFF">
                <div class="p-3">
                    <h4 style="color: #FFFFFF">Email: <?php echo $result['email']; ?></h4>
                    <h3 style="color: #FFFFFF">Phone: <?php echo $result['phone']; ?></h3>
                    <b>Designation: <?php echo $result['designation']; ?></b>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
<?php
include 'inc/footer.php';
?>