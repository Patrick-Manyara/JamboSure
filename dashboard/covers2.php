<?php
$page        = 'dashboard';
$header_name = 'Home';

//  require_once '../path.php';
require_once 'header.php';

// cout($_POST);

$totalBenefit = 0;

// Loop through the benefits array
foreach ($_POST['benefits'] as $ben) {
    $sql = "SELECT * FROM benefit WHERE benefit_id = '$ben' ";
    $benefit = select_rows($sql)[0];

    if ($benefit['benefit_mode'] == 'rate') {
        // If it's a rate, multiply the percentage to the post price
        $totalBenefit += $benefit['benefit_rate'] / 100 * $_POST['price'];
    } elseif ($benefit['benefit_mode'] == 'price') {
        // If it's a price, add the block figure to the total benefit
        $totalBenefit += $benefit['benefit_price'];
    }
}


// Add the total benefit to the original price
$newPrice = $totalBenefit;

// Output the results
// echo "Original Price: " . $_POST['price'] . "\n";
// echo "Total Benefit: " . $totalBenefit . "\n";
// echo "New Price: " . $newPrice . "\n";

$levies = get_by_column('levy', 'product_id', security('product_id'), 'yes');
// cout($levies);

$levyTotal = 0;

    
$levyTotal = 0.45 / 100 * $newPrice;
   


$officialPrice = $levyTotal + $newPrice;

if (isset($_POST['benefits']) && is_array($_POST['benefits'])) {
    $benefitsString = implode(',', $_POST['benefits']);
}
?>


<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            
            <p>Benefits you selected:</p>

            <?php
            
            foreach ($_POST['benefits'] as $item) {
                $benef = get_by_column('benefit', 'benefit_id', $item, 'no');
                if ($benef['benefit_mode'] == 'rate') {
                    $price = $benef['benefit_rate'] .  "% of Premium";
                } else {
                    $price = 'Ksh. ' . $benef['benefit_price'];
                }
            ?>
                <p><?= $benef['benefit_name'] ?>
                    -
                    <?= $price ?>
                </p>
                
            <?php
            }
            ?>

            <h6>Amount to Pay:</h6>

            <p><?= 'Ksh. ' . $officialPrice ?></p>


            <form enctype="multipart/form-data" action="<?= model_url ?>policy" method="POST">
                <?php
                if (isset($_POST['make'])) {
                    foreach ($_POST as $key => $value) {
                ?>
                        <input hidden name="<?= $key ?>" value="<?= $value ?>" />
                <?php
                    }
                }

                ?>
                <input hidden name="officialPrice" value="<?= $officialPrice ?>" />
                <input hidden name="benefitsString" value="<?= $benefitsString ?>" />

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-4 mt-4 text-center">
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit" id="submit">Submit</button>
                    </div>
                </div>
            </form>

        </div>


    </div>


</div>





<?php include_once 'footer.php'; ?>