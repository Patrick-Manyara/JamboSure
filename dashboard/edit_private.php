<?php
$page        = 'product';
require_once 'header.php';

$current_year   = date("Y");

$id = security('id', 'GET');

$product = get_by_id('prod', $id);

if (!empty($product)) {
    session_assignment(array(
        'edit' => $product['prod_id']
    ), false);
    $require = false;

    $prod_id = $id;
    $prod_code = $product['prod_code'];
} 

$benefits = get_all('benefit');

$writers    = get_dropdown_data(get_all('writer'), 'writer_name', 'writer_id');

$sql = "SELECT * FROM value_class WHERE prod_id = '$id' ";
$rows = select_rows($sql);
cout($rows);
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
                            <input hidden name="prod_type" value="Private" />

                            <?php

                            if ($_GET['insurance_type'] == 'comprehensive') {
                            ?>
                                <input hidden name="prod_rate" value="6" />
                                <input hidden name="prod_price" value="0" />
                                <p style="margin-top:100px;">Value Classes are saved automatically when you finish writing the minimum price cap.</p>
                                <p>Write "above" and "below" for low and high end values</p>
                                <!-- Value Classes -->
                                
                              

                                <button style="margin-bottom:100px;margin-top:10px;" class="btn btn-primary" type="button" id="add_value_class">Add Another Value Class</button>

                            <?php
                            } else { ?>

                                <input hidden name="prod_price_type" value="block fee" />
                                <input hidden name="prod_rate" value="0" />
                                <input hidden name="prod_price" value="0" />

                            <?php
                            }
                            ?>

                            <h3 class="HeaderTxt">Duration Price Setting (optional)</h3>
                            <?php
                            input_hybrid('Charges For 1 Month', 'prod_one_fee', $product, false, 'number');

                            input_hybrid('Charges For 1 year', 'prod_twelve_fee', $product, false, 'number');
                            ?>


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
            html += '<div class="col-6">';
            html += '<label for="minrange' + valueClassCount + '">Min Range:</label>';
            html += '<input type="text" name="value_classes[' + (valueClassCount - 1) + '][minrange]" id="minrange' + valueClassCount + '" required>';
            html += '</div>';
            html += '<div class="col-6">';
            html += '<label for="maxrange' + valueClassCount + '">Max Range:</label>';
            html += '<input type="text" name="value_classes[' + (valueClassCount - 1) + '][maxrange]" id="maxrange' + valueClassCount + '" required>';
            html += '</div>';
            html += '</div>';
            html += '<div class="row">';
            html += '<div class="col-6">';
            html += '<label for="rate' + valueClassCount + '">Rate:</label>';
            html += '<input type="number" name="value_classes[' + (valueClassCount - 1) + '][rate]" id="rate' + valueClassCount + '" required>';
            html += '</div>';
            html += '<div class="col-6">';
            html += '<label for="price' + valueClassCount + '">Price:</label>';
            html += '<input type="number" name="value_classes[' + (valueClassCount - 1) + '][price]" id="price' + valueClassCount + '" required>';
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