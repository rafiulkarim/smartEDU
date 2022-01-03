<?php
if(isset($_GET['noticeid'])){
    $id =  $_GET['noticeid'];
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
            $query = "Select * from notice where id = '$id'";
            $slogan = $db->select($query);
            while ($result = $slogan->fetch_assoc()){
                ?>
                <?php echo $result['title']; ?>
        </h1>
    </div>
    <div class="col-sm-4"></div>
</div>
<div class="container pb-5">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8" style="background: #4c5a7d; color: #FFFFFF">
            <div class="p-3">
                <p style="color: #FFFFFF"><?php echo $result['description']; ?></p>
            </div>
            <?php } ?>
        </div>
        <div class="col-md-2">

        </div>
    </div>
</div>

<?php
    include 'inc/footer.php';
?>