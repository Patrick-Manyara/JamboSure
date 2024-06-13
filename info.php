<?php
$page = 'create account';
include_once 'header.php';

$sql = "SELECT * FROM policy WHERE device_id = '$_COOKIE[device]' ORDER BY policy_date_created DESC ";
$policy = select_rows($sql)[0];



if ($policy['prod_category'] == 'third_party') {
    $valval = 'Third Party';
    if ($policy['cover_duration'] == '12') {
        $officialPrice = get_by_id('prod', $policy['product_id'])['prod_twelve_fee'];
    } else {
        $officialPrice = get_by_id('prod', $policy['product_id'])['prod_one_fee'];
    }
} else {
    $valval = $policy['policy_value'];
    // cout($valval);
    $totalBenefit = 0;
    $cost = 0;
    $benefits = explode(",", $policy['policy_benefits']);

    foreach ($benefits as $ben) {
        $sql = "SELECT * FROM benefit WHERE benefit_id = '$ben' ";
        $benefit = select_rows($sql)[0];

        if ($benefit['benefit_free'] == 'yes') {
            $cost = 0;
            $totalBenefit += $cost;
        } else {
            if ($benefit['benefit_mode' == 'price'] && $benefit['benefit_free'] == 'no') {
                $cost = $benefit['benefit_price'];
            } else {
                $cost = $policy['policy_value'] * $benefit['benefit_rate'] / 100;

                if ($cost < $benefit['benefit_price']) {
                    $cost = $benefit['benefit_price'];
                }
            }

            $totalBenefit += $cost;
            // cout($cost);
        }
    }


    // cout($totalBenefit);

    $levyTotal = 0.45 / 100 * ($totalBenefit + $policy['first_price']);
    // LEVIES + BASIC + BENEFITS

    $officialPrice = $levyTotal + $totalBenefit + $policy['first_price'] + 40;
}
?>

<head>
    <script type="text/javascript" defer src="https://checkoutjpv2.jambopay.com/sdk"></script>
    <link rel="stylesheet" href="https://checkout.jambopay.com/jambopay-styles-checkout.min.css" />
