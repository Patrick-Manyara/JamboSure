<?php
$page = 'all_therapists';
//  require_once '../path.php';
include_once 'header.php';
$therapists = get_all_therapists();

$num_columns = 9;

$column_indexes = range(0, $num_columns - 1);

// Create an array of column definition objects
$column_defs = array();
for ($i = 0; $i < $num_columns; $i++) {
    $column_defs = array(
        array('data' => '', 'title' => 'id'),
        array('data' => 'col_' . $i, 'title' => 'id'),
        array('data' => 'therapist_image', 'title' => 'Image'),
        array('data' => 'therapist_name', 'title' => 'Name'),
        array('data' => 'therapist_email', 'title' => 'Email'),
        array('data' => 'therapist_phone', 'title' => 'Phone'),
        array('data' => 'therapist_address', 'title' => 'Address'),
        array('data' => 'therapist_gender', 'title' => 'Gender'),
        array('data' => '', 'title' => 'Action')
    );
}
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">View</span> Therapists</h4>

    <!-- DataTable with Buttons -->
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class="datatables-basic table border-top">
                <thead>
                    <tr>
                        <th></th>

                        <th>id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cnt = 1;
                    foreach ($therapists as $therapist) {
                        $therapist_id = encrypt($therapist['therapist_id']);
                    ?>
                        <tr>
                            <td></td>
                            <td><?= $cnt ?></td>
                            <td>
                                <img alt="therapist image" src="<?= file_url . $therapist['therapist_image'] ?>" style="width:100px; height:auto; border-radius:5px;" title="<?= $therapist['therapist_name'] ?>">
                            </td>
                            <td> <?= $therapist['therapist_name'] ?> </td>
                            <td> <?= $therapist['therapist_email'] ?> </td>
                            <td> <?= $therapist['therapist_phone'] ?> </td>
                            <td> <?= $therapist['therapist_address'] ?> </td>
                            <td> <?= $therapist['therapist_gender'] ?> </td>
                            <td>
                                <a href="<?= admin_url ?>therapist?id=<?= $therapist_id ?>" class="btn btn-success">
                                    <i class='bx bx-edit'></i>
                                </a>
                                <a href="<?= delete_url ?>id=<?= $therapist_id ?>&table=<?= encrypt('therapist') ?>&page=<?= encrypt('view_therapists') ?>&method=therapist" class="btn btn-danger">
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