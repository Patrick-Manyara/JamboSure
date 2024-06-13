<?php
$page = 'product';
include_once 'header.php';
$products = get_all('product');

$num_columns = 8;

$column_indexes = range(0, $num_columns - 1);

// Create an array of column definition objects
$column_defs = array();
for ($i = 0; $i < $num_columns; $i++) {
    $column_defs = array(
        array('data' => '', 'title' => 'id'),
        array('data' => 'col_' . $i, 'title' => 'id'),
        array('data' => 'product_phone', 'title' => 'Code'),
        array('data' => 'product_image', 'title' => 'Underwriter'),
        array('data' => 'product_name', 'title' => 'Name'),
        array('data' => 'product_email', 'title' => 'Price'),
        array('data' => 'product_duration', 'title' => 'Cover Duration'),
        array('data' => '', 'title' => 'Action')
    );
}

$add = 'product.php';
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">View</span> Products</h4>

    <!-- DataTable with Buttons -->
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class="datatables-basic table border-top">
                <thead>
                    <tr>
                        <th></th>

                        <th>id</th>
                        <th>Underwriter</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Code</th>
                        <th>Cover Duration</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cnt = 1;
                    foreach ($products as $product) {
                        $product_id = encrypt($product['product_id']);
                        if ($product['product_mode'] == 'rate') {
                            $price = $product['product_rate'] .  " of Premium";
                        } else {
                            $price = 'Ksh. ' . $product['product_price'];
                        }
                    ?>
                        <tr>
                            <td></td>
                            <td><?= $cnt ?></td>
                            <td> <?= $product['product_code'] ?> </td>
                            <td>
                                <img alt="therapist image" src="<?= file_url . get_by_id('writer', $product['writer_id'])['writer_image'] ?>" style="width:100px; height:auto; border-radius:5px;" title="<?= $product['product_name'] ?>">
                            </td>
                            <td> <?= $product['product_name'] ?> </td>
                            <td> <?= $price ?> </td>
                            <td> <?= $product['product_duration'] ?> </td>

                            <td>
                                <a href="<?= admin_url ?>product_details?id=<?= $product_id ?>" style="margin-bottom:10px;" class="btn btn-secondary">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="<?= delete_url ?>id=<?= $product_id ?>&table=<?= encrypt('product') ?>&page=<?= encrypt('view_products') ?>&method=product" class="btn btn-danger">
                                    <i class='bx bx-trash'></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                        $cnt++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>



</div>
<!-- / Content -->


<?php
include_once 'footer.php';
?>