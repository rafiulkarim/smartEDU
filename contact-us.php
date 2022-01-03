
<?php
    include 'inc/header.php';

?>

    <div id="contact" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Need Help? Sure we are Online!</h3>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-xl-6 col-md-6 col-sm-6">
                    <?php
                    if( $_GET['status'] == 'success') {
                        echo "<div class='alert alert-success role='alert'>
                                Successfully Submit !
                            </div>";
                    }
                    if( $_GET['status'] == 'danger') {
                        echo "<div class='alert alert-danger role='alert'>
                                Something went wrong !
                            </div>";
                    }
                    ?>
                    <div class="contact_form">
                        <div id="message"></div>
                        <form id="contactform" action="contact-action.php" method="post">
                            <input type="hidden" name="contact">
                            <div class="row row-fluid">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Your Email">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <textarea class="form-control" name="comments" id="comments" rows="6" placeholder="Give us more details.."></textarea>
                                </div>
                                <div class="text-center pd">
                                    <button type="submit" value="submit" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Get a Quote</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- end col -->
                <div class="col-md-3"></div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
<?php
    include 'inc/footer.php';
?>
