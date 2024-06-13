<?php
$page        = 'dashboard';
$header_name = 'Home';

require_once 'header.php';

// $past_sessions  = get_past_sessions();
// $next_sessions  = get_upcoming_sessions();

$connection = connect();


// Get the current month (numerical value, 1 for January, 2 for February, etc.)
$currentMonth = date('n');
$currentYear = date('Y');

// Array to store session counts per month
$sessionCounts = [];

// Array of month names
$monthNames = [
    1 => 'January',
    2 => 'February',
    3 => 'March',
    4 => 'April',
    5 => 'May',
    6 => 'June',
    7 => 'July',
    8 => 'August',
    9 => 'September',
    10 => 'October',
    11 => 'November',
    12 => 'December',
];

// Array to store the last 12 months in full names
$last12Months = [];

// Loop through the last 12 months, starting from the current month
for ($i = 0; $i < 12; $i++) {
    // Calculate the month index, considering the year boundaries
    $monthIndex = ($currentMonth - $i) <= 0 ? ($currentMonth - $i + 12) : ($currentMonth - $i);
    // Get the month name
    $monthName = $monthNames[$monthIndex];
    // Add the month name to the array
    $last12Months[] = $monthName;
}

for ($i = 0; $i < 12; $i++) {
    // Calculate the month and year for the current iteration
    $month = $currentMonth - $i;
    $year = $currentYear;

    // Adjust the month and year if necessary to handle year boundaries
    if ($month <= 0) {
        $month += 12;
        $year--;
    }

    // Convert the month to a two-digit format (e.g., 02 for February)
    $month = sprintf('%02d', $month);

    // Get the number of days in the month
    $numDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

    // Create the start and end dates for the current month
    $startDate = $year . '-' . $month . '-01';
    $endDate = $year . '-' . $month . '-' . $numDays;

    // SQL query to count sessions for the current month
    $sqlQuery = "SELECT COUNT(*) AS claim_count FROM claim 
                 WHERE claim_date_created >= '$startDate' AND claim_date_created <= '$endDate'";

    // Execute the query and fetch the result
    $result = $connection->query($sqlQuery);
    $row = $result->fetch_assoc();

    // Store the session count in the array with the month name as the key
    $sessionCounts[] = (int)$row['claim_count'];
}


// Reverse the array to get the months in the correct order (from current to past)
$last12Months = array_reverse($last12Months);
$last12Months = json_encode($last12Months);

$sessionCounts = array_reverse($sessionCounts);
$sessionCounts = json_encode($sessionCounts);

// cout($sessionCounts);

?>

<head>
    <script src="assets/js/charts-apex.js"></script>
</head>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-3 mb-4 ml-2 mr-2">
            <div class="card">
                <div class="card-body">
                    <a href="view_products">
                        <div class="d-flex" style="align-items: center; justify-content:center;">
                        <div style="background-color: #EFF4FF;" class="OverviewCircle">
                            <img src="assets/img/icons/card.png" class="OverviewIcon" />
                        </div>
                        <div style="width: auto; margin-left:5px;">
                            <h5 class="text-nowrap mb-2">Products</h5>
                            <small class="text-success text-nowrap fw-semibold"><?= sizeof(get_all('product')) ?></small>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 mb-4 ml-2 mr-2">
            <div class="card">
                <div class="card-body">
                    <a href="view_claims">
                    <div class="d-flex" style="align-items: center; justify-content:center;">
                        <div style="background-color: #FFF7E1;" class="OverviewCircle">
                            <img src="assets/img/icons/card.png" class="OverviewIcon" />
                        </div>
                        <div style="width: auto; margin-left:5px;">
                            <h5 class="text-nowrap mb-2">Claims</h5>
                            <small class="text-success text-nowrap fw-semibold"><?= sizeof(get_all('claim')) ?></small>
                        </div>
                    </div>
                   </a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 mb-4 ml-2 mr-2">
            <div class="card">
                <div class="card-body">
                     <a href="view_users">
                    <div class="d-flex" style="align-items: center; justify-content:center;">
                        <div style="background-color: #EFF4FF;" class="OverviewCircle">
                            <img src="assets/img/icons/card.png" class="OverviewIcon" />
                        </div>
                        <div style="width: auto; margin-left:5px;">
                            <h5 class="text-nowrap mb-2">Users</h5>
                            <small class="text-success text-nowrap fw-semibold"><?= sizeof(get_all('user')) ?></small>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 mb-4 ml-2 mr-2">
            <div class="card">
                <div class="card-body">
                     <a href="view_writers">
                    <div class="d-flex" style="align-items: center; justify-content:center;">
                        <div style="background-color: #EFF4FF;" class="OverviewCircle">
                            <img src="assets/img/icons/card.png" class="OverviewIcon" />
                        </div>
                        <div style="width: auto; margin-left:5px;">
                            <h5 class="text-nowrap mb-2">Underwriters</h5>
                            <small class="text-success text-nowrap fw-semibold"><?= sizeof(get_all('writer')) ?></small>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>






    </div>

    <div class="row">
        <!-- Line Chart -->
        <div class="col-md-8 col-lg-8 col-sm-12 col-12  mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h5 class="card-title mb-0">Claims</h5>
                        <small class="text-muted">Number of customers signed up</small>
                    </div>
                    <div class="d-sm-flex d-none align-items-center">
                        <h5 class="fw-bold mb-0 me-3"><?= sizeof(get_all('claim')) ?> Claims</h5>
                        
                    </div>
                </div>
                <div class="card-body MyChartBox">
                    <div id="customerRatingsChart" class="MyChart"></div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-4 col-sm-12 col-12  mb-4">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">Statistics</h5>
                    
                </div>
                <div class="card-body">
                    <div id="radialBarChart"></div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-lg-8 col-sm-12 col-12  mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <small class="text-muted">Vendors Activity</small>
                    </div>

                </div>
                <div class="card-body MyBarChart MyChartBox">
                    <canvas id="barChart" class="chartjs MyChart" data-height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12 col-12  mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between mb-30">
                    <h5 class="card-title m-0 me-2">Onboarding</h5>
                   
                </div>
                <div id="salesStats"></div>
                <div class="card-body">
                    <div class="d-flex justify-content-around">
                        <div class="d-flex align-items-center lh-1 mb-3 mb-sm-0">
                            <span class="badge badge-dot bg-success me-2"></span> Successful
                        </div>
                        <div class="d-flex align-items-center lh-1 mb-3 mb-sm-0">
                            <span class="badge badge-dot bg-label-secondary me-2"></span> Unsuccessful
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
<!-- / Content -->

