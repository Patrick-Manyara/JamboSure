<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
            © <?= APP_NAME ?>
            <script>
                document.write(new Date().getFullYear());
            </script>
            , made with ❤️ by
            <a href="https://vesencomuting.com" target="_blank" class="footer-link fw-bolder">Vesen Computing</a>
        </div>

    </div>
</footer>
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>

<!-- Drag Target Area To SlideIn Menu On Small Screens -->
<div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->

<script src="<?= admin_url ?>assets/js/extended-ui-sweetalert2.js"></script>
<!-- Core JS -->
<!-- build:js <?= admin_url ?>assets/vendor/js/core.js -->
<script src="<?= admin_url ?>assets/vendor/libs/popper/popper.js"></script>
<script src="<?= admin_url ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?= admin_url ?>assets/vendor/libs/i18n/i18n.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="<?= admin_url ?>assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script>
    function image_preview(my_img, img_loader) {
        $(function() {
            $(my_img).change(function(event) {
                let img = URL.createObjectURL(event.target.files[0]);
                $(img_loader).attr("src", img);
                console.log(event);
            });
        });
    }

    image_preview("#my_img", "#img_loader");
    image_preview("#my_image", "#image_loader");
    image_preview("#my_image2", "#image_loader2");
    image_preview("#my_vid", "#vid_loader");
    image_preview("#menu", "#menu_loader");
</script>

<!-- Core JS -->
<!-- build:js <?= admin_url ?>assets/vendor/js/core.js -->
<script src="<?= admin_url ?>assets/vendor/libs/jquery/jquery.js"></script>
<script src="<?= admin_url ?>assets/vendor/js/bootstrap.js"></script>
<script src="<?= admin_url ?>assets/vendor/libs/hammer/hammer.js"></script>
<script src="<?= admin_url ?>assets/vendor/libs/typeahead-js/typeahead.js"></script>

<script src="<?= admin_url ?>assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="<?= admin_url ?>assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="<?= admin_url ?>assets/vendor/libs/select2/select2.js"></script>
<script src="<?= admin_url ?>assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="<?= admin_url ?>assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
<script src="<?= admin_url ?>assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
<script src="<?= admin_url ?>assets/vendor/libs/cleavejs/cleave.js"></script>
<script src="<?= admin_url ?>assets/vendor/libs/cleavejs/cleave-phone.js"></script>
<script src="<?= admin_url ?>assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
<!-- Flat Picker -->
<script src="<?= admin_url ?>assets/vendor/libs/moment/moment.js"></script>
<script src="<?= admin_url ?>assets/vendor/libs/flatpickr/flatpickr.js"></script>
<!-- Form Validation -->

<!-- Main JS -->
<script src="<?= admin_url ?>assets/js/main.js"></script>

<!-- Page JS -->
<script src="<?= admin_url ?>assets/js/tables-datatables-basic.js"></script>
<script src="<?= admin_url ?>assets/js/form-layouts.js"></script>
<script src="<?= admin_url ?>assets/js/pages-account-settings-security.js"></script>
<script src="<?= admin_url ?>assets/js/modal-enable-otp.js"></script>
<script src="<?= admin_url ?>assets/js/pages-profile.js"></script>
<script src="<?= admin_url ?>assets/js/dashboards-analytics.js"></script>
<script src="<?= admin_url ?>assets/js/dashboards-crm.js"></script>
<script src="<?= admin_url ?>assets/js/pages-account-settings-account.js"></script>
<script src="<?= admin_url ?>assets/js/form-basic-inputs.js"></script>
<script>
    $(document).ready(function() {
        <?php
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
        ?>


    })
</script>

