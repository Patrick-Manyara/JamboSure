<?php
$page = 'Motorbike';
include_once 'header.php';
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
<!-- End of breadcrumb section
	============================================= -->

<!-- Start of About section
	============================================= -->
<section id="in-about-1" class="in-about-section-1 about-page-about position-relative">
    <div class="container">

        <div class="ModalForms">


            <form method="POST" action="benefits.php">
                <input hidden name="prod_type" value="Motorbike" />

                <div class="ModalCheckBoxes">
                    <div class="form-check">
                        <input class="form-check-input subpolicies_checkbox" type="radio" name="prod_category" value="comprehensive" id="comprehensive_radio" checked>
                        <label class="form-check-label" for="comprehensive_radio">
                            Comprehensive
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input subpolicies_checkbox" type="radio" name="prod_category" value="third_party" id="thirdparty_radio">
                        <label class="form-check-label" for="thirdparty_radio">
                            Third Party
                        </label>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group ModalFormInput">
                            <select class="form-select fom-control" required name="cover_duration" aria-label="Default select example">
                                <option selected>Cover Duration</option>
                                <option value="1">1 month</option>
                                <option value="6">6 months</option>
                                <option value="12">12 months</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group ModalFormInput">
                            <input type="text" class="form-control" name="make" placeholder="Enter Make" aria-label="Enter Make">

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-12">
                        <div class="form-group ModalFormInput">
                            <input type="text" class="form-control" name="model" placeholder="Enter Model" aria-label="Enter Model">

                        </div>

                    </div>
                    <div class="col-lg-6 col-sm-12 col-12">
                         <div class="form-group ModalFormInput">
                                <select class="form-select fom-control" aria-label="Default select example">
                                    <option selected>Covered Person</option>
                                    <option value="1">Individual</option>
                                    <option value="2">Business</option>
                                </select>
                            </div>

                    </div>
                </div>



                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="form-group ModalFormInput">
                            <input type="number" class="form-control" placeholder="Estimated value in Ksh" name="value" aria-label="Estimated value in Ksh">
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

    </div>
</section>




<script>
    $(document).ready(function() {
        $('.subpolicies_checkbox').change(function() {
            // Get the value of the checked radio input
            var checkedValue = $('input[name="prod_category"]:checked').val();
            console.log(checkedValue);
            // Check if the radio input is 'comprehensive'
            if (checkedValue === 'comprehensive') {
                // Enable all inputs with name "value"
                $('input[name="value"]').prop('disabled', false);
            } else if (checkedValue === 'third_party') {
                // Disable all inputs with name "value"
                $('input[name="value"]').prop('disabled', true);
            }
        });

    })
</script>






<?php include_once 'footer.php'; ?>