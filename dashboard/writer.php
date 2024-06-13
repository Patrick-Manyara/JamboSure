<?php
$page        = 'writer';

// require_once '../path.php';
require_once 'header.php';

$current_year   = date("Y");

$writer = get_by_id('writer', security('id', 'GET'));

if (!empty($writer)) {
    session_assignment(array(
        'edit' => $writer['writer_id']
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
                    Add Underwriters </h3>
            </div>
            <div class="mt-4">
                <form enctype="multipart/form-data" action="<?= model_url ?>writer" method="POST">
                    <div class="row clearfix">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <?php
                            input_hybrid('Name', 'writer_name', $writer, $require);
                            ?>
                            
                            

                            <?php
                   
                           
                            if (!empty($writer['writer_image'])) :
                                $require = false;
                                $image = $writer['writer_image'];
                            else :
                                $require = false;
                                $image = 'white_bg_image.png';
                            endif;
                            input_hybrid("Logo/Image", "writer_image", $writer, true, "file", 'my_img', '', 'img');
                            ?>
                            <img alt="image" src="<?= file_url . $image ?>" id="img_loader" style="border-radius: 5%; border-color:grey; border-style: solid; height:auto; width: 60%;">

                        </div>


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
            url: "check_available.php",
            data: 'writer_email=' + $("#email").val(),
            type: "POST",
            success: function(data) {
                $("#emailid-availability").html(data);
            },
            error: function() {}
        });
    }
</script>

<?php include_once 'footer.php'; ?>