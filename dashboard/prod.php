<?php
$page        = 'product';
require_once 'header.php';

$current_year   = date("Y");

$product = get_by_id('product', security('id', 'GET'));

if (!empty($product)) {
    session_assignment(array(
        'edit' => $product['prod_id']
    ), false);
    $require = false;
} else {
    $require = true;
}

$writers    = get_dropdown_data(get_all('writer'), 'writer_name', 'writer_id');
$cats       = get_dropdown_data(get_all('category'), 'category_name', 'category_id');
$subcats    = get_dropdown_data(get_all('subcategory'), 'subcategory_name', 'subcategory_id');
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- DataTales Example -->
    <form enctype="multipart/form-data" action="<?= model_url ?>prod" method="POST">
        <div class="card shadow mb-4">
            <div class="card-body card-secondary">

                <div class="mt-4">

                    <div class="row clearfix">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <?php
                            input_select_array("Select An Underwriter", "writer_id", $product, $required, $writers, 'Click Here');
                            input_hybrid('Product Name', 'prod_name', $product, $require);
                            input_select('Select the service the underwriter provides', 'prod_type', $product, $require, array('Private', 'Commercial', 'Motorbike', 'TukTuk', 'Prime Mover'));
                            input_select('Is the product charged at a rate(%) or block fee?', 'prod_price_type', $product, $require, array('block fee', 'rate'));
                            input_hybrid('Rate In Percentage', 'prod_rate', $product, false, "number", '', 'product_rate');
                            input_hybrid('Block Fee', 'prod_price', $product, false, "number", '', 'product_price');
                            input_select('Comprehensive or Third Party', 'prod_category', $product, $require, array('comprehensive', 'third party'));
                            ?>


                            <div id="comprehensive">
                                <div class="row">
                                    <div class="col-6">
                                        One Month
                                    </div>
                                    <div class="col-6">
                                        One Year
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-6">
                                        <?php
                                        input_hybrid('Charges From 1-3 Tonnes', 'prod_tonne_one_fee', $product, false, 'number');
                                        input_hybrid('Charges From 6-6 Tonnes', 'prod_tonne_two_fee', $product, false, 'number');
                                        input_hybrid('Charges From 7 Tonnes and Above', 'prod_tonne_three_fee', $product, false, 'number');

                                        ?>
                                    </div>
                                    <div class="col-6">
                                        <?php
                                        input_hybrid('Charges From 1-3 Tonnes', 'prod_tonne_one_fee_12', $product, false, 'number');
                                        input_hybrid('Charges From 6-6 Tonnes', 'prod_tonne_two_fee_12', $product, false, 'number');
                                        input_hybrid('Charges From 7 Tonnes and Above', 'prod_tonne_three_fee_12', $product, false, 'number');

                                        ?>
                                    </div>
                                </div>

                             

                                <h3 class="HeaderTxt">Vehicle Usage Price Setting (optional)</h3>
                                <?php
                                input_hybrid('Charges For General Cartiage Vehicles', 'prod_general_cartiage_fee', $product, false, 'number');
                                input_hybrid('Charges For Own Goods', 'prod_own_goods_fee', $product, false, 'number');

                                ?>

                            </div>


                            <div id="third">

                            </div>

                            <div id="months">
                                <h3 class="HeaderTxt">Duration Price Setting (optional)</h3>
                                <?php
                                input_hybrid('Charges For 1 Month', 'prod_one_fee', $product, false, 'number');
                                input_hybrid('Charges For 6 Months', 'prod_six_fee', $product, false, 'number');
                                input_hybrid('Charges For 12 Months', 'prod_twelve_fee', $product, false, 'number');
                                ?>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>





        <div class="card shadow mb-4" id="BenBenBen">
            <div class="card-body card-secondary">

                <div class="mt-4">

                    <div class="row clearfix">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div>
                                <div class="divider mt-4 mb-4">
                                    <div class="divider-text">Benefits</div>
                                </div>


                                <div class="BenefitsRow">
                                    <p class="benefitCounter">Benefit 1</p>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label class="form-label">Benefit Name</label>
                                        <input class="form-control" type="text" autocomplete="off" name="benefit_name[]" placeholder="Enter name" />
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <?php
                                            input_select('Is this a Free Benefit?', 'benefit_free[]', $product, false, array('yes', 'no'), '', 'FreeBen')
                                            ?>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mmmClass">
                                            <?php
                                            input_select('Mode (optional)', 'benefit_mode[]', $product, false, array('price', 'rate'), '', 'modeClass')
                                            ?>
                                        </div>


                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pIn">
                                            <?php
                                            input_hybrid('Benefit price (optional)', 'benefit_price[]', $product, false, "number", '', '', '', '', '', '', 'priceInput')
                                            ?>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 rIn">
                                            <?php
                                            input_hybrid('Benefit rate (optional)', 'benefit_rate[]', $product, false, "number",  '', '', '', '', '', '',  'rateInput')
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="AdditionButton">
                                    <button type="button" class="btn rounded-pill btn-info" style="margin-top:1em;" id="add_benefit_row">Add More</button>
                                </div>

                                <div class="divider mt-4">
                                    <div class="divider-text">Levies</div>
                                </div>


                                <div class="LeviesRow">
                                    <p class="levyCounter">levy 1</p>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label class="form-label">levy Name</label>
                                        <input class="form-control" type="text" autocomplete="off" name="levy_name[]" placeholder="Enter name" />
                                    </div>

                                    <div class="row">

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <?php
                                            input_select('Mode', 'levy_mode[]', $product, false, array('price', 'rate'), '', 'modeClass')
                                            ?>
                                        </div>


                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pIn">
                                            <?php
                                            input_hybrid('levy price (optional)', 'levy_price[]', $product, false, "number", '', '', '', '', '', '',  'priceInput')
                                            ?>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 rIn">
                                            <?php
                                            input_hybrid('levy rate (optional)', 'levy_rate[]', $product, false, "number", '', '', '', '', '', '',  'rateInput')
                                            ?>
                                        </div>
                                    </div>
                                </div>


                                <div class="LevyAdditionButton">
                                    <button type="button" class="btn rounded-pill btn-primary" style="margin-top:1em;" id="add_levy_row">Add More</button>
                                </div>

                            </div>
                        </div>

                    </div>

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
<!-- End of Main Content -->

