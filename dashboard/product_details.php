<?php
$page        = 'product';
require_once 'header.php';

$current_year   = date("Y");

$product = get_by_id('product', security('id', 'GET'));

if ($product['product_mode'] == 'rate') {
    $price = $product['product_rate'] .  " of Premium";
} else {
    $price = 'Ksh. ' . $product['product_price'];
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

$sql = "SELECT * FROM benefit WHERE product_id = '$product[product_id]' ";
$benefits = select_rows($sql);

$sql2 = "SELECT * FROM levy WHERE product_id = '$product[product_id]' ";
$levies = select_rows($sql2);

$add = 'add_benefit.php?pid='.encrypt($product['product_id']);
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><?= $product['product_name'] ?> </h4>
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
                                <h4 class="mb-2"><?= $product['product_name'] ?></h4>
                                <span class="badge bg-label-secondary">Added by Admin</span>
                            </div>
                        </div>
                    </div>

                    <h5 class="pb-2 border-bottom mt-4 mb-4">Details</h5>
                    <div class="info-container">
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <span class="fw-bold me-2">Price/Rate:</span>
                                <span><?= $product['product_mode'] ?></span>
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
                                <span><?= $product['product_code'] ?></span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-bold me-2">Category:</span>
                                <span><?= get_by_id('category', $product['category_id'])['category_name'] ?></span>
                            </li>
                            <?php
                            if (!empty($product['subcategory_id'])) { ?>
                                <li class="mb-3">
                                    <span class="fw-bold me-2">Subcategory:</span>
                                    <span><?= get_by_id('subcategory', $product['subcategory_id'])['subcategory_name'] ?></span>
                                </li>

                            <?php
                            }
                            ?>

                        </ul>
                        <div class="d-flex justify-content-center pt-3">
                            <a href="edit_product?pid=<?= $_GET['id'] ?>&id=<?= encrypt($product['product_id']) ?>" class="btn btn-primary me-3" >Edit</a>
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
                    <div class="table-responsive mb-3">
                        <table class="datatables-basic table border-top">
                            <thead>
                                <tr>
                                    <th> </th>

                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Cost</th>
                                    <th>Code</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cnt = 1;
                                foreach ($benefits as $benefit) {
                                    $benefit_id = encrypt($benefit['benefit_id']);
                                    $product = get_by_id('product', $benefit['product_id']);
                                    $category = get_by_id('category', $product['category_id']);
                                    $underwriter = get_by_id('writer', $product['writer_id']);

                                    if ($benefit['benefit_mode'] == 'rate') {
                                        $price = $benefit['benefit_rate'] .  "% of Premium";
                                    } else {
                                        $price = 'Ksh. ' . $benefit['benefit_price'];
                                    }


                                    if ($benefit['benefit_mode'] == 'free') {
                                        $type = "Free";
                                    } else {
                                        $type = "Paid";
                                    }
                                ?>
                                    <tr>
                                        <td> </td>
                                        <td><?= $cnt ?></td>
                                        <td> <?= $benefit['benefit_name'] ?> </td>
                                        <td> <?= $price ?> </td>
                                        <td> <?= strtoupper($benefit['benefit_id']) ?> </td>

                                        <td>
                                            <a href="<?= admin_url ?>benefit?id=<?= $benefit_id ?>&pid=<?= $_GET['id'] ?>" class="btn btn-info">
                                                <i class='bx bx-edit'></i>
                                            </a>
                                            <a href="<?= delete_url ?>id=<?= $benefit_id ?>&table=<?= encrypt('benefit') ?>&page=<?= encrypt('view_benefits') ?>&method=benefit" class="btn btn-danger">
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
                <?php
                } else{
                    echo 'Add benefits';
                }
                ?>
            </div>
            <!-- /Project table -->

         
        </div>
        <!--/ User Content -->
    </div>


</div>



<?php include_once 'footer.php'; ?>