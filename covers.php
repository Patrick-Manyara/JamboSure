<?php
$page = 'benefits';
include_once 'header.php';

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

$MATH = (6 / 100 * $_POST['value']);
$newPr = (0.75 / 100 * $_POST['value']) + $MATH;
$lev = (0.45 / 100 * $newPr) + 40 + +$newPr;


// cout($lev);
// Add the total benefit to the original price
$newPrice2 = $totalBenefit + $_POST['price'];

// Output the results
// echo "Original Price: " . $_POST['price'] . "\n";
// echo "Total Benefit: " . $totalBenefit . "\n";
// echo "New Price: " . $newPrice . "\n";

$levies = get_by_column('levy', 'product_id', security('product_id'), 'yes');
// cout($levies);
$totalBenefit2 = 0;
foreach ($levies as $levy) {

    if ($levy['levy_mode'] == 'rate') {
        // If it's a rate, multiply the percentage to the post price
        $totalBenefit2 += $levy['levy_rate'] / 100 * $newPrice2;
    } elseif ($levy['levy_mode'] == 'price') {
        // If it's a price, add the block figure to the total benefit
        $totalBenefit2 += $levy['levy_price'];
    }
}
// cout($totalBenefit2);
$newPrice = $totalBenefit2 + $totalBenefit + $_POST['price'];

$levyTotal = 0;


$levyTotal = 0.45 / 100 * $newPrice;



$officialPrice = $levyTotal + $newPrice;

if (isset($_POST['benefits']) && is_array($_POST['benefits'])) {
    $benefitsString = implode(',', $_POST['benefits']);
}

?>


<!-- Start of breadcrumb section
	============================================= -->
<section id="in-breadcrumb" class="in-breadcrumb-section">
    <div class="in-breadcrumb-content position-relative" data-background="assets/img/new/header.png">
        <div class="background_overlay"></div>
        <div class="container">
            <div class="in-breadcrumb-title-content position-relative headline ul-li">
                <span> </span>
                <h2>Home / <?= ucwords($page) ?></h2>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container">

        <div class="col-lg-12 mb-4 order-0">


            <h6>Amount to Pay:</h6>

            <p><?= 'Ksh. ' . $newPrice ?></p>


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
</section>




<?php include_once 'footer.php'; ?>