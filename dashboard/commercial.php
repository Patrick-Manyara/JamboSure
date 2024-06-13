<?php
$page        = 'product';
require_once 'header.php';

$current_year   = date("Y");

$id = security('id', 'GET');

$product = get_by_id('product', $id);

$prod_code = 'JAMBO-' . generateRandomString('6');
$require = true;

$benefits = get_all('benefit');

$writers    = get_dropdown_data(get_all('writer'), 'writer_name', 'writer_id');
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
                            ?>

                            <input hidden name="prod_category" value="<?= $_GET['insurance_type'] ?>" />
                            <input hidden name="prod_type" value="Commercial" />

                            <?php

                            if ($_GET['insurance_type'] == 'comprehensive') {
                            ?>
                                <input hidden name="prod_rate" value="6" />
                                <input hidden name="prod_price" value="0" />
                                <p style="margin-top:100px;">Value Classes are saved automatically when you finish writing the minimum price cap.</p>
                                <p>Write "1" for below and "200,000,000" for above.</p>
                                <!-- Value Classes -->
                                <div id="value_classes_container">
                                    <div class="value_class">
                                        <p class="mt-2 MyText">Value Class 1</p>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group" style="width:100%">
                                                     <label for="minrange1">Min Range:</label>
                                                    <input type="text" class="form-control" name="value_classes[0][minrange]" id="minrange1" required>
                                                </div>
                                                
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group" style="width:100%">
                                                     <label for="maxrange1">Max Range:</label>
                                                <input type="text" class="form-control" name="value_classes[0][maxrange]" id="maxrange1" required>
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group" style="width:100%">
                                                    
                                                      <label for="rate1">Rate:</label>
                                                <input class="form-control" type="text" name="value_classes[0][rate]" id="rate1" required>
                                                </div>
                                              
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group" style="width:100%">
                                                    <label for="price1">Price:</label>
                                                <input class="form-control" type="text" name="value_classes[0][price]" id="price1" required>
                                                    
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button style="margin-bottom:100px;margin-top:10px;" class="btn btn-primary" type="button" id="add_value_class">Add Another Value Class</button>

                            <?php
                            } else { ?>

                                <input hidden name="prod_price_type" value="block fee" />
                                <input hidden name="prod_rate" value="0" />
                                <input hidden name="prod_price" value="0" />

                            <?php
                            }
                            ?>


                        </div>
   
                    </div>
                    
                         <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
                                        <h3>One Month</h3>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
                                        <h3>One Year</h3>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
                                        <?php
                                        input_hybrid('Charges From 1-3 Tonnes', 'prod_tonne_one_fee', $product, false, 'number');
                                        input_hybrid('Charges From 6-6 Tonnes', 'prod_tonne_two_fee', $product, false, 'number');
                                        input_hybrid('Charges From 7 Tonnes and Above', 'prod_tonne_three_fee', $product, false, 'number');

                                        ?>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
                                        <?php
                                        input_hybrid('Charges From 1-3 Tonnes', 'prod_tonne_one_fee_12', $product, false, 'number');
                                        input_hybrid('Charges From 6-6 Tonnes', 'prod_tonne_two_fee_12', $product, false, 'number');
                                        input_hybrid('Charges From 7 Tonnes and Above', 'prod_tonne_three_fee_12', $product, false, 'number');

                                        ?>
                                    </div>
                                </div>


                </div>
            </div>
        </div>



        <?php
        if ($_GET['insurance_type'] == 'comprehensive') { ?>

            <div class="card shadow mb-4" id="BenBenBen">
                <div class="card-body card-secondary">
                    <div class="row">
                        <div class="col-8">
                            Name
                        </div>
                        <div class="col-2">
                            Cost
                        </div>
                        <div class="col-2">
                            Rate
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <?php
                            foreach ($benefits as $key => $val) {

                                if ($val['benefit_free'] == 'yes') {
                                    $cost = 'Free Benefit';
                                    $rate = 'Free Benefit';
                                } else {
                                    if ($val['benefit_price'] == 0.00) {
                                        $cost = 'On Additional Limit';
                                    } else {
                                        $cost = 'Ksh. ' . $val['benefit_price'];
                                    }
                                    $rate = $val['benefit_rate'] . '%';
                                }


                                $sql = "SELECT * FROM prod_benefit WHERE prod_id = '$prod_id' and benefit_id = '$val[benefit_id]'";
                                $r = select_rows($sql);
                                $p = false;
                                if (!empty($r)) {
                                    $p = true;
                                }
                            ?>
                                <div class="form-check mt-2">
                                    <div class="row">
                                        <div class="col-8">
                                            <input class="form-check-input mr-2" <?= $p ? "checked" : "" ?> type="checkbox" name="benefit_id[]" value="<?= $val['benefit_id'] ?>" id="<?= $val['benefit_id'] ?>">
                                            <?= $val['benefit_name'] ?>
                                        </div>
                                        <div class="col-2">
                                            <?= $rate  ?>
                                        </div>
                                        <div class="col-2">
                                            <?= $cost ?>
                                        </div>
                                    </div>

                                </div>
                            <?php
                            }
                            ?>

                        </div>
                        <!--<input hidden name="product_id" value="<?= $prod_id ?>">-->
                        <input hidden name="prod_code" value="<?= $prod_code ?>">
                    </div>

                    <div class="mt-4">

                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div>
                                    <input hidden name="levy_rate" value="0.45" />
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        <?php

        }
        ?>


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
</style>