</head>


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
        <div class="row">

            <div class="col-lg-8">

                <div class="RegisterCard">
                    <div id="progress">
                        <div id="progress-bar"></div>
                        <ul id="progress-num">
                            <li class="step active">1</li>
                            <li class="step">2</li>
                        </ul>
                    </div>
                    <div class="PersonalDetails">

                        <form id="MyForm" enctype="multipart/form-data">


                            <div class="PersonalForm">

                                <div class="row PersVeh" id="personal_form">
                                    <h2 style="font-size: 32px;font-style: normal;font-weight: 700;">
                                        Personal Details
                                    </h2>
                                    <p>
                                        <b>
                                            Personal information
                                        </b>
                                    </p>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Enter Your Full Name</label>
                                            <input type="text" required placeholder="Full Name*" id="Name" value="<?= $logged ? $user['user_name'] : ''  ?>" required name="full_name" class="LoginInput" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Enter Your Email Address</label>
                                            <input type="email" required placeholder="Email Address*" value="<?= $logged ? $user['user_email'] : ''  ?>" id="Email" required name="email" class="LoginInput" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Enter Your Phone Number</label>
                                            <input type="text" required placeholder="Phone Number*" value="<?= $logged ? $user['user_phone'] : ''  ?>" id="Phone" required name="phone" class="LoginInput" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Select Your Gender</label>
                                        <select name="user_gender" class="form-select form-control LoginInput" required aria-label="Default select example">
                                            <?php
                                            if ($logged) { ?>
                                                <option value="<?= $user['user_gender'] ?>" selected><?= $user['user_gender'] ?></option>
                                            <?php
                                            } else { ?>
                                                <option selected>Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>




                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Enter Your KRA PIN</label>
                                            <input type="text" name="user_kra" value="<?= $logged ? $user['user_kra'] : ''  ?>" required placeholder="KRA PIN*" class="LoginInput" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Enter Your Date of Birth</label>
                                            <input required type="date" value="<?= $logged ? $user['user_dob'] : ''  ?>" placeholder="Date of Birth*" name="user_dob" class="LoginInput" />
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



                                </div>

                                <div class="row PersVeh" id="vehicle_form">
                                    <h2 style="font-size: 32px;font-style: normal;font-weight: 700;">
                                        Vehicle Details
                                    </h2>
                                    <p>
                                        <b>
                                            Vehicle information
                                        </b>
                                    </p>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Enter Your Vehicle's Registration Number</label>
                                            <input required type="text" name="vehicle_reg" placeholder="Registration Number*" class="LoginInput" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Enter Your Vehicle's Make</label>
                                            <input type="email" name="vehicle_make" value="<?= $policy['policy_make'] ?>" placeholder="Make" class="LoginInput" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Enter Your Vehicle's Model</label>
                                            <input type="text" name="vehicle_model" value="<?= $policy['policy_model'] ?>" placeholder="Model" class="LoginInput" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Enter Your Vehicle's Year of manufacture</label>
                                            <input type="text" name="vehicle_year" value="<?= $policy['policy_year'] ?>" placeholder="Year of manufacture" class="LoginInput" />
                                        </div>
                                    </div>



                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Enter Your Vehicle's Chasis Number</label>
                                            <input required type="text" placeholder="Chasis Number*" name="vehicle_chasis" class="LoginInput" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Select Your Vehicle's Use</label>
                                        <select class="form-select form-control LoginInput" aria-label="Default select example">
                                            <option selected>Vehicle Usage:</option>
                                            <option value="Personal">Personal</option>
                                            <option value="Commercial">Commercial</option>
                                        </select>
                                    </div>


                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="custom-file-upload">
                                                <input required type="file" name="logbook" />
                                                <i class="far fa-cloud-upload" style="color:<?= $secondarycolor ?>"></i> Upload vehicle Log book
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="DeeEnd">
                        <button id="progress-prev" style="height: 2.8em;margin-right: 10px;" class="btn InputBtnClear2">Edit Personal Details</button>
                        <button id="progress-next" class="btn InputBtn">Proceed To Vehicle Details</button>
                        <input type="button" id="BtnBook" style="background-color: #269491;" class="InputBtn nir-btn mt-1" value="Make Payment" />
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="SummaryBox">
                    <div class="DeeFlex">
                        <h3 style="color: <?= $secondarycolor ?>;">
                            Quote Summary
                        </h3>
                    </div>
                    <div style="height: 100%;">
                        <?php
                        if ($policy['prod_category'] != 'third_party') { ?>


                            <div class="row">
                                <div class="col-6">
                                    <p class="LeftSideText">Value</p>
                                </div>
                                <div class="col-6">
                                    <p class="RightSideText"><?= $policy['policy_value'] ?></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <p class="LeftSideText">Basic Premium</p>
                                </div>
                                <div class="col-6">
                                    <p class="RightSideText"><?= 'Ksh. ' .  number_format($policy['first_price']) ?></p>
                                </div>
                            </div>

                            <?php
                            foreach ($benefits as $ben) {
                                $sql = "SELECT * FROM benefit WHERE benefit_id = '$ben'    ";
                                $benefit = select_rows($sql)[0];

                                if ($policy['prod_category'] != 'third_party') {

                                    if ($benefit['benefit_free'] == 'yes') {
                                        $price = 'Free Benefit';
                                    } else {
                                        $price = $policy['policy_value'] * $benefit['benefit_rate'] / 100;
                                        if ($price < $benefit['benefit_price']) {
                                            $price = $benefit['benefit_price'];
                                        }
                                    }
                                }


                            ?>

                                <div class="row">
                                    <div class="col-6">
                                        <p class="LeftSideText"><?= $benefit['benefit_name'] ?></p>
                                    </div>
                                    <div class="col-6">
                                        <p class="RightSideText"><?= 'Ksh.' . number_format($price) ?></p>
                                    </div>

                                </div>

                            <?php
                            }
                        } else { ?>
                            <div class="row">
                                <div class="col-6">
                                    <p class="LeftSideText">Cover Duration</p>
                                </div>
                                <div class="col-6">
                                    <p class="RightSideText"><?= $policy['cover_duration'] . " Month" . ($policy['cover_duration'] == '1' ? '' : 's')   ?> </p>
                                </div>
                            </div>
                        <?php

                        }

                        ?>


                        <hr class="rounded">


                        <div class="row">
                            <div class="col-6">
                                <p class="LeftSideText">TOTAL</p>
                            </div>
                            <div class="col-6">
                                <p class="RightSideText"><?= "Ksh. " . number_format($officialPrice) ?></p>
                            </div>
                        </div>


                        <div class="DivBottom">

                            <div class="spin" style="display:none" id="spin"></div>
                        </div>

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
        const progressBar = document.getElementById("progress-bar");
        const progressNext = document.getElementById("progress-next");
        const progressPrev = document.getElementById("progress-prev");
        const steps = document.querySelectorAll(".step");
        let active = 1;



        progressNext.addEventListener("click", () => {
            active++;
            if (active > steps.length) {
                active = steps.length;
            }
            updateProgress();
        });

        progressPrev.addEventListener("click", () => {
            active--;
            if (active < 1) {
                active = 1;
            }
            updateProgress();
        });

        const updateProgress = () => {
            steps.forEach((step, i) => {
                if (i < active) {
                    step.classList.add("active");
                } else {
                    step.classList.remove("active");
                }
            });
            progressBar.style.width = ((active - 1) / (steps.length - 1)) * 100 + "%";
            if (active === 1) {
                progressPrev.disabled = true;
                progressNext.disabled = false;
            } else {
                progressPrev.disabled = false;
                progressNext.disabled = true;
            }
            console.log(active);

            if (active == 2) {
                $('#BtnBook').css('display', 'block');
                $('#progress-prev').css('display', 'block');
                $('#progress-next').css('display', 'none');
                $('#personal_form').css('display', 'none');
                $('#vehicle_form').css('display', 'flex');
            }
            if (active == 1) {
                $('#progress-prev').css('display', 'none');
                $('#progress-next').css('display', 'block');
                $('#BtnBook').css('display', 'none');
                $('#personal_form').css('display', 'flex');
                $('#vehicle_form').css('display', 'none');
            }
        };


        $('#BtnBook').click(function() {
            $('#BtnBook').hide();
            $('#spin').show();
            var fD = new FormData();

            $('.PersVeh input, .PersVeh select').each(function() {
                var inputName = $(this).attr('name');
                var inputValue = $(this).val();

                // If it's a file input, handle it differently
                if ($(this).attr('type') === 'file') {
                    var fileInput = this.files[0]; // Get the file object directly from the DOM element
                    // Append the file to FormData
                    if (fileInput) {
                        fD.append(inputName, fileInput);
                    }
                } else {
                    // For other input types, add to FormData normally
                    if (inputName) {
                        fD.append(inputName, inputValue);
                    }
                }
            });

            // Append 'newPrice' outside the loop if it's meant to be a constant value
            fD.append('newPrice', '<?= $officialPrice ?>');


            if ($('#Name').val() != '') {
                $.ajax({
                    url: "model/update/send_to_db.php",
                    type: "POST",
                    data: fD,
                    processData: false, // Prevent jQuery from processing the data
                    contentType: false, // Prevent jQuery from setting contentType
                    success: function(resp, status) {
                        var data = JSON.parse(resp);
                        console.log(data)
                        if (data.data == 1) {

                            var checksum = data.checksum;
                            var amount = '<?= $officialPrice ?>';
                            var email = data.email;
                            var rand = data.rand;
                            var phone = data.phone;
                            var bid = data.bid;

                            $.ajax({
                                url: 'get_token.php',
                                type: 'POST',
                                data: {
                                    orderid: rand,
                                    amount: amount,
                                },
                                success: function(response) {
                                    console.log(response)
                                    var tokenData = JSON.parse(response);
                                    var _token = tokenData.access_token;
                                    console.log("Token generated: " + _token);

                                    const params = {
                                        amount: <?= $officialPrice ?>,
                                        orderId: rand,
                                        callBackUrl: 'https://jambosure.com/model/update/callback.php',
                                        accountTo: "1110278",
                                        token: _token,
                                        description: "JamboSure",
                                        walletEnabled: false,
                                        mobileEnabled: true,
                                        cardEnabled: true,
                                        serviceType: "MERCHANTPAYMENT", // MERCHANTPAYMENT OR TOPUP
                                        enableIframe: false,
                                    };

                                    const theme = {
                                        primary: "#000000",
                                        accent: "#333333"
                                    };

                                    function my_callback(data) {
                                        console.log(data);
                                        if (data.status === 'SUCCESS') {
                                            window.location.href = 'https://jambosure.com/success.php?bid=' + bid;

                                        } else {
                                            window.location.href = 'https://jambosure.com/cancel.php';
                                        }
                                    }

                                    jambopayCheckout(params, my_callback, theme);
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.error("Failed to generate token: " + errorThrown);
                                }
                            });
                        } else {
                            alert(data.data);
                            $('#btnShowNew').show();
                            $('#spin').hide();
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("Error:", errorThrown);
                    }
                });
            } else {
                alert('You need to fill all the fields');
                $('#btnShowNew').show();
                $('#spin').hide();
            }




        })

    });