<script>
    $(document).ready(function() {
        // datatable (jquery)

        console.log(<?= json_encode($column_defs) ?>);
        $(function() {
            var dt_basic_table = $('.datatables-basic');
            if (dt_basic_table.length) {
                dt_basic = dt_basic_table.DataTable({
                    columns: <?= json_encode($column_defs) ?>,
                    columnDefs: [{
                            // For Responsive
                            className: 'control',
                            orderable: false,
                            searchable: false,
                            responsivePriority: 2,
                            targets: 0,
                            render: function(data, type, full, meta) {
                                return '';
                            }
                        },


                        {
                            responsivePriority: 1
                        }
                    ],
                    dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    displayLength: 7,
                    lengthMenu: [7, 10, 25, 50, 75, 100],

                    buttons: [
                        <?php if (isset($add)) : ?> {
                                extend: 'collection',
                                className: 'btn btn-label-primary me-2',
                                text: '<i class="bx bx-plus-circle me-sm-1"></i> <span class="d-none d-sm-inline-block">Add</span>',
                                action: function(e, dt, button, config) {
                                    // Redirect to the page you want to navigate to
                                    window.location.href = <?php echo json_encode($add) ?>;
                                }
                            },
                        <?php endif; ?>
                        {
                            extend: 'collection',
                            className: 'btn btn-label-primary dropdown-toggle me-2 MyNewBtn',
                            text: '<i class="bx bx-export me-sm-1"></i> <span class="d-none d-sm-inline-block">Export</span>',
                            buttons: [{
                                    extend: 'print',
                                    text: '<i class="bx bx-printer me-1" ></i>Print',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: <?php echo json_encode($column_indexes) ?>
                                    },
                                    customize: function(win) {
                                        //customize print view for dark
                                        $(win.document.body)
                                            .css('color', config.colors.headingColor)
                                            .css('border-color', config.colors.borderColor)
                                            .css('background-color', config.colors.bodyBg);
                                        $(win.document.body)
                                            .find('table')
                                            .addClass('compact')
                                            .css('color', 'inherit')
                                            .css('border-color', 'inherit')
                                            .css('background-color', 'inherit');
                                    }
                                },
                                {
                                    extend: 'csv',
                                    text: '<i class="bx bx-file me-1" ></i>Csv',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: <?php echo json_encode($column_indexes) ?>
                                    }
                                },
                                {
                                    extend: 'excel',
                                    text: '<i class="bx bxs-file-export me-1"></i>Excel',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: <?php echo json_encode($column_indexes) ?>
                                    }
                                },
                                {
                                    extend: 'pdf',
                                    text: '<i class="bx bxs-file-pdf me-1"></i>Pdf',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: [3, 4, 5, 6, 7],
                                        // prevent avatar to be display
                                        format: {
                                            body: function(inner, coldex, rowdex) {
                                                if (inner.length <= 0) return inner;
                                                var el = $.parseHTML(inner);
                                                var result = '';
                                                $.each(el, function(index, item) {
                                                    if (item.classList !== undefined && item.classList.contains('user-name')) {
                                                        result = result + item.lastChild.firstChild.textContent;
                                                    } else if (item.innerText === undefined) {
                                                        result = result + item.textContent;
                                                    } else result = result + item.innerText;
                                                });
                                                return result;
                                            }
                                        }
                                    }
                                },
                                {
                                    extend: 'copy',
                                    text: '<i class="bx bx-copy me-1" ></i>Copy',
                                    className: 'dropdown-item',
                                    exportOptions: {
                                        columns: [3, 4, 5, 6, 7],
                                        // prevent avatar to be display
                                        format: {
                                            body: function(inner, coldex, rowdex) {
                                                if (inner.length <= 0) return inner;
                                                var el = $.parseHTML(inner);
                                                var result = '';
                                                $.each(el, function(index, item) {
                                                    if (item.classList !== undefined && item.classList.contains('user-name')) {
                                                        result = result + item.lastChild.firstChild.textContent;
                                                    } else if (item.innerText === undefined) {
                                                        result = result + item.textContent;
                                                    } else result = result + item.innerText;
                                                });
                                                return result;
                                            }
                                        }
                                    }
                                }
                            ]
                        }
                    ],
                    responsive: {
                        details: {
                            display: $.fn.dataTable.Responsive.display.modal({
                                header: function(row) {
                                    var data = row.data();
                                    return 'Details of ' + data['full_name'];
                                }
                            }),
                            type: 'column',
                            renderer: function(api, rowIdx, columns) {
                                var data = $.map(columns, function(col, i) {
                                    return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                                        ?
                                        '<tr data-dt-row="' +
                                        col.rowIndex +
                                        '" data-dt-column="' +
                                        col.columnIndex +
                                        '">' +
                                        '<td>' +
                                        col.title +
                                        ':' +
                                        '</td> ' +
                                        '<td>' +
                                        col.data +
                                        '</td>' +
                                        '</tr>' :
                                        '';
                                }).join('');

                                return data ? $('<table class="table"/><tbody />').append(data) : false;
                            }
                        }
                    }
                });
            }

            // Filter form control to default size
            // ? setTimeout used for multilingual table initialization
            setTimeout(() => {
                $('.dataTables_filter .form-control').removeClass('form-control-sm');
                $('.dataTables_length .form-select').removeClass('form-select-sm');
            }, 300);
        });

    });
</script>



