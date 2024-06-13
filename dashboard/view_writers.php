<?php
$page = 'writer';
include_once 'header.php';
$writers = get_all('writer');

$num_columns = 5;

$column_indexes = range(0, $num_columns - 1);

// Create an array of column definition objects
$column_defs = array();
for ($i = 0; $i < $num_columns; $i++) {
    $column_defs = array(
        array('data' => '', 'title' => 'id'),
        array('data' => 'col_' . $i, 'title' => 'id'),
        array('data' => 'writer_image', 'title' => 'Image'),
        array('data' => 'writer_name', 'title' => 'Name'),
        array('data' => '', 'title' => 'Action')
    );
}

$add = 'writer.php';
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">View</span> Underwriters</h4>

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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cnt = 1;
                    foreach ($writers as $writer) {
                        $writer_id = encrypt($writer['writer_id']);
                    ?>
                        <tr>
                            <td></td>
                            <td><?= $cnt ?></td>
                            <td>
                                <img alt="therapist image" src="<?= file_url . $writer['writer_image'] ?>" style="width:100px; height:auto; border-radius:5px;" title="<?= $writer['writer_name'] ?>">
                            </td>
                            <td> <?= $writer['writer_name'] ?> </td>
                            <td>
                                <a href="<?= admin_url ?>writer?id=<?= $writer_id ?>" class="btn btn-success">
                                    <i class='bx bx-edit'></i>
                                </a>
                                <a href="<?= delete_url ?>id=<?= $writer_id ?>&table=<?= encrypt('writer') ?>&page=<?= encrypt('view_writers') ?>&method=simple_admin" class="btn btn-danger">
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