<script>
    $(document).ready(function() {
        var valueClassCount = 1;

        // Add Value Class
         $('#add_value_class').click(function() {
            valueClassCount++;
            var html = '<div class="value_class">';
            html += '<p class="mt-2 MyText">Value Class ' + valueClassCount + '</p>';
            html += '<div class="row">';
            html += '<div class="col-6 ">';
            html += ' <div class="form-group" style="width:100%">';
            html += '<label for="minrange' + valueClassCount + '">Min Range:</label>';
            html += '<input class="form-control" type="text" name="value_classes[' + (valueClassCount - 1) + '][minrange]" id="minrange' + valueClassCount + '" required>';
            html += '</div>';
            html += '</div>';
            html += '<div class="col-6 ">';
            html += ' <div class="form-group" style="width:100%">';
            html += '<label for="maxrange' + valueClassCount + '">Max Range:</label>';
            html += '<input class="form-control" type="text" name="value_classes[' + (valueClassCount - 1) + '][maxrange]" id="maxrange' + valueClassCount + '" required>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '<div class="row">';
            html += '<div class="col-6 ">';
            html += ' <div class="form-group" style="width:100%">';
            html += '<label for="rate' + valueClassCount + '">Rate:</label>';
            html += '<input class="form-control" type="text" name="value_classes[' + (valueClassCount - 1) + '][rate]" id="rate' + valueClassCount + '" required>';
            html += '</div>';
            html += '</div>';
            html += '<div class="col-6 " >';
            html += ' <div class="form-group" style="width:100%">';
            html += '<label for="price' + valueClassCount + '">Price:</label>';
            html += '<input class="form-control" type="text" name="value_classes[' + (valueClassCount - 1) + '][price]" id="price' + valueClassCount + '" required>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '<div class="row" style="justify-content: flex-end;align-items: flex-end;">';
            html += '<button type="button" class="delete_value_class btn btn-danger" style="width:100px;" data-count="' + valueClassCount + '"> <i class="fa-solid fa-trash"></i> </button>'; // Add delete button
            html += '</div>';
            html += '</div>';
            $('#value_classes_container').append(html);
            updateDeleteButtons();
        });

        // Function to update delete buttons
        function updateDeleteButtons() {
            // Disable delete button if there's only one value class
            $('.delete_value_class').prop('disabled', valueClassCount === 1);
        }

        // Delete Value Class
        $(document).on('click', '.delete_value_class', function() {
            $(this).closest('.value_class').remove();
            valueClassCount--;
            updateDeleteButtons();
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

    .col-6 {
        justify-content: space-between;
        display: flex;
        width: 40%;
        margin: 10px;
    }
    
    .MyText{
        text-align:center;
        margin-right:1em;
    }
</style>

<?php include_once 'footer.php'; ?>