<?php
$page = 'create account';
include_once 'header.php';
?>


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


<section id="in-about-1" class="in-about-section-1 about-page-about position-relative">
    <div class="container">
        <div class="DeeFlex">
            <div class="QuotesCard2">
                <div class="DeeFlex">

                    <div class="QuotesInner2">
                        <h2>
                            Create Account
                        </h2>
                        <p>
                            In order to create an account please fill in the details below
                        </p>
                        <form method="POST"  enctype="multipart/form-data" action="<?= model_url ?>register<?= isset($_GET['payment']) ? '&payment' : '' ?>">
                            <div class="LoginInputs">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Enter Your Full Name</label>
                                            <input type="text" required placeholder="Full Name*" id="Name" required name="user_name" class="LoginInput" />
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                             <label>Enter Your Email Address</label>
                                            <input type="email" required placeholder="Email Address*" id="Email" required name="user_email"  class="LoginInput" />
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Enter Your Phone Number</label>
                                            <input type="text" required placeholder="Phone Number*" id="Phone" required name="user_phone" class="LoginInput" />
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label>Select Your Gender</label>
                                        <select name="user_gender" class="form-select form-control LoginInput" required aria-label="Default select example">
                                            <option selected>Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>




                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Enter Your KRA PIN</label>
                                            <input type="text" name="user_kra" required  placeholder="KRA PIN*" class="LoginInput" />
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Enter Your Date of Birth</label>
                                            <input required type="date" placeholder="Date of Birth*" name="user_dob" class="LoginInput" />
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="custom-file-upload">
                                                <input required type="file" name="national" />
                                                <i class="far fa-cloud-upload" style="color:<?= $secondarycolor ?>"></i> Upload National ID
                                            </label>
                                        </div>
                                    </div>
                               
                                <div class="form-group">
                                    <input type="password" required  name="user_password" placeholder="Password" class="LoginInput" />
                                </div>
                                <div class="form-group">
                                    <input type="password" required name="confirm_password" placeholder="Confirm Password" class="LoginInput" />
                                </div>
                                <div class="JusAround">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            I agree to <a href="#" style="color:<?= $maincolor ?>"> Terms of Service </a>and <a href="#" style="color:<?= $maincolor ?>"> Privacy Policy</a> .
                                        </label>
                                    </div>
                                </div>

                                <div class="MarginTop">
                                    <button type="submit" class="BlueBtn">
                                        Continue
                                    </button>
                                </div>

                                <div class="DeeFlex MarginTop">

                                    <a href="login.php">
                                        Have an account already?
                                        <span style="color:<?= $maincolor ?>;">
                                            Login
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of About section
	============================================= -->
<script>
    $(document).ready(function() {
        $('#client_type').change(function() {
            var selected_value = $(this).val();
            if (selected_value == 'business') {
                $('#business_input').css('display', 'none');
            }
            if (selected_value == 'business') {
                $('#business_input').css('display', 'block');
            }
            if (selected_value == 'individual') {
                $('#business_input').css('display', 'none');
            }
        });
    });
</script>

<style>
        input[type="file"] {
        display: none;
    }

    .custom-file-upload {
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
        width: 100%;
        margin: 10px 0em;
        height: 4em;
    }

</style>


<?php include_once 'footer.php'; ?>