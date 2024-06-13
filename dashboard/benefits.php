<?php
$page        = 'dashboard';
$header_name = 'Home';

//  require_once '../path.php';
require_once 'header.php';

if (!isset($_POST['subcategory_id'])) {
    // $cats       = get_by_column('product', 'category_id', security('category_id'));
    $sql = "SELECT * FROM product WHERE category_id = '$_POST[category_id]' AND product_duration = '$_POST[duration]' ";
    $cats = select_rows($sql);
} else {
    // $cats       = get_by_column('product', 'subcategory_id', security('subcategory_id'));
    $sql = "SELECT * FROM product WHERE subcategory_id = '$_POST[subcategory_id]' AND product_duration = '$_POST[duration]' ";
    $cats = select_rows($sql);
}


// $subcats    = get_dropdown_data(get_all('subcategory'), 'subcategory_name', 'subcategory_id');
// cout($_POST);

?>


<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="InsuranceHeader">
                    <div class="InsuranceHeaderTop">
                        <div class="InsurancerTop">
                            <h3>
                                Make
                            </h3>
                            <h3>
                                Model
                            </h3>
                            <h3>
                                Year
                            </h3>
                            <h3>
                                Amount Insured
                            </h3>
                            <h3>
                                Cover Duration
                            </h3>
                        </div>
                    </div>
                    <div class="InsuranceHeaderBottom">
                        <div class="InsurancerBottom">
                            <h3>
                                <?= $_POST['make'] ?>
                            </h3>
                            <h3>
                                <?= $_POST['model'] ?>
                            </h3>
                            <h3>
                                <?= $_POST['year'] ?>
                            </h3>
                            <h3>
                                <?= $_POST['value'] ?>
                            </h3>
                            <h3 style="display: inline-flex;">
                               <?= $_POST['duration'] ?>
                            </h3>
                        </div>
                    </div>
                </div>
               

                <input hidden name="product_id" value="<?= $value ?>" />
                <div class="col-lg-12 mb-4">
                    <?php
                    if (!empty($cats)) {
                        foreach ($cats as $product) {

                            $benefits       = get_by_column('benefit', 'product_id', $product['product_id']);
                            $levies       = get_by_column('levy', 'product_id', $product['product_id']);


                            if ($product['product_mode'] == 'rate') {
                                $price = ($product['product_rate'] / 100 * security('value'));
                            } else {
                                $price = $product['product_price'];
                            }
                            // $price = ($product['product_rate'] / 100 * security('value'));
                    ?>
                            <form enctype="multipart/form-data" action="covers.php" method="POST">


                                <?php
                                if (isset($_POST['make'])) {
                                    foreach ($_POST as $key => $value) {
                                ?>
                                        <input hidden name="<?= $key ?>" value="<?= $value ?>" />
                                <?php
                                    }
                                }

                                ?>

                                <div class="QuotesCard">
                                    <div class="QuotesInner">
                                        <div class="SingleQuote">
                                            <div class="SingleQuoteContent">
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-12 col-12 ContentQuote">
                                                        <img src="<?= file_url . get_by_id('writer', $product['writer_id'])['writer_image'] ?>" style="width:100px; height:auto; border-radius:5px;" title="<?= $product['product_name'] ?>" />

                                                    </div>
                                                    <div class="col-lg-3 col-sm-12 col-12 ContentQuote">
                                                        <?= $product['product_name']  ?>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-12 col-12 ContentQuote">
                                                        <p>
                                                            <b>
                                                                Ksh <?= $price  ?>
                                                            </b>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-12 col-12 ContentQuote">
                                                        <button class="InputBtnClear" id="benefitBtn<?= $product['product_id'] ?>" type="button">
                                                            Add Benefits
                                                        </button>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                
                                <input hidden name="price" value="<?= $price  ?>" />

                                <input hidden name="product_id" value="<?= $product['product_id'] ?>" />

                                <div style="display: none;" id="BenefitsDiv<?= $product['product_id'] ?>">
                                    <?php
                                    foreach ($benefits as $ben) {
                                        if ($ben['benefit_mode'] == 'rate') {
                                            $price = $ben['benefit_rate'] .  " of Value";
                                        } else {
                                            $price = 'Ksh. ' . $ben['benefit_price'];
                                        }
                                    ?>
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" name="benefits[]" type="checkbox" value="<?= $ben['benefit_id'] ?>" />
                                            <label class="form-check-label" for="<?= $ben['benefit_id'] ?>"> <?= $ben['benefit_name'] . " - " . $price ?> </label>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-4 text-center mt-4">
                                        <div class="text-center">
                                            <button class="btn btn-primary" type="submit" id="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                    <?php
                        }
                    }

                    ?>



                </div>

            </div>
        </div>


    </div>


</div>

<script>
    $(document).ready(function() {
        var SelectedValue;
        <?php
        if (!empty($cats)) {
            foreach ($cats as $item) {
        ?>
                $('#benefitBtn<?= $item['product_id'] ?>').click(function() {
                    // Hide all elements with BenefitsDiv class
                    $('[id^=BenefitsDiv]').css('display', 'none');

                    // Show the clicked element
                    $('#BenefitsDiv<?= $item['product_id'] ?>').css('display', 'block');
                });
        <?php
            }
        }
        ?>
    });
</script>



<?php include_once 'footer.php'; ?>