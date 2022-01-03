<?php
    if(isset($_GET['courseid'])){
        $id =  $_GET['courseid'];
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
            $query = "Select * from Course where id = '$id'";
            $slogan = $db->select($query);
            while ($result = $slogan->fetch_assoc()){
            ?>
            <?php echo $result['name']; } ?> Course Details
        </h1>
    </div>
    <div class="col-sm-4"></div>
</div>
    <div id="pricing-box" class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="pricingTable">
                        <div class="pricingTable-header">
                            <span class="heading">
                                <h3>3 years</h3>
                            </span>
                                <?php
                                    $query = "Select * from Diploma_tuition_fees where course_id = '$id'";
                                    $slogan = $db->select($query);
                                    if($slogan){
                                    while ($result = $slogan->fetch_assoc()){ ?>
                                    <span class="price-value"><?php echo $result['fees']?> BDT


                                <span>SSC - 4.5 and Diploma - 3.5 (40% weaver) </span>
                                <span>SSC - 4.5 and Diploma - 3.0 (30% weaver)</span>
                                <span>SSC - 4.0 and Diploma - 3.0 (20% weaver)</span>
                            </span>
                        </div>
                        <div class="pricingContent">
                            <i class="fa fa-adjust"></i>
                            <ul>
                                <li>Total <?php echo $result['credit']?> Credits </li>
                                <li><?php echo $result['fees'] * 0.6 ?> BDT on 40% weaver </li>
                                <li><?php echo $result['fees'] * 0.7 ?> BDT on 30% weaver </li>
                                <li><?php echo $result['fees'] * 0.8 ?> BDT on 20% weaver </li>
                                <?php }} else{ ?>
                                    <p>No data found</p>
                                <?php } ?>
                            </ul>
                        </div><!-- /  CONTENT BOX-->
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="pricingTable">
                        <div class="pricingTable-header">
                            <span class="heading">
                                <h3>4 years</h3>
                            </span>
                            <?php
                            $query = "Select * from hsc_tuition_fees where course_id = '$id'";
                            $slogan = $db->select($query);
                            if($slogan){
                            while ($result = $slogan->fetch_assoc()){ ?>
                            <span class="price-value"><?php echo $result['fees']?> BDT


                                <span>SSC - 4.5 and HSC - 4.5 (40% weaver) </span>
                                <span>SSC - 4.5 and HSC - 4.0 (30% weaver)</span>
                                <span>SSC - 4.0 and HSC - 3.5 (20% weaver)</span>
                            </span>
                        </div>
                        <div class="pricingContent">
                            <i class="fa fa-adjust"></i>
                            <ul>
                                <li>Total <?php echo $result['credit']?> Credits </li>
                                <li><?php echo $result['fees'] * 0.6 ?> BDT on 40% weaver </li>
                                <li><?php echo $result['fees'] * 0.7 ?> BDT on 30% weaver </li>
                                <li><?php echo $result['fees'] * 0.8 ?> BDT on 20% weaver </li>
                                <?php }} else{ ?>
                                    <p>No data found</p>
                                <?php } ?>
                            </ul>
                        </div><!-- /  CONTENT BOX-->
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="pricingTable">
                        <div class="pricingTable-header">
                            <span class="heading">
                                <h3>Masters</h3>
                            </span>
                            <?php
                            $query = "Select * from masters_tuition_fees where course_id = '$id'";
                            $slogan = $db->select($query);
                            if($slogan){
                            while ($result = $slogan->fetch_assoc()){ ?>
                            <span class="price-value"><?php echo $result['fees']?> BDT

                                <span>All first division (40% weaver) </span>
                                <span>All second division(30% weaver)</span>
                                <span>Job Holder (20% weaver)</span>
                            </span>
                        </div>
                        <div class="pricingContent">
                            <i class="fa fa-adjust"></i>
                            <ul>
                                <li>Total <?php echo $result['credit']?> Credits </li>
                                <li><?php echo $result['fees'] * 0.6 ?> BDT on 40% weaver </li>
                                <li><?php echo $result['fees'] * 0.7 ?> BDT on 30% weaver </li>
                                <li><?php echo $result['fees'] * 0.8 ?> BDT on 20% weaver </li>
                                <?php }} else{ ?>
                                    <p>No data found</p>
                                <?php } ?>
                            </ul>
                        </div><!-- /  CONTENT BOX-->
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end section -->
<?php
include 'inc/footer.php';
?>