<style>
    .MyNewBtn {
        background-color: #58ADAB;
        color: white;
    }

    .DeeEnd {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .DivBottom {
        display: flex;
        justify-content: center;
        align-items: flex-end;
        width: 100%;
    }

    .MyLogo {
        width: 150px;
    }

    .GreenHeader {
        color: #9ECD52;
        font-weight: 700;
        font-size: 20px;
    }

    .QuoteContainer {
        border-radius: 8px;
        background: #269491;
        margin-top: -2em;
        z-index: 1;
        position: relative;
    }

    .DeeFlex {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .DeeBlo {
        display: block;
    }

    .DeeStart {
        display: flex;
        height: 100%;
        justify-content: start;
        align-items: center;
    }

    .MarginTop {
        margin-top: 1em;
    }

    .MarginBottom {
        margin-bottom: 1em;
    }

    .QuoteHeader {
        margin-top: 2em;
        color: #fff;
    }

    .QuoteCard {
        display: flex;
        justify-content: center;
        align-items: center;
        background: #fff;
        margin: 1em;
        border-radius: 1em;
    }

    .QuoteCardInner {}

    .QuoteImg {
        margin-top: 1em;
    }

    .QuoteTitle {
        text-align: center;
    }

    .HeaderContainer {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .MyHeader {
        color: <?= $maincolor ?>;
        font-size: 36px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        text-align: center;
    }

    .GreenBar {
        display: block;
        margin: auto;
        width: 60px;
        height: 4px;
        margin-bottom: 1em;
        border-radius: 5px;
        background: <?= $maincolor ?>;
    }

    .DeliveryImg {}

    .myClose {
        border: none;
        background: transparent;
        font-weight: 700;
    }


    .WhyInner {
        display: flex;
        padding: 19px 16px 12px 16px;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        border: 1px solid rgba(227, 231, 230, 0.94);
        background: #FFF;
        box-shadow: 0px 4px 4px 0px rgba(237, 237, 237, 0.60);
        height: 15em;
    }

    .WhyContent {}

    .WhyImg {
        display: block;
        margin: auto;

    }

    .WhyHeader {
        margin-top: 10px;
        text-align: center;
        text-transform: uppercase;
    }

    .WhyText {
        text-align: center;
    }

    .Subscribe {
        background: #4D4D4D;
        padding: 2em 0em;
    }

    .SignUpHeader {
        color: #FFFFFF;
        margin: 2em 0em;
    }

    .SignUpText {
        color: #fff;
    }

    .InputArea {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .InputBox {
        display: flex;
        width: 578px;
        padding: 11px 20px;
        background: #fff;
        justify-content: center;
        align-items: center;
    }

    .InputInput {}

    .InputInput input {
        border: none;
        margin-right: 2em;
        width: 100%;
    }


    .InputBtn {
        border-radius: 6px;
        background: #9ECD52;
        border: none;
        padding: 10px;
        color: white !important;
    }

    .InputBtnClear {
        background: white;
        border-radius: 10px;
        border: 2px solid #9ECD52;
        padding: 10px;
        color: #9ECD52 !important;
    }

    .InputBtnClear2 {
        background: transparent;
        border: none;
        color: #F97066 !important;
    }

    .GreyBtn {
        border-radius: 6px;
        background: #9D9D9D;
        border: none;
        padding: 10px;
        color: white !important;
        margin-right: 1em;
    }

    .BlueBtn {
        border-radius: 6px;
        background: <?= $maincolor ?>;
        border: none;
        padding: 10px;
        color: white !important;
        width: 100%;
    }

    .SpacedBtn {
        margin: 2em 0em;
    }



    .LoginInputs {}

    .LoginInputs .form-group {}

    .LoginInput {
        width: 100%;
        margin: 10px 0em;
        height: 3em;
        border: 1px solid #ced4da;
        padding: 0.375rem 2.25rem 0.375rem 0.75rem;
    }

    .JusAround {
        display: flex;
        justify-content: space-between;
    }

    .BreadcrumbHeader {
        background: url('assets/img/new/header.png');
        height: 5em;
        width: 100%;
    }

    .BHInner {}

    .BHTextArea {}

    .BHTextAreaInner {}

    .BHTextAreaInner h2 {}

    .AboutHeader {
        color: <?= $maincolor ?>;
        font-weight: 800;
        color: #269491;
    }

    .AboutText {}

    .AboutText p {
        color: black;
    }

    .AboutMid {
        background: #DFF6B9;
        width: 100%;
    }

    .AboutMidInner {}

    .AboutMidImage {}

    .AboutMidText {
        padding: 1em 3em;
    }

    .AboutMidText .DeeBlo h2 {
        font-weight: 800;
        color: <?= $maincolor ?>;
    }

    .AboutMidText .DeeBlo p {
        color: black;
    }

    .AboutMidImage {}

    .AboutMidImage img {}

    .AboutBanner {
        background: url('assets/img/new/about.png');
        height: 20em;
        object-fit: cover;
    }

    .FullBtn {
        border-radius: 14px;
        background-color: #9ECD52 !important;
        width: 100%;
        color: white !important;
    }

    .ModalLogo {}

    .ModalLogo img {
        width: 150px;
    }

    .ModalImg {}

    .ModalImg img {
        width: 10em;
        object-fit: cover;
    }

    .BlackText {
        color: black !important;
    }

    @media (min-width: 576px) {
        .modal-dialog {
            max-width: 50% !important;
            margin: 1.75rem auto;
        }
    }

    #CommercialForm,
    #PSVForm {
        display: none;
    }

    .ModalBodyInner {}

    .ModalCheckBoxes {
        display: flex;
        justify-content: flex-start;
        align-items: start;
    }

    .ModalCheckBoxes .form-check {
        margin-right: 2em;
    }

    .InsuranceHeader {}

    .InsuranceHeaderTop {
        background-color: <?= $secondarycolor ?>;
        height: 4em;
    }

    .InsurancerTop {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        height: 100%;
    }

    .InsurancerTop h3 {
        width: 5em;
        font-weight: 700;
        font-size: 1.2em;
    }


    .InsuranceHeaderBottom {
        height: 4em;
        background-color: #F4F2F2;
    }

    .InsurancerBottom {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        height: 100%;
    }

    .InsurancerBottom h3 {
        width: 5em;
        font-weight: 700;
        font-size: 1em;
    }

    .QuotesCard {
        border-radius: 8px;
        border: 1px solid #CFCECE;
        background: #FFF;
    }

    .QuotesCard2 {
        border-radius: 8px;
        border: 1px solid #CFCECE;
        background: #FFF;
        width: 70%;
    }

    .QuotesInner2 {
        display: block;
        padding: 4em;
        width: 100%;
    }

    .QuotesInner2 h2 {
        color: #666;
        font-size: 31px;
        font-weight: 700;
        letter-spacing: 0.321px;
    }

    .Forgot {
        color: rgba(24, 92, 227, 0.76);
        font-size: 14px;
        font-weight: 500;
        letter-spacing: -0.387px;
    }

    .SingleQuote {
        border-radius: 10px;
        background: #fdfdfd;
        margin: 1em;
        box-shadow: 0px 4px 4px 0px #EBEBEB;
    }

    .SingleQuoteContent {
        margin: 1em 0em;
    }

    .SingleQuoteContent img {}

    .SingleQuoteContent p {}

    .SingleQuoteContent a {}

    .AddBtn {}

    .BuyBtn {}

    .ContentQuote {
        display: flex;
        align-items: center;
    }

    .CoversCard {
        background: #F4F2F2;
    }

    .SingleBenefit {
        background: rgba(38, 148, 145, 0.94);
        padding: 0em 1em;
    }

    .SingleCover {
        background: #F4F2F2;
        padding: 0em 1em;
    }

    .ModalFormInput {
        margin: 5px 0em;
    }

    #optionalBenefitsDiv {
        display: none;
    }

    .LineAbove {
        border-top-style: solid;
    }

    #business_input {
        display: none;
    }

    .RegisterCard {
        border-radius: 8px;
        border: 1px solid #CFCECE;
        background: #FFF;
        padding: 2em;
    }

    .PersonalDetails {}

    .PersonalForm {}

    .SummaryBox {
        border-radius: 8px;
        background: #F7FDF9;
        padding: 2em;
        height: 100%;
    }

    #pencil {
        margin-left: 4em;
    }


    /* MOBILE  */


    @media screen and (max-width:600px) {
        rs-arrow {
            display: none !important;
        }

        .WhyInner {
            margin: 1em 0em;
        }

        .modal-dialog {
            max-width: 80% !important;
            margin: 1.75rem auto;
        }

        .ModalCheckBoxes {
            display: flex;
            justify-content: flex-start;
            align-items: start;
            flex-wrap: wrap;
            margin-bottom: 1em;
        }

        .GreenHeader {
            color: #9ECD52;
            font-weight: 700;
            font-size: 14px;
        }

        .InsurancerTop h3 {
            font-size: 0.7em;
        }

        .InsurancerBottom h3 {
            font-size: 0.7em;
        }

        #pencil {
            margin-left: 5px;
        }

        .SingleQuoteContent {
            margin: 1em 0em;
        }

        .SingleQuoteContent img {
            width: 100%;
            padding: 1em;
        }

        .SingleQuoteContent p {
            text-align: center;
            width: 100%;
        }

        .ContentQuote {
            margin: 5px 0em;
            width: 100%;
            justify-content: center;
        }

        .SingleCover {
            border-bottom: 1px solid;
        }

        .QuotesCard2 {
            width: 100%;
        }

        .QuotesInner2 {
            padding: 1em;
        }

        .BlueBtn {
            width: 100%;
            display: block;
            text-align: center;
        }

        .SummaryBox {
            margin-top: 1em;
        }
    }
</style>

</body>

</html>