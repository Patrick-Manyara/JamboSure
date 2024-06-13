<?php
$page = 'policy';
include_once 'header.php';
$policys = get_all('policy');

$num_columns = 11;

$column_indexes = range(0, $num_columns - 1);

// Create an array of column definition objects
$column_defs = array();
for ($i = 0; $i < $num_columns; $i++) {
    $column_defs = array(
        array('data' => '', 'title' => 'id'),
        array('data' => 'col_' . $i, 'title' => 'id'),
        array('data' => 'policy_phone', 'title' => 'Customer'),
        array('data' => 'policy_name', 'title' => 'Policy Number'),
        array('data' => 'policy_email', 'title' => 'ID No.'),
        array('data' => 'a', 'title' => 'Underwriter'),
        array('data' => 'b', 'title' => 'policy'),
        array('data' => 'v', 'title' => 'Category'),
        array('data' => 'c', 'title' => 'Start Date'),
        array('data' => 'aa', 'title' => 'End Date'),
        array('data' => 'aaa', 'title' => 'Action')
    );
}
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">View</span> Policies</h4>
    <!-- DataTable with Buttons -->
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
                        <th>Underwriter</th>
                        <th>Product </th>
                        <th>Category </th>
                        <th>Start Date </th>
                        <th>End Date </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cnt = 1;
                    foreach ($policys as $policy) {
                        $policy_id = encrypt($policy['policy_id']);
                        $user = get_by_id('user', $policy['user_id']);
                        $product = get_by_id('product', $policy['product_id']);
                        $category = get_by_id('category', $product['category_id']);
                        $underwriter = get_by_id('writer', $product['writer_id']);

                    ?>
                        <tr>
                            <td> </td>
                            <td><?= $cnt ?></td>
                            <td><?= $user['user_name'] ?></td>
                            <td><?= $policy['policy_code'] ?></td>
                            <td><?= $user['user_passport'] ?></td>
                            <td>
                                <img alt="therapist image" src="<?= file_url . $underwriter['writer_image'] ?>" style="width:100px; height:auto; border-radius:5px;" title="<?= $underwriter['writer_name'] ?>">
                            </td>
                            <td> <?= $product['product_name'] ?> </td>


                            <td> <?= $category['category_name'] ?> </td>
                            <td> <?= get_ordinal_month_year($policy['policy_start_date']) ?> </td>
                            <td> <?= get_ordinal_month_year($policy['policy_end_date']) ?> </td>
                            <td>
                                <a href="<?= admin_url ?>policy_details?id=<?= $policy_id ?>" style="margin-bottom:10px;" class="btn btn-secondary">
                                    <i class="fa-regular fa-eye"></i>
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