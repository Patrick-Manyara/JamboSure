<?php
$page        = 'product';
require_once 'header.php';

$current_year   = date("Y");

$required = true;

?>
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body card-secondary">
            <div class="card-header">
                <h3 class="card-title">Edit benefit </h3>
            </div>
            <div class="mt-4">
                <form enctype="multipart/form-data" action="<?= model_url ?>benefit&url=prod_details?id=<?= $_GET['pid'] ?>" method="POST">
                    <div class="row clearfix">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <?php
                            input_hybrid('benefit Name', 'benefit_name', $benefit, $require);

                            ?>
                            <input hidden name="product_id" value="<?= security('pid','GET') ?>" />
                            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-6">
                                <?php
                                input_select('Is this a Free Benefit?', 'benefit_free', $benefit, false, array('yes', 'no'))
                                ?>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-6">
                                <?php
                                input_select('Is the product charged at a rate(%) or block fee?', 'benefit_mode', $benefit, false, array('price', 'rate'))
                                ?>
                            </div>

                            <div id="prodmode">
                                <?php
                                input_hybrid('Rate In Percentage', 'benefit_rate', $benefit, false, "number");
                                input_hybrid('Block Fee', 'benefit_price', $benefit, false, "number");
                                ?>
                            </div>
                        </div>
                    </div>




                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-4 text-center">
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit" id="submit">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->



<?php include_once 'footer.php'; ?>