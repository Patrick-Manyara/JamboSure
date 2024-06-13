<?php
$page = 'create account';
include_once 'header.php';

$sql = "SELECT * FROM policy WHERE device_id = '$_COOKIE[device]' ORDER BY policy_date_created DESC ";
$policy = select_rows($sql)[0];

if ($policy['prod_category'] == 'third_party') {
    $valval = 'Third Party';
    if ($policy['cover_duration'] == '12') {
        $newPrice = get_by_id('prod', $policy['product_id'])['prod_twelve_fee'];
    } else {
        $newPrice = get_by_id('prod', $policy['product_id'])['prod_one_fee'];
    }
} else {
    $valval = $policy['policy_value'];
    $totalBenefit = 0;

    $benefits = explode(",", $policy['policy_benefits']);

    foreach ($benefits as $ben) {
        $sql = "SELECT * FROM benefit WHERE benefit_id = '$ben' ";
        $benefit = select_rows($sql)[0];

        if ($benefit['benefit_mode'] == 'rate') {
            // If it's a rate, multiply the percentage to the post price
            $totalBenefit += $benefit['benefit_rate'] / 100 * $policy['first_price'];
        } elseif ($benefit['benefit_mode'] == 'price') {
            // If it's a price, add the block figure to the total benefit
            $totalBenefit += $benefit['benefit_price'];
        }
    }

    $MATH = (6 / 100 * $policy['policy_value']);
    $newPr = (0.75 / 100 * $policy['policy_value']) + $MATH;
    $lev = (0.45 / 100 * $newPr) + 40 + +$newPr;


    // Add the total benefit to the original price
    $newPrice2 = $totalBenefit + $policy['first_price'];

    $levies = get_by_column('levy', 'product_id', security('product_id'), 'yes');

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

    $newPrice = $totalBenefit2 + $totalBenefit + $policy['first_price'];

    $levyTotal = 0;


    $levyTotal = 0.45 / 100 * $newPrice;


    $officialPrice = $levyTotal + $newPrice;

    if (isset($_POST['benefits']) && is_array($_POST['benefits'])) {
        $benefitsString = implode(',', $_POST['benefits']);
    }
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

                        <form id="MyForm">


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
                                            <input type="text" required placeholder="Full Name*" id="Name" required name="full_name" value="Patrick" class="LoginInput" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="email" required placeholder="Email Address*" id="Email" required name="email" value="pmanyara97@gmail.com" class="LoginInput" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" required placeholder="Phone Number*" id="Phone" required name="phone" value="0745858891" class="LoginInput" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <select name="user_gender" class="form-select form-control LoginInput" required aria-label="Default select example">
                                            <option selected>Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>




                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="user_kra" required value="1234" placeholder="KRA PIN*" class="LoginInput" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
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
                                            <input required value="KAA1982A" type="text" name="vehicle_reg" placeholder="Registration Number*" class="LoginInput" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="email" name="vehicle_make" value="<?= $policy['policy_make'] ?>" placeholder="Make" class="LoginInput" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="vehicle_model" value="<?= $policy['policy_model'] ?>" placeholder="Model" class="LoginInput" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="vehicle_year" value="<?= $policy['policy_year'] ?>" placeholder="Year of manufacture" class="LoginInput" />
                                        </div>
                                    </div>



                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <input required type="text" placeholder="Chasis Number*" name="vehicle_chasis" value="1234" class="LoginInput" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
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
                        <button id="progress-prev" class="btn InputBtnClear2">Prev</button>
                        <button id="progress-next" class="btn InputBtn">Proceed</button>
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
                                    <p class="RightSideText"><?= $policy['first_price'] ?></p>
                                </div>
                            </div>

                            <?php
                            foreach ($benefits as $ben) {
                                $sql = "SELECT * FROM benefit WHERE benefit_id = '$ben' ";
                                $benefit = select_rows($sql)[0];

                                if ($benefit['benefit_free'] == 'yes') {
                                    $price = 'Free Benefit';
                                } else {
                                    if ($benefit['benefit_mode'] == 'rate') {
                                        $price = $benefit['benefit_rate'] .  "% of Premium";
                                    } else {
                                        $price = 'Ksh. ' . $benefit['benefit_price'];
                                    }
                                }

                            ?>

                                <div class="row">
                                    <div class="col-6">
                                        <p class="LeftSideText"><?= $benefit['benefit_name'] ?></p>
                                    </div>
                                    <div class="col-6">
                                        <p class="RightSideText"><?= $price ?></p>
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
                                <p class="RightSideText"><?= "Ksh. " . number_format($newPrice) ?></p>
                            </div>
                        </div>


                        <div class="DivBottom">
                            <input type="button" id="BtnBook" class="InputBtn nir-btn mt-1" value="Pay" />
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
                $('#personal_form').css('display', 'none');
                $('#vehicle_form').css('display', 'flex');
            }
            if (active == 1) {
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
            fD.append('newPrice', '<?= $newPrice ?>');


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
                            var amount = data.amount;
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
                                        amount: 1,
                                        orderId: rand,
                                        callBackUrl: 'https://jambosure.com/model/update/callback.php',
                                        accountTo: "1106459",
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
    #vehicle_form {
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