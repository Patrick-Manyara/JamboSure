<?php
$page        = 'product';
require_once 'header.php';

$current_year   = date("Y");

$id = security('id', 'GET');

$product = get_by_id('prod', $id);

if ($product['prod_price_type'] == 'rate') {
    $price = $product['prod_rate'] .  "% of Premium";
} else {
    $price = 'Ksh. ' . $product['prod_price'];
}


$num_columns = 6;

$column_indexes = range(0, $num_columns - 1);

// Create an array of column definition objects
$column_defs = array();
for ($i = 0; $i < $num_columns; $i++) {
    $column_defs = array(
        array('data' => '', 'title' => 'id'),
        array('data' => 'col_' . $i, 'title' => 'id'),
        array('data' => 'benefit_email', 'title' => 'Name'),
        array('data' => 'a', 'title' => 'Cost'),
        array('data' => 'd', 'title' => 'Code'),
        array('data' => 'aa', 'title' => 'Action')
    );
}
$benefits = get_all('benefit');

$rows = array(); // Initialize the array

foreach ($benefits as $item) {
    $sql2 = "SELECT * FROM benefit WHERE benefit_id = '$item[benefit_id]' ";
    $result = select_rows($sql2)[0];

    // Append the result of the query to the $rows array
    $rows[] = $result;
}

$sql = "SELECT * FROM value_class WHERE prod_id = '$id' ";
$rows = select_rows($sql);

?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><?= $product['prod_name'] ?> </h4>
    <div class="row">
        <!-- User Sidebar -->
        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
            <!-- User Card -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class="d-flex align-items-center flex-column">
                            <img class="img-fluid rounded my-4" src="<?= file_url . get_by_id('writer', $product['writer_id'])['writer_image'] ?>" height="110" width="110" alt="User avatar" />
                            <div class="user-info text-center">
                                <h4 class="mb-2"><?= $product['prod_name'] ?></h4>
                                <span class="badge bg-label-secondary">Added by Admin</span>
                            </div>
                        </div>
                    </div>

                    <h5 class="pb-2 border-bottom mt-4 mb-4">Details</h5>
                    <div class="info-container">
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <span class="fw-bold me-2">Price/Rate:</span>
                                <span><?= $product['prod_price_type'] ?></span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Charge:</span>
                                <span><?= $price ?></span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Status:</span>
                                <span class="badge bg-label-success">Active</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Writer:</span>
                                <span><?= get_by_id('writer', $product['writer_id'])['writer_name'] ?></span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Code:</span>
                                <span><?= $product['prod_code'] ?></span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Category:</span>
                                <span><?= get_by_id('category', $product['category_id'])['category_name'] ?></span>
                            </li>


                        </ul>
                        <div class="d-flex justify-content-center pt-3">
                            <a href="edit_private?id=<?= encrypt($product['prod_id']) ?>" class="btn btn-primary me-3">Edit</a>
                            <a href="javascript:;" class="btn btn-label-danger suspend-user">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /User Card -->
        </div>
        <!--/ User Sidebar -->

        <!-- User Content -->
        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">


            <!-- Project table -->
            <div class="card mb-4">
                <h5 class="card-header">Benefits</h5>
                <?php
                if (!empty($benefits)) { ?>
                    <form role="form" enctype="multipart/form-data" method="post" action="../model/update/benefits">
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


                                    $sql = "SELECT * FROM prod_benefit WHERE prod_id = '$id' and benefit_id = '$val[benefit_id]'";
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
                        </div>
                        <input hidden name="product_id" value="<?= $id ?>" />
                        <?= submit('Submit', 'dark', 'text-center'); ?>
                    </form>
                <?php
                } else {
                    echo 'Add benefits';
                }
                ?>
            </div>
            <!-- /Project table -->


            <!-- Project table -->
            <div class="card mb-4">
                <h5 class="card-header">Value Classes</h5>

                <form action="../model/update/valueClasses.php" method="post">
                    <input hidden name="product_id" value="<?= $id ?>" />
                    <div id="edit_product_form">
                        <!-- Loop through each value class -->
                        <?php foreach ($rows as $index => $valueClass) : ?>

                            <div class="value_class" data-index="<?php echo $index; ?>">
                                <div class="row">
                                    <div class="col-4 m-1">
                                        <label for="minrange<?php echo $index; ?>">Min Range:</label>
                                        <input type="text" name="value_classes[<?php echo $index; ?>][minrange]" id="minrange<?php echo $index; ?>" value="<?php echo $valueClass['value_class_min_range']; ?>" required>
                                    </div>
                                    <div class="col-4 m-1">
                                        <label for="maxrange<?php echo $index; ?>">Max Range:</label>
                                        <input type="text" name="value_classes[<?php echo $index; ?>][maxrange]" id="maxrange<?php echo $index; ?>" value="<?php echo $valueClass['value_class_max_range']; ?>" required>
                                    </div>
                                    <div class="col-4 m-1">
                                        <label for="rate<?php echo $index; ?>">Rate:</label>
                                        <input type="number" name="value_classes[<?php echo $index; ?>][rate]" id="rate<?php echo $index; ?>" value="<?php echo $valueClass['value_class_rate']; ?>" required>
                                    </div>
                                    <div class="col-4 m-1">
                                        <label for="price<?php echo $index; ?>">Price:</label>
                                        <input type="number" name="value_classes[<?php echo $index; ?>][price]" id="price<?php echo $index; ?>" value="<?php echo $valueClass['value_class_price']; ?>" required>
                                    </div>
                                </div>
                                <div class="row" style="justify-content: flex-end;align-items: flex-end;padding-right: 2em;">
                                    <button type="button" class="delete_value_class btn btn-danger" style="width:100px;"> <i class="fa-solid fa-trash"></i> </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Button to add new value class -->
                    <button type="button" style="margin-bottom:10px;margin-top:10px;" class="btn btn-primary" id="add_value_class">Add Value Class</button>

                    <!-- Submit Button -->
                    <div>
                        <input type="submit" class="btn btn-info" value="Update Product">
                    </div>
                </form>

            </div>
            <!-- /Project table -->



        </div>
        <!--/ User Content -->
    </div>