</script>

<style>
    #vehicle_form, 
    #progress-prev,
    #BtnBook {
        display: none;
    }


    #progress {
        position: relative;
        margin-bottom: 30px;
    }

    #progress-bar {
        position: absolute;
        background: <?= $maincolor ?>;
        height: 5px;
        width: 0%;
        top: 50%;
        left: 0;
    }

    #progress-num {
        margin: 0;
        padding: 0;
        list-style: none;
        display: flex;
        justify-content: space-between;
    }

    #progress-num::before {
        content: "";
        background-color: lightgray;
        position: absolute;
        top: 50%;
        left: 0;
        height: 5px;
        width: 100%;
        z-index: 1;
    }

    #progress-num .step {
        border: 3px solid lightgray;
        border-radius: 100%;
        width: 4em;
        height: 4em;
        line-height: 25px;
        text-align: center;
        background-color: #fff;
        font-size: 14px;
        position: relative;
        z-index: 1;
    }

    #progress-num .step.active {
        border-color: <?= $maincolor ?>;
        background-color: <?= $maincolor ?>;
        color: #fff;
    }

    .btn {
        background: lightgray;
        border: none;
        border-radius: 3px;
        padding: 6px 12px;
    }

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

    .LeftSideText {
        font-weight: bold;
    }

    /* Rounded border */
    hr.rounded {
        border-top: 8px solid #bbb;
        border-radius: 5px;
    }
</style>


<?php include_once 'footer.php'; ?>