<!-- Page JS -->

<style>
    .MyChartBox {
        /* height: 200px !important; */
    }

    .MyBarChart .MyChart {
        height: 300px !important;
    }

    .OverviewCircle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        padding: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .OverviewIcon {
        width: 30px;
        height: 30px;
    }
</style>

<script>
    $(document).ready(function() {

        // Color constant
        const chartColors = {
            column: {
                series1: '#826af9',
                series2: '#d2b0ff',
                bg: '#f8d3ff'
            },
            donut: {
                series1: '#fee802',
                series2: '#3fd0bd',
                series3: '#826bf8',
                series4: '#2b9bf4'
            },
            area: {
                series1: '#29dac7',
                series2: '#60f2ca',
                series3: '#a5f8cd'
            }
        };

        let cardColor, headingColor, labelColor, borderColor, legendColor;


        cardColor = "#fff";
        headingColor = '#566a7f';
        labelColor = config.colors.textMuted;
        legendColor = config.colors.bodyColor;
        borderColor = '#eceef1';







        const purpleColor = '#836AF9',
            yellowColor = '#ffe800',
            cyanColor = '#28dac6',
            orangeColor = '#FF8132',
            orangeLightColor = '#FDAC34',
            oceanBlueColor = '#299AFF',
            greyColor = '#4F5D70',
            greyLightColor = '#EDF1F4',
            blueColor = '#2B9AFF',
            blueLightColor = '#84D0FF';


        // Bar Chart
        // --------------------------------------------------------------------
        const barChart = document.getElementById('barChart');
        if (barChart) {
            const barChartVar = new Chart(barChart, {
                type: 'bar',
                data: {
                    labels: [
                        '7/12',
                        '8/12',
                        '9/12',
                        '10/12',
                        '11/12',
                        '12/12',
                    ],
                    datasets: [{
                        data: [275, 90, 190, 250, 125, 95],
                        backgroundColor: cyanColor,
                        borderColor: 'transparent',
                        maxBarThickness: 12,
                        borderRadius: {
                            topRight: 15,
                            topLeft: 15
                        }
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    animation: {
                        duration: 500
                    },
                    plugins: {
                        tooltip: {
                            rtl: true,
                            backgroundColor: "#fff",
                            titleColor: '#566a7f',
                            bodyColor: '#697a8d',
                            borderWidth: 1,
                            borderColor: '#eceef1'
                        },
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                color: '#eceef1',
                                drawBorder: false,
                                borderColor: '#eceef1'
                            },
                            ticks: {
                                color: '#a1acb8'
                            }
                        },
                        y: {
                            min: 0,
                            max: 400,
                            grid: {
                                color: '#eceef1',
                                drawBorder: false,
                                borderColor: '#eceef1'
                            },
                            ticks: {
                                stepSize: 100,
                                color: '#a1acb8'
                            }
                        }
                    }
                }
            });
        }


        // Customer Ratings - Line Charts
        // --------------------------------------------------------------------
        const customerRatingsChartEl = document.querySelector('#customerRatingsChart'),
            customerRatingsChartOptions = {
                chart: {
                    height: 200,
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    },
                    type: 'line',
                    dropShadow: {
                        enabled: true,
                        enabledOnSeries: [1],
                        top: 13,
                        left: 4,
                        blur: 3,
                        color: '#696cff',
                        opacity: 0.09
                    }
                },
                series: [{
                        name: 'Last Month',
                        data: <?= $sessionCounts ?>
                    },
                    {
                        name: 'This Month',
                        data: <?= $sessionCounts ?>
                    }
                ],
                stroke: {
                    curve: 'smooth',
                    dashArray: [8, 0],
                    width: [3, 4]
                },
                legend: {
                    show: false
                },
                colors: ['#eceef1', '#696cff'],
                grid: {
                    show: false,
                    borderColor: '#eceef1',
                    padding: {
                        top: -20,
                        bottom: -10,
                        left: 0
                    }
                },
                markers: {
                    size: 6,
                    colors: 'transparent',
                    strokeColors: 'transparent',
                    strokeWidth: 5,
                    hover: {
                        size: 6
                    },
                    discrete: [{
                            fillColor: "#FFF",
                            seriesIndex: 1,
                            dataPointIndex: 7,
                            strokeColor: '#696cff',
                            size: 6
                        },
                        {
                            fillColor: "#FFF",
                            seriesIndex: 1,
                            dataPointIndex: 3,
                            strokeColor: "#000",
                            size: 6
                        }
                    ]
                },
                xaxis: {
                    labels: {
                        style: {
                            colors: '#a1acb8',
                            fontSize: '13px'
                        }
                    },
                    axisTicks: {
                        show: false
                    },
                    categories: <?= $last12Months ?>,
                    axisBorder: {
                        show: false
                    }
                },
                yaxis: {
                    show: false
                }
            };
        if (typeof customerRatingsChartEl !== undefined && customerRatingsChartEl !== null) {
            const customerRatingsChart = new ApexCharts(customerRatingsChartEl, customerRatingsChartOptions);
            customerRatingsChart.render();
        }


        // Radial Bar Chart
        // --------------------------------------------------------------------
        const radialBarChartEl = document.querySelector('#radialBarChart'),
            radialBarChartConfig = {
                chart: {
                    height: 380,
                    type: 'radialBar'
                },
                colors: ['#fee802', '#3fd0bd', '#2b9bf4'],
                plotOptions: {
                    radialBar: {
                        size: 185,
                        hollow: {
                            size: '40%'
                        },
                        track: {
                            margin: 10,
                            background: '#8897aa1a'
                        },
                        dataLabels: {
                            name: {
                                fontSize: '2rem',
                                fontFamily: 'Public Sans'
                            },
                            value: {
                                fontSize: '1.2rem',
                                color: '#697a8d',
                                fontFamily: 'Public Sans'
                            },
                            total: {
                                show: true,
                                fontWeight: 400,
                                fontSize: '1.3rem',
                                color: '#566a7f',
                                label: 'Invoices',
                                formatter: function(w) {
                                    return '80%';
                                }
                            }
                        }
                    }
                },
                grid: {
                    borderColor: '#eceef1',
                    padding: {
                        top: -25,
                        bottom: -20
                    }
                },
                legend: {
                    show: true,
                    position: 'bottom',
                    labels: {
                        colors: '#697a8d',
                        useSeriesColors: false
                    }
                },
                stroke: {
                    lineCap: 'round'
                },
                series: [80, 50, 35],
                labels: ['Paid Invoices', 'Processing', 'Pending']
            };
        if (typeof radialBarChartEl !== undefined && radialBarChartEl !== null) {
            const radialChart = new ApexCharts(radialBarChartEl, radialBarChartConfig);
            radialChart.render();
        }




        // Sale Stats - Radial Bar Chart
        // --------------------------------------------------------------------
        const salesStatsEl = document.querySelector('#salesStats'),
            salesStatsOptions = {
                chart: {
                    height: 300,
                    type: 'radialBar'
                },
                series: [75],
                labels: ['Conversion'],
                plotOptions: {
                    radialBar: {
                        startAngle: 0,
                        endAngle: 360,
                        strokeWidth: '70',
                        hollow: {
                            margin: 50,
                            size: '75%',
                            image: assetsPath + 'img/icons/misc/arrow-star.png',
                            imageWidth: 65,
                            imageHeight: 55,
                            imageOffsetY: -35,
                            imageClipped: false
                        },
                        track: {
                            strokeWidth: '50%',
                            background: '#269491'
                        },
                        dataLabels: {
                            show: true,
                            name: {
                                offsetY: 60,
                                show: true,
                                color: '#269491',
                                fontSize: '15px'
                            },
                            value: {
                                formatter: function(val) {
                                    return parseInt(val) + '%';
                                },
                                offsetY: 20,
                                color: '#269491',
                                fontSize: '32px',
                                show: true
                            }
                        }
                    }
                },
                fill: {
                    type: 'solid',
                    colors: '#71dd37'
                },
                stroke: {
                    lineCap: 'round'
                },
                states: {
                    hover: {
                        filter: {
                            type: 'none'
                        }
                    },
                    active: {
                        filter: {
                            type: 'none'
                        }
                    }
                }
            };
        if (typeof salesStatsEl !== undefined && salesStatsEl !== null) {
            const salesStats = new ApexCharts(salesStatsEl, salesStatsOptions);
            salesStats.render();
        }

    })
</script>

<!-- <script src="<?= admin_url ?>assets/vendor/libs/chartjs/chartjs.js"></script> -->

<?php include_once 'footer.php'; ?>