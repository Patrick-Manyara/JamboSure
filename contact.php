<?php
$page = 'contact us';
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
				<h2>Home / <?= ucwords($page) ?></h2>
			</div>
		</div>
	</div>
</section>
<!-- End of breadcrumb section
	============================================= -->
<!-- Start of Contact Page section
	============================================= -->
	<section id="in-contact-page" class="in-contact-page-section position-relative">
		<!-- <div class="in-google-map">
			<iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d6209.242755903148!2d-77.04363602434464!3d38.90977276948481!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1394992895496"  height="590" width="100%"></iframe>
		</div>	 -->
		<div class="container">
			<div class="in-contact-page-content position-relative">
				<div class="row">
					<div class="col-lg-6">
						<div class="in-faq-contact-info-wrap">
							<img src="assets/img/new/customer.png" />
						</div>
					</div>
					<div class="col-lg-6">
						<div class="in-faq-contact-form-area">
							<div class="in-faq-contact-info-title headline pera-content">
								<h3>Get In Touch  </h3>
								
							</div>
							<div class="in-faq-contact-form">
								<form action="sendemail.php" method="get">
									<div class="row">
										<div class="col-md-6">
											<input type="text" name="username" placeholder="Name">
										</div>
										<div class="col-md-6">
											<input type="email" name="email" placeholder="Email">
										</div>
										<div class="col-md-6">
											<input type="text" name="phone" placeholder="Phone">
										</div>
										<div class="col-md-6">
											<input type="text" name="subject" placeholder="Web">
										</div>
										<div class="col-md-12">
											<textarea name="message" placeholder="Message"></textarea>
										</div>
										<div class="col-md-12">
											<input class="FullBtn" type="submit" value="Submit Now" />
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
<!-- End of Contact Page  section
	============================================= -->	



	<?php include_once 'footer.php'; ?>