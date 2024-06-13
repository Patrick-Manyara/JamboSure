<?php
$page = 'quotes';
include_once 'header.php';
// cout($_POST);

$sql = "SELECT * FROM prod WHERE prod_category = '$_POST[prod_category]' AND prod_type = '$_POST[prod_type]' ";
$products = select_rows($sql);


?>


<!-- Start of breadcrumb section
	============================================= -->
<section id="in-breadcrumb" class="in-breadcrumb-section">
    <div class="in-breadcrumb-content position-relative" data-background="assets/img/new/header.png">
        <div class="background_overlay"></div>
        <div class="container">
            <div class="in-breadcrumb-title-content position-relative headline ul-li">
                <span> </span>
                <h2><?= ucwords($page) ?></h2>
            </div>
        </div>
    </div>
</section>


<section id="in-about-1" class="in-about-section-1 about-page-about position-relative">
    <div class="container">
        <div class="DeeStart">
            <h2 class="AboutHeader">
                <?= $_POST['prod_type'] . " " . $_POST['prod_category'] ?> Insurance
            </h2>
        </div>
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

                    <?php
                    if ($_POST['prod_category'] != 'third_party') { ?>
                        <h3>
                            Amount
                        </h3>
                    <?php
                    }
                    ?>

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


                    <?php
                    if ($_POST['prod_category'] != 'third_party') { ?>

                        <h3>
                            <?= $_POST['value'] ?>

                        </h3>
                    <?php
                    }
                    ?>

                    <h3 style="display: inline-flex;">
                        <?= $_POST['cover_duration'] ?>
                        months <i id="pencil" class="fas fa-pen"></i>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="DeeStart">
            <h2 class="AboutHeader">
                Quotes Available
            </h2>
        </div>


        <div class="col-lg-12 mb-4">
            <?php
            $userValue = security('value');
            if (!empty($products)) {
                foreach ($products as $product) {
                    if ($product['prod_category'] != 'third_party') {
                        $sql33 = "SELECT * FROM prod_benefit WHERE prod_id = '$product[prod_id]' ";
                        $benefits       = select_rows($sql33);

                        $sql22 = "SELECT * FROM prod_benefit WHERE prod_id = '$product[prod_id]'  ";
                        $free_benefits = select_rows($sql22);



                        $sql2 = "SELECT * FROM value_class WHERE prod_id = '$product[prod_id]' ";
                        $values = select_rows($sql2);

                        // Iterate through each value class
                        foreach ($values as $valueClass) {

                            // Check if the user's value falls within the range of this value class
                            if ($valueClass['value_class_min_range'] === 'below' && $userValue <= $valueClass['value_class_max_range']) {
                                // This is the appropriate value class
                                $rate = $valueClass['value_class_rate'];
                                $price = $valueClass['value_class_price'];
                                break; // Exit the loop since we found the appropriate value class
                            } elseif ($valueClass['value_class_max_range'] === 'above' && $userValue >= $valueClass['value_class_min_range']) {
                                // This is the appropriate value class
                                $rate = $valueClass['value_class_rate'];
                                $price = $valueClass['value_class_price'];
                                break; // Exit the loop since we found the appropriate value class
                            } elseif ($userValue >= $valueClass['value_class_min_range'] && $userValue <= $valueClass['value_class_max_range']) {
                                // This is the appropriate value class
                                $rate = $valueClass['value_class_rate'];
                                $price = $valueClass['value_class_price'];
                                break; // Exit the loop since we found the appropriate value class
                            }
                        }

                        $totalPrice = $userValue * $rate / 100;

                        if ($totalPrice < $price) {
                            // Set the totalPrice to the value_class_price
                            $totalPrice = $price;
                        }
                    } else {
                        if ($_POST['cover_duration'] == '12') {
                            $totalPrice = get_by_id('prod', $product['prod_id'])['prod_twelve_fee'];
                        } else {
                            $totalPrice = get_by_id('prod', $product['prod_id'])['prod_one_fee'];
                        }
                    }
            ?>
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

                        <div class="QuotesCard">
                            <div class="QuotesInner">
                                <div class="SingleQuote">
                                    <div class="SingleQuoteContent">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-12 col-12 ContentQuote">
                                                <img src="<?= file_url . get_by_id('writer', $product['writer_id'])['writer_image'] ?>" style="width:100px; height:auto; border-radius:5px;" title="<?= $product['prod_name'] ?>" />

                                            </div>
                                            <div class="col-lg-3 col-sm-12 col-12 ContentQuote">
                                                <?= $product['prod_name']  ?>
                                            </div>

                                            <div class="col-lg-3 col-sm-12 col-12 ContentQuote">
                                                <p>
                                                    <b>
                                                        Ksh. <?= number_format($totalPrice)  ?>
                                                    </b>
                                                </p>
                                            </div>



                                            <div class="col-lg-3 col-sm-12 col-12 ContentQuote">
                                                <?php
                                                if ($_POST['prod_category'] != 'third_party') { ?>
                                                    <button class="InputBtnClear" id="benefitBtn<?= $product['prod_id'] ?>" type="button">
                                                        Add Benefits
                                                    </button>
                                                <?php
                                                } else { ?>
                                                    <button class="btn btn-primary" type="submit" id="submit">Submit</button>
                                                <?php

                                                }
                                                ?>
                                            </div>


                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <input hidden name="price" value="<?= $totalPrice  ?>" />

                        <input hidden name="product_id" value="<?= $product['prod_id'] ?>" />

                        <div style="display: none;" id="BenefitsDiv<?= $product['prod_id'] ?>">

                            <div class="DeeStart">
                                <h2 class="AboutHeader">
                                    Cover Details
                                </h2>
                            </div>

                            <div class="CoversCard">
                                <div class="QuotesInner">
                                    <div class="SingleBenefit">
                                        <div class="SingleQuoteContent">
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-12 col-12 ContentQuote">
                                                    <p style="color:white;">
                                                        <b>
                                                            Optional Benefits
                                                        </b>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 col-sm-12 col-12 ContentQuote">
                                                    <p style="color:white;">
                                                        <b>
                                                            Amount
                                                        </b>
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>

                            <?php
                            foreach ($benefits as $item) {
                                $ben = get_by_id('benefit', $item['benefit_id']);
                                
                                if($ben['benefit_free'] != 'yes'){
                                    if ($ben['benefit_price'] == 0.00) {
                                        $cost = 'On Additional Limit';
                                    } else {
                                        $cost = 'Ksh. ' . number_format($ben['benefit_price']);
                                    }
                                    $rate = $ben['benefit_rate'] . '%';
                                }else{
                                    $cost = 'Free Benefit';
                                    $rate = 'Free Benefit';
                                }
                            ?>

                                <div class="SingleCover">
                                    <div class="SingleQuoteContent">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12 col-12 ContentQuote">
                                                <p>
                                                    <b>
                                                        <?= $ben['benefit_name']   ?>
                                                    </b>
                                                </p>
                                            </div>
                                            <div class="col-lg-3 col-sm-12 col-12 ContentQuote">
                                                <p>
                                                    <b>
                                                        <?= $cost  ?>
                                                    </b>
                                                </p>
                                            </div>
                                            <?php
                                            if($ben['benefit_free'] == 'yes'){ ?>
                                            <div class="col-lg-3 col-sm-12 col-12 ContentQuote ">
                                                <p><b>Free</b></p>
                                            </div>
                                            <?php
                                                
                                            }else{ ?>
                                            <div class="col-lg-3 col-sm-12 col-12 ContentQuote custom-checkbox">
                                                <input class="form-check-input" name="benefits[]" type="checkbox" value="<?= $ben['benefit_id'] ?>" />
                                                <label for="checkbox1">Add</label>
                                            </div>
                                            <?php
                                                
                                            }
                                            ?>
                                            
                                            
                                            
                                        </div>
                                    </div>
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
</section>

<div class="modal wow fadeInDown" tabindex="-1" role="dialog" id="myModal2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h3 class="GreenHeader MarginBottom" style="font-size: 20px;">
                    Edit Details
                </h3>
                <button type="button" class="close myClose2" data-dismiss="modal" aria-label="Close">
                    X
                </button>
            </div>
            <div class="modal-body">

                <div class="ModalBodyInner">



                    <div class="ModalForms">

                        <div id="PrivateForm">
                            <form method="POST" action="benefits.php">
                                <div class="row">
                                    <div class="DeeFlex" style="width: 100%;">
                                        <div style="width:30%;height: 100%;">
                                            <p class="DeeFlex" style="height: 100%;">
                                                <b>
                                                    Make
                                                </b>
                                            </p>
                                        </div>
                                        <div style="width:70%">
                                            <div class="form-group ModalFormInput">
                                                <input type="text" class="form-control" value="<?= security('make') ?>" name="make" placeholder="Enter Make" aria-label="Enter Make">
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="DeeFlex" style="width: 100%;">
                                        <div style="width:30%;height: 100%;">
                                            <p class="DeeFlex" style="height: 100%;">
                                                <b>
                                                    Model
                                                </b>
                                            </p>
                                        </div>
                                        <div style="width:70%">
                                            <div class="form-group ModalFormInput">
                                                <input type="text" class="form-control" value="<?= security('model') ?>" name="model" placeholder="Enter Model" aria-label="Enter Make">
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="DeeFlex" style="width: 100%;">
                                        <div style="width:30%;height: 100%;">
                                            <p class="DeeFlex" style="height: 100%;">
                                                <b>
                                                    Year of Manufacture
                                                </b>
                                            </p>
                                        </div>
                                        <div style="width:70%">
                                            <div class="form-group ModalFormInput">
                                                <input type="number" class="form-control" value="<?= security('year') ?>" name="year" placeholder="Enter Year of Manufacture" aria-label="Enter Make">
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="DeeFlex" style="width: 100%;">
                                        <div style="width:30%;height: 100%;">
                                            <p class="DeeFlex" style="height: 100%;">
                                                <b>
                                                    Estimated value
                                                </b>
                                            </p>
                                        </div>
                                        <div style="width:70%">
                                            <div class="form-group ModalFormInput">
                                                <input type="number" class="form-control" value="<?= security('value') ?>" name="value" placeholder="Enter Amount Insured" aria-label="Enter Estimated value in Ksh">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="DeeFlex" style="width: 100%;">
                                        <div style="width:30%;height: 100%;">
                                            <p class="DeeFlex" style="height: 100%;">
                                                <b>
                                                    Cover Duration
                                                </b>
                                            </p>
                                        </div>
                                        <div style="width:70%">
                                            <div class="form-group ModalFormInput">
                                                <select class="form-select fom-control" name="cover_duration" aria-label="Default select example">
                                                    <option selected>Cover Duration</option>
                                                    <option value="1">1 month</option>
                                                    <option value="12">12 months</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="DeeFlex MarginTop">
                                    <button type="submit" class="InputBtn">
                                        Get A Quote
                                    </button>
                                </div>
                            </form>
                        </div>



                        <div id="CommercialForm">
                            <div class="FormText">
                                <p>Commercial</p>
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group ModalFormInput">
                                            <select class="form-select fom-control" aria-label="Default select example">
                                                <option selected>Cover Duration</option>
                                                <option value="1">1 month</option>
                                                <option value="2">6 months</option>
                                                <option value="3">12 months</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group ModalFormInput">
                                            <select class="form-select fom-control" aria-label="Default select example">
                                                <option selected>Make</option>
                                                <option value="1">BMW</option>
                                                <option value="2">Audi</option>
                                                <option value="3">Mazda</option>
                                                <option value="3">Toyota</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group ModalFormInput">
                                            <select class="form-select fom-control" aria-label="Default select example">
                                                <option selected>Model</option>
                                                <option value="1">116</option>
                                                <option value="2">216</option>
                                                <option value="3">318</option>
                                                <option value="3">320</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group ModalFormInput">
                                            <div class="form-group ModalFormInput">
                                                <input type="text" onfocus="(this.type='date')" class="form-control" placeholder="Year" aria-label="Year">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group ModalFormInput">
                                            <select class="form-select fom-control" aria-label="Default select example">
                                                <option selected>Covered Person</option>
                                                <option value="1">Individual</option>
                                                <option value="2">Business</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group ModalFormInput">
                                            <select class="form-select fom-control" aria-label="Default select example">
                                                <option selected>Type of Vehicle</option>
                                                <option value="1">Saloon</option>
                                                <option value="2">Three Wheeler</option>
                                                <option value="3">Four Wheeler</option>
                                                <option value="3">Toyota</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group ModalFormInput">
                                            <select class="form-select fom-control" aria-label="Default select example">
                                                <option selected>Use of Vehicle</option>
                                                <option value="1">Individual</option>
                                                <option value="2">Business</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group ModalFormInput">
                                            <select class="form-select fom-control" aria-label="Default select example">
                                                <option selected>Tonnage</option>
                                                <option value="1">1 Tonne</option>
                                                <option value="2">2 Tonnes</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12">
                                        <div class="form-group ModalFormInput">
                                            <input type="text" class="form-control" placeholder="Estimated value in Ksh" aria-label="Estimated value in Ksh">
                                        </div>

                                    </div>
                                </div>
                                <div class="DeeFlex MarginTop">
                                    <a class="InputBtn" href="benefits.php">
                                        Get A Quote
                                    </a>
                                </div>
                            </form>
                        </div>

                        <div id="PSVForm">
                            <div class="FormText">
                                <p>PSV</p>
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group ModalFormInput">
                                            <select class="form-select fom-control" aria-label="Default select example">
                                                <option selected>Cover Duration</option>
                                                <option value="1">1 month</option>
                                                <option value="2">6 months</option>
                                                <option value="3">12 months</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group ModalFormInput">
                                            <select class="form-select fom-control" aria-label="Default select example">
                                                <option selected>Make</option>
                                                <option value="1">BMW</option>
                                                <option value="2">Audi</option>
                                                <option value="3">Mazda</option>
                                                <option value="3">Toyota</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group ModalFormInput">
                                            <select class="form-select fom-control" aria-label="Default select example">
                                                <option selected>Model</option>
                                                <option value="1">116</option>
                                                <option value="2">216</option>
                                                <option value="3">318</option>
                                                <option value="3">320</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group ModalFormInput">
                                            <div class="form-group ModalFormInput">
                                                <input type="text" onfocus="(this.type='date')" class="form-control" placeholder="Year" aria-label="Year">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group ModalFormInput">
                                            <select class="form-select fom-control" aria-label="Default select example">
                                                <option selected>Covered Person</option>
                                                <option value="1">Individual</option>
                                                <option value="2">Business</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group ModalFormInput">
                                            <select class="form-select fom-control" aria-label="Default select example">
                                                <option selected>Type of Vehicle</option>
                                                <option value="1">Saloon</option>
                                                <option value="2">Three Wheeler</option>
                                                <option value="3">Four Wheeler</option>
                                                <option value="3">Toyota</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group ModalFormInput">
                                            <select class="form-select fom-control" aria-label="Default select example">
                                                <option selected>Use of Vehicle</option>
                                                <option value="1">Individual</option>
                                                <option value="2">Business</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group ModalFormInput">
                                            <select class="form-select fom-control" aria-label="Default select example">
                                                <option selected>Tonnage</option>
                                                <option value="1">1 Tonne</option>
                                                <option value="2">2 Tonnes</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12">
                                        <div class="form-group ModalFormInput">
                                            <input type="text" class="form-control" placeholder="Estimated value in Ksh" aria-label="Estimated value in Ksh">
                                        </div>

                                    </div>
                                </div>
                                <div class="DeeFlex MarginTop">
                                    <a class="InputBtn" href="benefits.php">
                                        Get A Quote
                                    </a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
            <!-- <div class="modal-footer">

                <button type="button" class="btn btn-secondary myClose2" data-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#pencil').click(function() {
            $('#myModal2').modal('show');
        });

        $('.myClose2').click(function() {
            $('#myModal2').modal('hide');
        });

        var SelectedValue;
        <?php
        if (!empty($products)) {
            foreach ($products as $item) {
        ?>
                $('#benefitBtn<?= $item['prod_id'] ?>').click(function() {
                    // Hide all elements with BenefitsDiv class
                    $('[id^=BenefitsDiv]').css('display', 'none');

                    // Show the clicked element
                    $('#BenefitsDiv<?= $item['prod_id'] ?>').css('display', 'block');
                });
        <?php
            }
        }
        ?>
    });
</script>
<?php include_once 'footer.php'; ?>