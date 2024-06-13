<?php
$page = 'claim';
include_once 'header.php';
$claims = get_all('claim');

$num_columns = 10;

$column_indexes = range(0, $num_columns - 1);

// Create an array of column definition objects
$column_defs = array();
for ($i = 0; $i < $num_columns; $i++) {
    $column_defs = array(
        array('data' => '', 'title' => 'id'),
        array('data' => 'col_' . $i, 'title' => 'id'),
        array('data' => 'claim_phone', 'title' => 'Customer'),
        array('data' => 'claim_name', 'title' => 'claim Number'),
        array('data' => 'claim_email', 'title' => 'ID No.'),
        array('data' => 'a', 'title' => 'Underwriter'),
        array('data' => 'b', 'title' => 'claim'),
        array('data' => 'v', 'title' => 'Category'),
        array('data' => 'c', 'title' => 'Start Date'),
        array('data' => 'aa', 'title' => 'End Date')
    );
}
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">View</span> claims</h4>
  
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class="datatables-basic table border-top">
                <thead>
                    <tr>
                        <th> </th>

                        <th>id</th>
                        <th>Customer</th>
                        <th>Policy No.</th>
                        <th>ID No.</th>
                        <th>Details</th>
                        <th>Status </th>
                        <th>Date and Time </th>
                        <th>Claim ID </th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cnt = 1;
                    foreach ($claims as $claim) {
                        $claim_id = encrypt($claim['claim_id']);

                        $policy = get_by_id('policy', $claim['policy_id']);
                        $user = get_by_id('user', $policy['user_id']);
                        // $product = get_by_id('product', $claim['product_id']);
                        // $category = get_by_id('category', $product['category_id']);
                        // $underwriter = get_by_id('writer', $product['writer_id']);

                    ?>
                        <tr>
                            <td> </td>
                            <td><?= $cnt ?></td>
                            <td><?= $user['user_name'] ?></td>
                            <td><?= $policy['policy_code'] ?></td>
                            <td><?= $user['user_passport'] ?></td>
                            <td> <?= $claim['claim_details'] ?> </td>
                            <td> <?= $claim['claim_status'] ?> </td>
                            <td> <?= get_ordinal_month_year($claim['claim_date_created']) . " at " . get_hours_mins($claim['claim_date_created'])  ?> </td>
                            <td> <?= $claim['claim_code'] ?> </td>
                            <td>
                                <a href="<?= admin_url ?>user?id=<?= $user_id ?>" class="btn btn-success">
                                    <i class='bx bx-edit'></i>
                                </a>
                                <a href="<?= delete_url ?>id=<?= $user_id ?>&table=<?= encrypt('user') ?>&page=<?= encrypt('view_users') ?>&method=user" class="btn btn-danger">
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