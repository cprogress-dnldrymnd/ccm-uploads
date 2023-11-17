<?php
/**
    *   Template Name: Page Spitfire Range
*
    *   This page template has a sidebar built into it,
    *   and can be used as a home page, in which case the title will not show up.
*
*/
?>

<?php get_header('spitfire'); ?> 
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<style>
	.wpcf7-spinner {
		position: absolute;
	}
	.page-banner .heading span.focus {
		font-size: 18px;
		font-weight: 500;
	}
	header .anchor-modal.anchor-modal.anchor-modal, .page-components .btn-box.btn-box.btn-box a{
		font-size: 16px;
		font-weight: 500;
	}
	section.fading-owl-carousel .container .inner .owl-carousel .item .img {
		background-position: center -105px;
	}
	footer.footer-page-components .logo a {
		pointer-events:  none;
	}
	.wpcf7-form.invalid .wpcf7-response-output.wpcf7-response-output.wpcf7-response-output {
		color: red;
	}
	.page-components .btn-box a span, footer.footer-page-components .btn-box a span, header.header-page-components .btn-box a span {
		border-color: red;
	}
	.page-components .btn-box a:hover span, footer.footer-page-components .btn-box a:hover span, header.header-page-components .btn-box a:hover span {
		border-color: #fff;
	}
	select#select_car_make option:first-child {
		display:  none;
	}
	select.car_model option:first-child {
		display:  none;
	}
	@media (max-width:  620px) {
		header.header-page-components .btn-box {
			margin-top: 0;
		}
	}
	@media (max-width: 480px) {
		header.header-page-components .btn-box {
			margin-top: 10px;
		}
		header.header-page-components {
			padding-top:  28px;
		}
		header.header-page-components a.logo-page-components {
			float:  none;
		}
		header.header-page-components a.logo-page-components img {
			margin-bottom:  20px;
		}
		header.header-page-components .btn-box {
			float:  none;
			text-align:  center;
		}
		header.header-page-components .btn-box a:first-child {
			display: inline-block;
		}
	}

	@media (max-width:  1199px) {
		section.fading-owl-carousel .container .inner .owl-carousel .item .img {
			background-position: center -80px;
		}
	}
	@media (max-width:  991px) {
		section.fading-owl-carousel .container .inner .owl-carousel .item .img {

			background-position: center -50px;
		}
	}
	@media (max-width:  768px) {
		section.fading-owl-carousel .container .inner .owl-carousel .item .img {

			background-position: center 0;
		}
	}
</style>


