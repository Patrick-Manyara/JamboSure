<?php
$page = 'benefit';
include_once 'header.php';
$benefits = get_all('benefit');

$num_columns = 8;

$column_indexes = range(0, $num_columns - 1);

// Create an array of column definition objects
$column_defs = array();
for ($i = 0; $i < $num_columns; $i++) {
    $column_defs = array(
        array('data' => '', 'title' => 'id'),
        array('data' => 'col_' . $i, 'title' => 'id'),
        array('data' => 'benefit_email', 'title' => 'Benefit'),
        array('data' => 'a', 'title' => 'Cost'),
        array('data' => 'b', 'title' => 'Rate'),
        array('data' => 'v', 'title' => 'Date Added'),
        array('data' => 'd', 'title' => 'Benefit Code'),
        array('data' => 'aa', 'title' => 'Action')
    );
}

$add = 'benefit.php';
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">View</span> benefits</h4>
    <!--<a href="benefit" style="margin-top:20px; margin-bottom:10px;"  class="btn btn-primary">Add Benefit</a>-->
    <!-- DataTable with Buttons -->
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class="datatables-basic table border-top">
                <thead>
                    <tr>
                        <th> </th>

                        <th>id</th>
                        <th>Benefit</th>
                        <th>Cost</th>
                        <th>Rate</th>
                        <th>Date Added</th>
                        <th>Benefit ID</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cnt = 1;
                    foreach ($benefits as $benefit) {
                        $benefit_id = encrypt($benefit['benefit_id']);
                        
                        if($benefit['benefit_free'] == 'yes'){
                            $cost = 'Free Benefit';
                            $rate = 'Free Benefit';
                        }else{
                           
                            if($benefit['benefit_price'] == 0.00){
                                $cost = 'On Additional Limit';
                            }else{
                                 $cost = 'Ksh. ' . $benefit['benefit_price'];
                            }
                            $rate = $benefit['benefit_rate'] . '%';
                        }
                        

                    ?>
                        <tr>
                            <td> </td>
                            <td><?= $cnt ?></td>
                           
                            <td> <?= $benefit['benefit_name'] ?> </td>
                            <td> <?=  $cost ?> </td>
                            <td> <?=$rate  ?> </td>
                            <td> <?= get_ordinal_month_year($benefit['benefit_date_created']) ?> </td>
                            <td> <?= strtoupper($benefit['benefit_code']) ?> </td>
                      
                            <td>
                                <a href="<?= admin_url ?>benefit?id=<?= $benefit_id ?>" class="btn btn-info">
                                    <i class='bx bx-edit'></i>
                                </a>
                                <a href="<?= delete_url ?>id=<?= $benefit_id ?>&table=<?= encrypt('benefit') ?>&page=<?= encrypt('view_benefits') ?>&method=simple_admin" class="btn btn-danger">
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