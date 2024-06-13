<?php
$page        = 'product';
require_once 'header.php';


$current_year   = date("Y");

$benefit = get_by_id('benefit', security('id', 'GET'));

if (!empty($benefit)) {
    session_assignment(array(
        'edit' => $benefit['benefit_id']
    ), false);
    $require = false;
} else {
    $code = 'JAMBO-' . generateRandomString('6');
    $required = true;
}



?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body card-secondary">
            <div class="card-header">
                <h3 class="card-title">Edit benefit </h3>
            </div>
            <div class="mt-4">
                <form enctype="multipart/form-data" action="<?= model_url ?>benefit" method="POST">

                    <div class="BenefitsRow">
                        <p class="benefitCounter">Benefit 1</p>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <?php
                            input_hybrid('Benefit Name', 'benefit_name', $benefit, true)
                            ?>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  mt-4">
                                <?php
                                input_select('Is this a Free Benefit?', 'benefit_free', $benefit, false, array('yes', 'no'))
                                ?>
                            </div>

                            <input hidden name="benefit_mode" value="rate" />

                            <?php
                            if (empty($benefit)) { ?>
                                <input hidden name="benefit_code" value="<?= $code ?>" />
                            <?php
                            }
                            ?>
                            
                            
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4">
                                <?php
                                input_hybrid('Limit (optional)', 'benefit_limit', $benefit, false)
                                ?>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  mt-4">
                                <?php
                                input_hybrid('Rate In Percentage (optional)', 'benefit_rate', $benefit, false, "number")
                                ?>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-4">
                                <?php
                                input_hybrid('Minimum Cap (optional)', 'benefit_price', $benefit, false, "number")
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-4 text-center">
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit" id="submit">Edit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->



<?php include_once 'footer.php'; ?>