<main id="page-components" class="page-components">

	<section class="page-banner img cvr ctr">
		<video autoplay="" muted="" loop="" id="myVideo" preload="metadata" playsinline="">
			<source src="https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/Main_Trailer_20mb.mp4"/>
		</video>
		<div class="container">	 
			<div class="inner">
				<div class="top heading text-center">
					<span>
						<span class="focus">LANDING SOON
						</span>
						<span>
							– THE CCM SPITFIRE RANGE
						</span>
					</div>
					
				</div>
			</div>
			<span class="vertical-line"></span>
		</section>


		<section class="fading-owl-carousel darker-overlay" >
			<div class="container" style="max-width: 100%; width: 100% !important;">
				<div class="inner">
					<div class="owl-carousel" id="fading-owl">
						<div class="item">
							<div class="img ctr ctn nrp" style="background-image: url(https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/Bobber-Stealth-Black_CW_Engine-cover-V2.png)">

							</div>
						</div>
						<div class="item">
							<div class="img ctr ctn nrp" style="background-image: url(https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/Bobber-Stealth-Black_CW_Engine-cover-V2.png)">

							</div>
						</div>
						<div class="item">
							<div class="img ctr ctn nrp" style="background-image: url(https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/Bobber-Stealth-Black_CW_Engine-cover-V2.png)">

							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="content-wrapper">
				<div class="container">
					<div class="contents">
						<div class="heading text-center big semibold">
							<h1>LEGENDARY <br> BRITISH MOTORCYCLES</h1>
						</div>
						<div class="paragraph text-center white" style="margin-bottom: 30px;">
							<p>
								Legendary British motorcycle company CCM Motorcycles were founded in 1971 in Bolton, England. 50 years on, the hand-built tradition continues with the stylish Spitfire range of motorcycles. 
							</p>

							<p>
								Our lightweight, artisan machines of distinction have caught the attention of the motorcycling public across Europe and beyond, and our journey into the continent has now begun. 
							</p>

							<p>
								The design and homologation process is already well underway with the introduction into Europe planned for 2023. To be amongst the first to receive updates on these very special motorcycles, please register your interest here.
							</p>
						<!-- <p style="margin-top: 40px; letter-spacing: 1px;">
							<strong> 
								<span style="display: flex; align-items: center; justify-content: center;">
									<span>FROM&nbsp;</span>
									<span style="font-size: 23px; font-weight: bold;">£8,995&nbsp;</span> 
									<span>OTR</span>
								</span>
								
							</strong>
						</p> -->
						
					</div>
					<div class="heading text-center big semibold">
						<h1>LANDING SOON</h1>
					</div>

					<div class="btn-box text-center" style="margin-top: 30px;">
						<a class="anchor-modal" data-target="#enquire-now-modal">REGISTER YOUR INTEREST <span></span></a>
					</div>
				</div>
			</div>
		</div>
		
	</section>



	<!--<section class="two-column">
		<div class="container wide witdh1800">
			<div class="row">
				<div class="col-md-7">
					<div class="inner">
						<div class="img ctn nrp btm" style="background-image: url(https://www.ccm-motorcycles.com/wp-content/uploads/2020/08/Front-Crop.jpg)"></div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="inner valign">
						<div class="middle">
							<div class="heading semibold medium">
								<h2>CCM AND EUROPE</h2>
							</div>
							<div class="paragraph white">
								<p>
									Since the birth of the Spitfire, the distinctive style of this cool series of bikes has been featured in the media across Europe, and the attention that brought to the CCM brand inspired us to create a special Spitfire for our European customers. Work has begun to develop a machine that retains the signature style and excitement of the original series, together with the features required to enable the bikes to be sold throughout Europe. .
								</p>
								<p>
									2022 will see the European Spitfire emerge across the continent. If you would like to discover more about the British invasion, please register your interest either as a customer or a dealer here
								</p>
							</div>
							<div class="btn-box">
								<a class="anchor-modal" data-target="#enquire-now-modal">REGISTER YOUR INTEREST <span></span></a>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>-->
	<section class="featured-bikes" style="position: relative">

		<div class="swiper-slider-holder swiper-slider-style-one-holder" >
			<!-- Swiper -->
			<div class="swiper-container mySwiper swiper-slider-style-one">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<div class="item">
							<div class="background-box" style="background-image: url(https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/Backgrounds.png)">
								<div class="content-holder">
									<div class="inner">
										<div class="heading-box">
											<h3>
												Spitfire <br> Six
											</h3>
										</div>
										
									</div>
								</div>
							</div>
							<div class="image-box" data-swiper-parallax="-50%">
								<img class="no-lazyload" src="https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/six-shadow-2-e1637575702218.png" alt="Spirfire Six">
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="item">
							<div class="background-box" style="background-image: url(https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/mav2.jpg)">
								<div class="content-holder">
									<div class="inner">
										<div class="heading-box">
											<h3>
												Spitfire <br> Maverick
											</h3>
										</div>
										
									</div>
								</div>
							</div>
							<div class="image-box" data-swiper-parallax="-50%">
								<img class="no-lazyload" src="https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/maverick-Cutout.png" alt="Spirtfire Maverick">
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="item">
							<div class="background-box" style="background-image: url(https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/moto-bg.jpg)">
								<div class="content-holder">
									<div class="inner">
										<div class="heading-box">
											<h3>
												Street <br> Moto
											</h3>
										</div>

									</div>
								</div>
							</div>
							<div class="image-box" data-swiper-parallax="-50%">
								<img class="no-lazyload" src="https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/Moto-New.png" alt="Street Moto">
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="item">
							<div class="background-box" style="background-image: url(https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/tracker-bg.jpg)">
								<div class="content-holder">
									<div class="inner">
										<div class="heading-box">
											<h3>
												Street <br> Tracker
											</h3>
										</div>

									</div>
								</div>
							</div>
							<div class="image-box" data-swiper-parallax="-50%">
								<img class="no-lazyload" src="https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/Tracker-New2.png" alt="Street Tracker">
							</div>
						</div>
					</div>

				</div>
				<div class="swiper-pagination"></div>
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>
		</div>
	</section>

	<section class="enquire-now-modal" id="enquire-now-modal" page="Blackout VIP">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 exit-col">
					<div class="valign">
						<div class="exit middle text-center">
							<a class="exit-modal" data-target="#enquire-now-modal"><i class="fas fa-times"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-6 contact-form">
					<div class="shortcode valign">
						<div class="middle">
							<div class="heading black medium semibold">
								<h2>REGISTER YOUR INTEREST</h2>
							</div>
							
							<?php 
							if(is_page(10350)) {
								echo do_shortcode( '[contact-form-7 id="10349" title="Spitfire Landing Page Form with Car Make Select (Modal)"]' );
								echo do_shortcode('[bike_models]');
							} else {
								echo do_shortcode( '[contact-form-7 id="10333" title="Spitfire Landing Page Form (Modal)"]' );
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
</main>
<?php get_footer('blackout'); ?>
<script>

	
	var swiper = new Swiper(".mySwiper", {
		slidesPerView: 2,
		loop: true,
		centeredSlides: true,
		parallax: true,
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
			type: 'bullets',
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		breakpoints: {

			0: {
				slidesPerView: 1,
				spaceBetween: 10
			},

			481: {
				slidesPerView: 2,
				spaceBetween: 20,
			},

			768: {
				spaceBetween: 30,
			},


			992: {
				spaceBetween: 40,
			},

			1024: {
				spaceBetween: 50,
			},

			
		}
	});
</script>