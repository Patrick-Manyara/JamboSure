<?php
$page        = 'corporate';

//  require_once '../path.php';
require_once 'header.php';

$corporate = get_by_id('corporate', security('id', 'GET'));

if (!empty($corporate)) {
    session_assignment(array(
        'edit' => $corporate['corporate_id']
    ), false);
    $require = false;
} else {
    $require = true;
}
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body card-secondary">
            <div class="card-header">
                <h3 class="card-title">
                    Add corporate </h3>
            </div>
            <div class="mt-4">
                <form action="<?= model_url ?>corporate_register&admin" method="POST">
                    <div class="row">

                        <?php
                        input_hybrid('Name', 'corporate_name', $corporate, $require);
                        ?>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for='corporate_email'>Email</label>
                                <input class="form-control" type="email" name="corporate_email" id="corporate_email" required placeholder="Enter Your Email" value="<?php echo isset($corporate['corporate_email']) ? $corporate['corporate_email'] : ''; ?>" onBlur="checkAvailabilityEmailid()" required>
                                <span id="emailid-availability" style="font-size:12px;"></span>
                            </div>
                        </div>
                        <?php
                        input_hybrid('Phone Number', 'corporate_phone', $corporate, $require);
                        input_hybrid('Password', 'corporate_password', $corporate, $require);
                        ?>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-4 text-center">
                            <div class="text-center">
                                <button class="btn btn-primary" type="submit" id="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<script>
    function checkAvailabilityEmailid() {
        jQuery.ajax({
            url: "../check_available.php",
            data: 'corporate_email=' + $("#corporate_email").val(),
            type: "POST",
            success: function(data) {
                console.log(data);
                $("#emailid-availability").html(data);
            },
            error: function() {}
        });
    }
</script>
<?php include_once 'footer.php'; ?>