<style>
    .form-group {
        margin-top: 10px;
    }

    #comprehensive,
    #third,
    #months,
    #BenBenBen {
        display: none;
    }

    .rIn,
    .pIn {
        display: none;
    }
</style>

<script>
    $(document).ready(function() {
        var SelectedValue;
        $('#prod_category').change(function() {
            $('#months').css('display', 'block');
            SelectedValue = this.value;
            if (SelectedValue == 'comprehensive') {
                $('#comprehensive').css('display', 'block');
                $('#BenBenBen').css('display', 'block');
                $('#third').css('display', 'none');
            } else {
                $('#third').css('display', 'block');
                $('#comprehensive').css('display', 'none');
                $('#BenBenBen').css('display', 'none');
            }
        });


        $('#prod_price_type').change(function() {
            selVal = this.value;
            if (selVal == 'rate') {
                $('.product_rate').css('display', 'block');
                $('.product_price').css('display', 'none');
            } else {
                $('.product_price').css('display', 'block');
                $('.product_rate').css('display', 'none');
            }
        });

        var rowCounter = 1;
        var levyCount = 1;



        $("#add_benefit_row").click(function() {
            rowCounter++;
            var clonedRow = $(".BenefitsRow").first().clone();

            // Update counter and clear input values
            clonedRow.find(".benefitCounter").text("Benefit " + rowCounter);
            clonedRow.find("input").val("");
            clonedRow.find("select").val("price"); // Set default mode to "price"

            // Toggle inputs based on mode selection
            toggleInputs(clonedRow);

            $(".AdditionButton").before(clonedRow);
        });

        // Add click event listener to the "Add Another" button for levies
        $("#add_levy_row").click(function() {
            levyCount++;
            var clonedLevyRow = $(".LeviesRow").first().clone();

            // Update counter and clear input values
            clonedLevyRow.find(".levyCounter").text("Levy " + levyCount);
            clonedLevyRow.find("input").val("");
            clonedLevyRow.find("select").val("price"); // Set default mode to "price"

            // Toggle inputs based on mode selection
            toggleInputs(clonedLevyRow);

            $(".LevyAdditionButton").before(clonedLevyRow);
        });

        // Function to toggle inputs based on mode selection
        function toggleInputs(row) {
            var mode = row.find(".modeClass").val();
            if (mode === "price") {
                row.find(".rIn").hide();
                row.find(".rateInput").val('0');
                row.find(".pIn").show();
            } else if (mode === "rate") {
                row.find(".pIn").hide();
                row.find(".priceInput").val('0');
                row.find(".rIn").show();
            }
        }


        // Event listener for mode selection change
        $(document).on("change", "select", function() {
            var row = $(this).closest(".BenefitsRow, .LeviesRow");
            toggleInputs(row);
        });

        $('.FreeBen').change(function() {
            var closestRow = $(this).closest('.row');
            var modeSelect = closestRow.find('.modeClass');
            var selectedValue = this.value;
            console.log(selectedValue);
            if (selectedValue == 'yes') {
                modeSelect.hide();
                modeSelect.val('rater');
            } else {
                modeSelect.show();
            }
        });


    });
</script>

<style>
    .HeaderTxt {
        margin: 1.2em 0em;
        font-size: 1.5em;
        font-weight: 700;
        text-align: center;
    }
</style>

<?php include_once 'footer.php'; ?>