
<?php
include 'inc/header.php';
?>

    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 text-center pt-4">
            <h1 style="background: orange; padding: 5px; color: #FFFFFF">
                Admission From
            </h1>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <div id="overviews" class="section wb">
        <div class="container">

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8" >
                    <?php
                    if( $_GET['status'] == 'success') {
                        echo "
                            <div class='alert alert-success text-center' role='alert'>
                                Admission Success! Authority will confirm you...
                            </div>
                        ";
                    }
                    if( $_GET['status'] == 'danger') {
                        echo "<div class='alert alert-danger role='alert'>
                            Something went wrong !
                        </div>";
                    }
                    ?>
                    <div style="border: 3px solid #4c5a7d; border-radius: 10px">
                        <div class="p-3">
                            <form role="form" class="form-horizontal" id="onlineAdmission" action="contact-action.php" method="post">
                                <input type="hidden" name="admission">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input class="form-control" id="fullName" placeholder="Full Name" name="fullName" type="text" style="color: #1b1e21">
                                            </div>
                                            <div class="col-sm-6">
                                                <input class="form-control" id="email1" placeholder="email" name="email" type="email" style="color: #1b1e21">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <select class="form-select form-control form-select-lg mb-3" name="applicationForAdmission" aria-label=".form-select-lg example" id="applicationForAdmission" style="color: #1b1e21">
                                                    <option disabled selected>Application for Admission</option>
                                                    <option value="Spring (Jan-Apr)">Spring (Jan-Apr)</option>
                                                    <option value="Summer (May-Aug)">Summer (May-Aug)</option>
                                                    <option value="Fall (Sep-Dec)">Fall (Sep-Dec)</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <select class="form-select form-control form-select-lg mb-3" name="applyingLevel" aria-label=".form-select-lg example" id="applyingLevel" style="color: #1b1e21">
                                                    <option disabled selected>Applying Level</option>
                                                    <option value="Bachelor">Bachelor</option>
                                                    <option value="Masters">Masters</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <select class="form-select form-control form-select-lg mb-3" name="desiredProgram" aria-label=".form-select-lg example" id="desiredProgram" style="color: #1b1e21">
                                            <option disabled selected>Desired Program</option>
                                            <?php
                                            $query = "Select * from Course";
                                            $slogan = $db->select($query);
                                            if($slogan){
                                                while($result = $slogan->fetch_assoc()) { ?>
                                                    <option value="<?php echo $result['name']?>"><?php echo $result['name']?></option>
                                                <?php }} else{ ?>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12" style="line-height: 0">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <input class="form-control" id="sscPassingYear" placeholder="SSC passing year" type="text" style="color: #1b1e21" name="sscPassingYear">
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control" id="sscRoll" placeholder="SSC Roll" type="text" style="color: #1b1e21" name="sscRoll">
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control" id="sscGrade" placeholder="Grade" type="text" style="color: #1b1e21" name="sscGrade">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12" style="line-height: 0">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <input class="form-control" id="hscPassingYear" placeholder="HSC passing year" type="text" style="color: #1b1e21" name="hscPassingYear">
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control" id="hscRoll" placeholder="HSC Roll" type="text" style="color: #1b1e21" name="hscRoll">
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control" id="hscGrade" placeholder="Grade" type="text" style="color: #1b1e21" name="hscGrade">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input class="form-control" id="address" placeholder="Present Address" type="text" style="color: #1b1e21" name="address">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block" value="submit">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div><!-- end row -->
        </div>
    </div>
<?php
include 'inc/footer.php';
?>