</div>


<script>
    $(document).ready(function() {
        // Add Value Class
        $('#add_value_class').click(function() {
            var index = $('.value_class').length; // Get the current number of value classes
            var html = '<div class="value_class" data-index="' + index + '">';
            html += '<div class="row">';
            html += '<div class="col-4 m-1">';
            html += '<label for="minrange' + index + '">Min Range:</label>';
            html += '<input type="text" name="value_classes[' + index + '][minrange]" id="minrange' + index + '" required>';
            html += '</div>';
            html += '<div class="col-4 m-1">';
            html += '<label for="maxrange' + index + '">Max Range:</label>';
            html += '<input type="text" name="value_classes[' + index + '][maxrange]" id="maxrange' + index + '" required>';
            html += '</div>';
            html += '<div class="col-4 m-1">';
            html += '<label for="rate' + index + '">Rate:</label>';
            html += '<input type="number" name="value_classes[' + index + '][rate]" id="rate' + index + '" required>';
            html += '</div>';
            html += '<div class="col-4 m-1">';
            html += '<label for="price' + index + '">Price:</label>';
            html += '<input type="number" name="value_classes[' + index + '][price]" id="price' + index + '" required>';
            html += '</div>';
            html += '</div>';


            html += '<div class="row" style="justify-content: flex-end;align-items: flex-end;padding-right: 2em;">';
            html += '<button type="button" class="delete_value_class btn btn-danger" style="width:100px;" > <i class="fa-solid fa-trash"></i> </button>'; // Add delete button
            html += '</div>';

            html += '</div>';
            $('#edit_product_form').append(html);
        });

        // Delete Value Class
        $(document).on('click', '.delete_value_class', function() {
            $(this).closest('.value_class').remove();
        });
    });
</script>


<?php include_once 'footer.php'; ?>