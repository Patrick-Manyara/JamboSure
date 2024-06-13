<?php
$page        = 'product';
require_once 'header.php';

$current_year   = date("Y");

$levy = get_by_id('levy', security('id', 'GET'));

if (!empty($levy)) {
    session_assignment(array(
        'edit' => $levy['levy_id']
    ), false);
    $require = false;
} 

?>
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body card-secondary">
            <div class="card-header">
                <h3 class="card-title">Edit Levy </h3>
            </div>
            <div class="mt-4">
                <form enctype="multipart/form-data" action="<?= model_url ?>simple&table=levy&url=product_details?id=<?= $_GET['pid'] ?>" method="POST">
                    <div class="row clearfix">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <?php
                            input_hybrid('Levy Name', 'levy_name', $levy, $require);

                            ?>
                            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-6">
                                <?php
                                input_select('Rate or Block Figure', 'levy_mode', $levy, false, array('price', 'rate'))
                                ?>
                            </div>

                            <div id="prodmode">
                                <?php
                                input_hybrid('levy_rate', 'levy_rate', $levy, false, "number");
                                input_hybrid('levy_price', 'levy_price', $levy, false, "number");
                                input_hybrid('levy_mincap', 'levy_code', $levy, false, "number");
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