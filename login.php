<?php
$page = 'login';
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
                            Welcome Back
                        </h2>
                        <div class="LoginInputs">

                            <form method="POST" action="<?= model_url ?>user_login">
                                <div class="form-group">
                                    <input type="email" placeholder="Email" name="user_email" class="LoginInput" />
                                </div>
                                <div class="form-group">
                                    <input type="password" placeholder="Password" name="user_password" class="LoginInput" />
                                </div>
                                <div class="JusAround">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me?</label>
                                    </div>
                                    <div>
                                        <p class="Forgot">
                                            Forgot Password
                                        </p>
                                    </div>
                                </div>

                                <div class="MarginTop">
                                    <button type="submit" class="BlueBtn">
                                        Continue
                                    </button>
                                </div>
                            </form>

                            <div class="DeeFlex MarginTop">

                                <a href="register.php" style="text-align: center;">
                                    Don't have an account?
                                    <span style="color:<?= $maincolor ?>;">
                                        Create An Account
                                    </span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of About section
	============================================= -->



<?php include_once 'footer.php'; ?>