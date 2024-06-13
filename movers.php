<?php
$page = 'Prime Movers';
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
        <div class="ModalCheckBoxes">
            <div class="form-check">
                <input class="form-check-input subpolicies_checkbox" type="radio" name="subpolicies_checkbox" value="comprehensive" id="comprehensive_radio" checked>
                <label class="form-check-label" for="comprehensive_radio">
                    Comprehensive
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input subpolicies_checkbox" type="radio" name="subpolicies_checkbox" value="thirdparty" id="thirdparty_radio">
                <label class="form-check-label" for="thirdparty_radio">
                    Third Party
                </label>
            </div>

        </div>



        <div class="ModalForms">

            <div id="PrivateForm">

                <form method="POST" action="benefits.php">
                    <input hidden name="category_id" class="categoryVal" />
                    <input hidden name="subcategory_id" class="subcategoryVal" />

                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group ModalFormInput">
                                <select class="form-select fom-control" name="cover_duration" aria-label="Default select example">
                                    <option selected>Cover Duration</option>
                                    <option value="1">1 month</option>
                                    <!-- <option value="2">6 months</option> -->
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
                                <div class="form-group ModalFormInput">
                                    <input type="number" class="form-control" placeholder="Year Of Manufacture" name="year" aria-label="Year">
                                </div>
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

    </div>
</section>




<script>
    $(document).ready(function() {
        $(".categoryVal").val('CAT1');
        $(".subcategoryVal").val('SUB1');


        $('#motor_car').click(function() {
            $('#myModal2').modal('show');
        });


        $('.myClose').click(function() {
            $('#myModal').modal('hide');
        });

        $('.myClose2').click(function() {
            $('#myModal2').modal('hide');
        });

        $('.policies_checkbox').change(function() {
            var cat_val = $(this).val();
            if (cat_val == 'commercial') {
                $('#PrivateForm').css('display', 'none');
                $('#CommercialForm').css('display', 'block');
                $(".categoryVal").val('CAT2');
            }


            if (cat_val == 'private') {
                $('#PrivateForm').css('display', 'block');
                $('#CommercialForm').css('display', 'none');
                $(".categoryVal").val('CAT1');
            }
        });

        $('.subpolicies_checkbox').change(function() {
            var subcatval = $(this).val();
            if (subcatval == 'comprehensive') {
                $(".subcategoryVal").val('SUB1');
            }


            if (subcatval == 'third_party') {
                $(".subcategoryVal").val('SUB2');
            }
        });

        $('.subpolicies_checkbox').change(function() {
            // Get the value of the checked radio input
            var checkedValue = $('input[name="subpolicies_checkbox"]:checked').val();
            console.log(checkedValue);
            // Check if the radio input is 'comprehensive'
            if (checkedValue === 'comprehensive') {
                // Enable all inputs with name "value"
                $('input[name="value"]').prop('disabled', false);
            } else if (checkedValue === 'thirdparty') {
                // Disable all inputs with name "value"
                $('input[name="value"]').prop('disabled', true);
            }
        });


    })
</script>






<?php include_once 'footer.php'; ?>