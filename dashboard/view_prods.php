<?php
$page = 'product';
include_once 'header.php';
$products = get_all('prod');

$num_columns = 8;

$column_indexes = range(0, $num_columns - 1);

// Create an array of column definition objects
$column_defs = array();
for ($i = 0; $i < $num_columns; $i++) {
    $column_defs = array(
        array('data' => '', 'title' => 'id'),
        array('data' => 'col_' . $i, 'title' => 'id'),
        array('data' => 'prod_phone', 'title' => 'Code'),
        array('data' => 'prod_image', 'title' => 'Underwriter'),
        array('data' => 'prod_name', 'title' => 'Name'),
        array('data' => 'prod_email', 'title' => 'Price'),
        array('data' => 'prod_duration', 'title' => 'Cover Duration'),
        array('data' => '', 'title' => 'Action')
    );
}

// $add = 'prod.php';
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">View</span> Products</h4>
    <button style="margin-top:20px; margin-bottom:10px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
        Add Product
    </button>


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
                        $prod_id = encrypt($product['prod_id']);
                        if ($product['prod_category'] == 'third_party') {
                            $price = 'Calc.';
                        } else {
                            if ($product['prod_price_type'] == 'rate') {
                                $price = $product['prod_rate'] .  "% of Premium";
                            } else {
                                $price = 'Ksh. ' . $product['prod_price'];
                            }
                        }
                    ?>
                        <tr>
                            <td></td>
                            <td><?= $cnt ?></td>
                            <td> <?= $product['prod_code'] ?> </td>
                            <td>
                                <img alt="therapist image" src="<?= file_url . get_by_id('writer', $product['writer_id'])['writer_image'] ?>" style="width:100px; height:auto; border-radius:5px;" title="<?= $product['prod_name'] ?>">
                            </td>
                            <td> <?= $product['prod_name'] ?> </td>
                            <td> <?= $price ?> </td>
                            <td> <?= $product['prod_duration'] ?> </td>

                            <td>
                                <a href="<?= admin_url ?>prod_details?id=<?= $prod_id ?>" style="margin-bottom:10px;" class="btn btn-secondary">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="<?= delete_url ?>id=<?= $prod_id ?>&table=<?= encrypt('prod') ?>&page=<?= encrypt('view_prods') ?>&method=simple_admin" class="btn btn-danger">
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

    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="margin-top:20px; margin-bottom:10px;">
                        <h4>Select Insurance Type:</h4>
                        <div>
                            <input type="radio" id="comprehensive" name="insurance_type" value="comprehensive">
                            <label for="comprehensive">Comprehensive</label>
                        </div>
                        <div>
                            <input type="radio" id="third_party" name="insurance_type" value="third_party">
                            <label for="third_party">Third Party</label>
                        </div>
                    </div>

                    <div style="margin-top:20px; margin-bottom:10px;">
                        <h4>Select Product Type:</h4>
                        <div>
                            <input type="radio" id="private" name="vehicle_type" value="private">
                            <label for="private">Private</label>
                        </div>
                        <div>
                            <input type="radio" id="commercial" name="vehicle_type" value="commercial">
                            <label for="commercial">Commercial</label>
                        </div>
                        <div>
                            <input type="radio" id="motorbike" name="vehicle_type" value="motorbike">
                            <label for="motorbike">Motorbike</label>
                        </div>
                        <div>
                            <input type="radio" id="tuktuk" name="vehicle_type" value="tuktuk">
                            <label for="tuktuk">Tuktuk</label>
                        </div>
                        <div>
                            <input type="radio" id="movers" name="vehicle_type" value="movers">
                            <label for="movers">Movers</label>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary" onclick="redirectToPage()">Submit</button>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- / Content -->

<script>
    function redirectToPage() {
        var insuranceType = document.querySelector('input[name="insurance_type"]:checked').value;
        var vehicleType = document.querySelector('input[name="vehicle_type"]:checked').value;
        var redirectUrl = vehicleType + '.php'; // Assuming your PHP files are named accordingly
        // Append insurance type as query parameter
        redirectUrl += '?insurance_type=' + insuranceType;
        window.location.href = redirectUrl;
    }

    $(document).ready(function() {
        // You can keep other jQuery code here if needed
    });
</script>


<?php
include_once 'footer.php';
?>