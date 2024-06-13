<?php
$page        = 'product';
require_once 'header.php';

$current_year   = date("Y");

$product = get_by_id('product', security('id', 'GET'));


    session_assignment(array(
        'edit' => $product['product_id']
    ), false);
    $require = false;


$writers    = get_dropdown_data(get_all('writer'), 'writer_name', 'writer_id');
$cats       = get_dropdown_data(get_all('category'), 'category_name', 'category_id');
$subcats    = get_dropdown_data(get_all('subcategory'), 'subcategory_name', 'subcategory_id');
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body card-secondary">
            <div class="card-header">
                <h3 class="card-title">Edit Product </h3>
            </div>
            <div class="mt-4">
                <form enctype="multipart/form-data" action="<?= model_url ?>simple&table=product&url=product_details?id=<?= $_GET['pid'] ?>" method="POST">
                    <div class="row clearfix">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <?php
                            input_hybrid('Product Name', 'product_name', $product, $require);

                            ?>
                            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-6">
                                <?php
                                input_select('Rate or Block Figure', 'product_mode', $product, false, array('price', 'rate'))
                                ?>
                            </div>

                            <div id="prodmode">
                                <?php
                                if($product['product_mode']=='rate'){
                                    input_hybrid('Rate(optional)', 'product_rate', $product, false, "number");
                                }else{
                                     input_hybrid('Price(optional)', 'product_price', $product, false, "number");
                                }
                                
                               
                                input_hybrid('Minimum Cap(optional)', 'product_mincap', $product, false, "number");
                                ?>
                            </div>




                            <?php
                            input_select_array("Select An Underwriter", "writer_id", $product, $required, $writers, 'Click Here');
                            input_select_array("Cat", "category_id", $product, $required, $cats, 'Click Here');
                            ?>

                            <div id="subcat">
                                <?php
                                input_select_array("SubCat", "subcategory_id", $product, false, $subcats, 'Click Here');
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

<style>
    #subcat {
        display: none;
    }

    .form-group {
        margin-top: 10px;
    }
</style>

<script>
    $(document).ready(function() {
        var SelectedValue;
        $('#category_id').change(function() {
            SelectedValue = this.value;
            console.log(SelectedValue)
            if (SelectedValue == 'CAT20240205ghdSw0f') {
                $('#subcat').css('display', 'none');
            } else {
                $('#subcat').css('display', 'block');
            }
        });

        var rowCounter, levyCount = 1;

        // Add click event listener to the "Add Another" button
        $("#add_benefit_row").click(function() {
            rowCounter++;

            var clonedRow = $(".BenefitsRow").first().clone();

            clonedRow.find(".benefitCounter").text("BENEFIT " + rowCounter);
            clonedRow.find("input").val("");

            $(".AdditionButton").before(clonedRow);
        });



        // Add click event listener to the "Add Another" button
        $("#add_levy_row").click(function() {
            levyCount++;

            var clonedLevyRow = $(".LeviesRow").first().clone();

            clonedLevyRow.find(".levyCounter").text("levy " + levyCount);
            clonedLevyRow.find("input").val("");

            $(".LevyAdditionButton").before(clonedLevyRow);
        });
    });
</script>

<?php include_once 'footer.php'; ?>