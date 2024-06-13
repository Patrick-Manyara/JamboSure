<?php
include_once 'path.php';
require_once MODEL_PATH . 'operations.php';

$maincolor = '#269491';
$secondarycolor = '#B1E552';

if (!empty($_SESSION['error'])) {
    foreach ($_SESSION['error'] as $err) {
        error_message(ERROR_DEFINITION[$err]) . PHP_EOL;
    }
}

if (!empty($_SESSION['success'])) {
    foreach ($_SESSION['success'] as $success) {
        success_message(SUCCESS_DEFINITION[$success]) . PHP_EOL;
    }
}

if (!empty($_SESSION['warning'])) {
    foreach ($_SESSION['warning'] as $warning) {
        warning_message(WARNING_DEFINITION[$warning]) . PHP_EOL;
    }
}

unset_session_error();
unset_session_success();
unset_session_warning();

// cout($_SESSION)
if (isset($_SESSION['user_login'])) {
    $user = get_by_id('user', $_SESSION['user_id']);
    $logged = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>JamboSure </title>
    <meta name="description" content="JamboSure">
    <meta name="keywords" content="	insurance, jambopay, JamboSure, business, company, consulting, corporate, finance, financial, investments, law, multi-purpose, services, tax help, visual composer">
    <meta name="author" content="Vesen Computing">
    <link rel="shortcut icon" href="assets/img/new/circle.png" type="image/x-icon">
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/video.min.css">
    <link rel="stylesheet" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/rs6.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript">
        function getCookie(name) {
            var cookieValue = null;
            if (document.cookie && document.cookie !== '') {
                var cookies = document.cookie.split(';');
                for (var i = 0; i < cookies.length; i++) {
                    var cookie = cookies[i].trim();
                    // Does this cookie string begin with the name we want?
                    if (cookie.substring(0, name.length + 1) === (name + '=')) {
                        cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                        break;
                    }
                }
            }
            return cookieValue;
        }

        function uuidv4() { //universally unique identifier version 4
            return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                var r = Math.random() * 16 | 0,
                    v = c == 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
        }

        let device = getCookie('device')

        if (device == null || device == undefined) {
            device = uuidv4()
        }

        document.cookie = 'device=' + device + ";domain=;path=/"
    </script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/5addac0f227d3d7edc24a667/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</head>

<body>
    <style>
        .alert {
            z-index: 99999 !important;
            position: absolute !important;
            width: 100% !important;
        }
    </style>
    <div id="preloader"></div>
    <div class="up">
        <a href="#" class="scrollup text-center"><i class="fas fa-chevron-up"></i></a>
    </div>

    <!-- Start of header section
	============================================= -->
    <header id="in-header" class="in-header-section header-style-one">
        <div class="in-header-top-content-area">
            <div class="container">
                <div class="header-top-content d-flex justify-content-between align-items-center">
                    <div class="brand-logo">
                        <a href="#"><img src="assets/img/new/logo.png" class="MyLogo" alt=""></a>
                    </div>
                    <div class="header-top-cta d-flex align-items-center">
                        <div class="cta-info-item position-relative d-flex align-items-center">
                            <div class="inner-icon">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="inner-text headline">
                                <h4>Contact us</h4>
                                <span>Westlands Office Park, Cassia 1st Floor.</span>
                            </div>
                        </div>
                        <div class="cta-info-item position-relative d-flex align-items-center">
                            <div class="inner-icon">
                                <i class="fal fa-envelope-open-text"></i>
                            </div>
                            <div class="inner-text headline">
                                <h4>Email us</h4>
                                <span>info@jambosure.com</span>
                            </div>
                        </div>
                        <div class="cta-info-item position-relative d-flex align-items-center">
                            <div class="inner-icon">
                                <i class="fal fa-phone-plus"></i>
                            </div>
                            <div class="inner-text headline">
                                <h4>Free Call</h4>
                                <span>+254-709-920-200</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="in-header-main-menu-wrapper">
            <div class="container">
                <div class="in-header-main-menu-content d-flex align-items-center justify-content-between">
                    <div class="sticky-logo">
                        <a href="#"><img src="assets/img/new/black_logo.png" class="MyLogo" alt=""></a>
                    </div>
                    <nav class="in-main-navigation-area clearfix ul-li">
                        <ul id="main-nav" class="nav navbar-nav clearfix">
                            <li><a  href="index">Home</a></li>
                            <li><a  href="about">About Us</a></li>
                            <li class="dropdown">
                                <a href="!#">Products</a>
                                <ul class="dropdown-menu clearfix">
                                    <li><a  href="private">Motor Private</a></li>
                                    <li><a  href="commercial">Motor Commercial</a></li>
                                    <li><a  href="motorbike">Motorbike</a></li>
                                    <li><a  href="tuktuk">Three Wheelers</a></li>
                                    <li><a  href="movers">Prime Movers</a></li>
                                </ul>
                            </li>
                            <li><a  href="contact">Contact</a></li>
                        </ul>
                    </nav>
                    <div class="in-header-search-cta-btn d-flex align-items-center">

                        <div class="in-header-cta-btn">
                            <a href="<?= isset($_SESSION['user_login']) ? 'contact' : 'login' ?>"> <i class="far fa-user"></i> <?= isset($_SESSION['user_login']) ? 'Account' : 'Login' ?></a>
                        </div>
                    </div>
                </div>
                <div class="mobile_menu position-relative">
                    <div class="mobile_menu_button open_mobile_menu">
                        <i class="fal fa-bars"></i>
                    </div>
                    <div class="mobile_menu_wrap">
                        <div class="mobile_menu_overlay open_mobile_menu"></div>
                        <div class="mobile_menu_content">
                            <div class="mobile_menu_close open_mobile_menu">
                                <i class="fal fa-times"></i>
                            </div>
                            <div class="m-brand-logo">
                                <a href="!#"><img src="assets/img/new/logo.png" class="MyLogo" alt=""></a>
                            </div>
                            <div class="in-m-search">
                                <form action="#">
                                    <input type="text" name="search" placeholder="Search..">
                                    <button type="submit"><i class="far fa-search"></i></button>
                                </form>
                            </div>
                            <nav class="mobile-main-navigation  clearfix ul-li">
                                <ul id="m-main-nav" class="nav navbar-nav clearfix">
                                    <li><a  href="index">Home</a></li>
                                    <li><a  href="about">About Us</a></li>
                                    <li class="dropdown">
                                        <a href="!#">Products</a>
                                        <ul class="dropdown-menu clearfix">
                                            <li><a  href="private">Private</a></li>
                                            <li><a  href="commercial">Commercial</a></li>
                                            <li><a  href="motorbike">Motorbike</a></li>
                                            <li><a  href="tuktuk">Three Wheelers</a></li>
                                            <li><a  href="movers">Prime Movers</a></li>
                                        </ul>
                                    </li>
                                    <li><a  href="contact">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- /Mobile-Menu -->
                </div>
            </div>
        </div>
    </header>
    <!-- search filed -->
    <div class="search-body">
        <div class="search-form">
            <form action="#" class="search-form-area">
                <input class="search-input" type="search" placeholder="Search Here">
                <button type="submit" class="search-btn1">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <div class="outer-close text-center search-btn">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div>
    <!-- End of header section
	============================================= -->