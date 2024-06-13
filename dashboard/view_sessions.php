<?php
$page = 'view_transfers';
//  require_once '../path.php';
include_once 'header.php';
$sessions = get_all_sessions();

$num_columns = 10;

$column_indexes = range(0, $num_columns - 1);

// Create an array of column definition objects
$column_defs = array();
for ($i = 0; $i < $num_columns; $i++) {
    $column_defs = array(
        array('data' => '', 'title' => 'id'),
        array('data' => 'col_' . $i, 'title' => 'id'),
        array('data' => 'therapist_name', 'title' => 'Therapist'),
        array('data' => 'user_name', 'title' => 'Client'),
        array('data' => 'date', 'title' => 'Date'),
        array('data' => 'time', 'title' => 'time'),
        array('data' => 'mode', 'title' => 'mode'),
         array('data' => 'link', 'title' => 'link'),
                  array('data' => 'payment', 'title' => 'Payment'),
        array('data' => '', 'title' => 'Action')
    );
}
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">View</span> Sessions</h4>

    <!-- DataTable with Buttons -->
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class="datatables-basic table border-top">
                <thead>
                    <tr>
                        <th></th>
                        <th>id</th>
                        <th>Therapist</th>
                        <th>Client</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Mode</th>
                        <th>Link</th>
                        <th>Payment</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cnt = 1;
                    foreach ($sessions as $session) {
                        $session_id = encrypt($session['session_id']);
                    ?>
                        <tr>
                            <td></td>
                            <td><?= $cnt ?></td>
                            <td> <?= $session['therapist_name'] ?> </td>
                            <td> <?= $session['user_name'] ?> </td>
                            <td> <?= get_ordinal_month_year($session['session_date']) ?> </td>
                            <td> <?= date("h:i a", strtotime($session['session_start_time']))  . " to " .  date("h:i a", strtotime($session['session_end_time']))  ?> </td>
                            <td> <?= $session['session_mode'] ?> </td>
                             <?php
                                        if ($session['session_mode'] == 'virtual') {
                                            echo '<td> <a href = "' . $session['session_link'] . '">' . $session['session_link'] . ' </a></td> ';
                                        }
                                        else{
                                            echo '<td>None</td>';
                                        }
                                        ?>
                                        <?php
                                        if ($session['therapist_paid'] == 'not_paid' && $session['session_done'] == 'done') {
                                            echo '<td><a href="make_payment?id=' . $session_id . '" class="btn btn-info">PAY</a></td> ';
                                        }
                                        else{
                                            echo '<td>PAID</td> ';
                                        }
                                        ?>
                            <td>
                                <a href="<?= base_uri ?>model/delete?id=<?= $session_id ?>&table=<?= encrypt('session') ?>&page=<?= encrypt('view_sessions') ?>&method=simple_admin" class="btn btn-danger">
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