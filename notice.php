<?php
    include "helpers/format.php";
    $fm = new Format();
?>
<?php
include 'inc/header.php';
?>

<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center pt-4">
        <h1 style="background: orange; padding: 5px; color: #FFFFFF">
            Notice Board
        </h1>
    </div>
    <div class="col-sm-4"></div>
</div>
    <div id="overviews" class="section wb">
        <div class="container">

            <div class="row">
                <?php
                    $query = "select * from notice order by id desc";
                    $data = $db->select($query);
                    while ($result = $data->fetch_assoc()){
                ?>
                <div class="col-lg-4 col-md-6 col-12 pb-4">
                    <div class="blog-item">
                        <div class="blog-title">
                            <h2><a href="single-notice.php?noticeid=<?php echo $result['id']?>" title=""><b><?php echo $result['title']?></b></a></h2>
                        </div>
                        <div class="blog-desc">
                            <p><?php echo $fm->testShorten($result['description'])?></p>
                        </div>
                        <div class="blog-button">
                            <a class="hover-btn-new orange" href="single-notice.php?noticeid=<?php echo $result['id']?>"><span>Read More<span></a>
                        </div>
                    </div>
                </div><!-- end col -->
                <?php }?>
            </div><!-- end row -->
        </div>
    </div>
<?php
include 'inc/footer.php';
?>