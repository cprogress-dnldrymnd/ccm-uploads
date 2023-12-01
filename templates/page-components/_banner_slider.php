<?php 
$banner_slider = $page_component['banner_slider'];
$banner_slider_count = count($banner_slider);
?>
<style>
	#page-components {
		margin-top: 0;
	}
	#ccm-header.header-v2 {
		padding: 0;
		background-color: transparent !important;
	}
	#ccm-header.header-v2.fixed {
		background-color: #fff !important;
	}
	
	.top-text-holder {
		color: #fff;
	}
	.top-text-holder p {
		font-size: 5rem;
	}
	@media(min-width: 768px) {
		.top-text {
			margin-bottom: 3rem;
		}
	}
	@media (max-width: 767px) {
		.top-text-holder p {
			font-size: 4rem;
			line-height: 1.2;
		}
		.top-text-holder {
			text-align: center;
		}
	}

</style> 
<section class="hero-carousel-section">
	<div class="hero-carousel-holder hero-carousel owl-carousel" data-aos="fade-up" data-aos-duration="500">
		<?php foreach($banner_slider as $key => $slider) { ?>
			<div class="item">
				<div class="hero-banner hero-banner-video hero-banner-carousel">
					<img src="<?= wp_get_attachment_image_url($slider['background_image'], 'full') ?>" alt="<?= $slider['heading'] ?>">
					<div class="contents cta-style with-overlay">
						<div class="container <?= $container_width ?>">
							<?php if($slider['top_text']) { ?>
								<div class="outer top-text">
									<div class="top-text-holder">
										<?= wpautop($slider['top_text']) ?>
									</div>
								</div>
							<?php } ?>
							<div class="outer">
								<div class="inner">
									<?php if($slider['heading']) { ?>
										<h1><?= $slider['heading'] ?></h1>
									<?php } ?>
								</div>
								<div class="inner">
									<?php if($slider['tagline']) { ?>
										<span><?= $slider['tagline'] ?></span>
									<?php } ?>
									<?php if($slider['button_text']) { ?>
										<a class="pc-btn anchor-modal with-arrow" href="<?= $slider['button_link'] ?>"><?= $slider['button_text'] ?></a>
									<?php } ?>

								</div>
							</div>
							<div class="bottom">
								<div class="inner previous-model">
									<div class="fake-owl-navs owl-nav-prev" target=".owl-prev">
										<img class="no-lazyload" src="../wp-content/themes/CCM/app/assets/images/arrow-left.png"/>
									</div>
									<span>
										<?php
										if($key == 0) {
											echo $banner_slider[$banner_slider_count-1]['heading'];
										} else {
											echo $banner_slider[$key-1]['heading'];
										}
										?>
									</span>

								</div>
								<div class="inner previous-model">
									<span>
										<?php 
										if($key == ($banner_slider_count - 1)) {
											echo $banner_slider[0]['heading'];
										} else {
											echo $banner_slider[$key+1]['heading'];
										}
										?>
									</span>
									<div class="fake-owl-navs owl-nav-next" target=".owl-next">
										<img class="no-lazyload" src="../wp-content/themes/CCM/app/assets/images/arrow-right.png"/>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="right-side">
					<div class="inner previous-model">
						<div class="fake-owl-navs owl-nav-prev" target=".owl-prev">
							<img class="no-lazyload" src="../wp-content/themes/CCM/app/assets/images/arrow-left.png"/>
						</div>
						<span>
							<?php
							if($key == 0) {
								echo $banner_slider[$banner_slider_count-1]['heading'];
							} else {
								echo $banner_slider[$key-1]['heading'];
							}
							?>
						</span>
					</div>
					<div class="inner previous-model">
						<span>
							<?php 
							if($key == ($banner_slider_count - 1)) {
								echo $banner_slider[0]['heading'];
							} else {
								echo $banner_slider[$key+1]['heading'];
							}
							?>
						</span>
						<div class="fake-owl-navs owl-nav-next" target=".owl-next">
							<img class="no-lazyload" src="../wp-content/themes/CCM/app/assets/images/arrow-right.png"/>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</section>