<?php /* Template Name: Homepage Redesign */ ?>
<?php get_header(); ?> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" ></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

<style>
	body.overlay:before {
		background-color: #fff;
		height: calc(72px + 62px);
	}
	footer {
		z-index: -1;
	}

</style>
<?php 
$banner_slider = carbon_get_the_post_meta('banner_slider');
$banner_slider_count = count($banner_slider);
?>
<main id="page-components" class="page-components" >
	<section class="hero-carousel-section">
		<div class="hero-carousel-holder hero-carousel owl-carousel">
			<?php foreach($banner_slider as $key => $slider) { ?>
				<div class="item">
					<div class="hero-banner hero-banner-video hero-banner-carousel">
						<img class="no-lazyload" src="<?= wp_get_attachment_image_url($slider['background_image'], 'full') ?>" alt="<?= $slider['heading'] ?>">
						<div class="contents cta-style with-overlay">
							<div class="container wide witdh1700">
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
	<?php 
	$args_new_model = array(
		'post_type' => 'bikes',
		'numberposts' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'bike-type',
				'field' => 'term_id',
				'terms' => 307
			)
		)
	);
	$query_new_model = get_posts( $args_new_model );
	?>
	<section class="featured-bikes">
		<div class="bar">
			<div class="container wide witdh1700">
				<div class="heading-box light" data-aos="fade-right" data-aos-duration="500">
					<h2 class="mb-0">Featured Bikes</h2>
				</div>
			</div>
		</div>

		<div class="swiper-slider-holder swiper-slider-style-one-holder" data-aos="fade-up" data-aos-duration="500">
			<!-- Swiper -->
			<div class="swiper-container mySwiper-Home swiper-slider-style-one">
				<div class="swiper-wrapper">
					<?php foreach ($query_new_model as $postvalue) : ?>
						<?php 
						$bike_slider_background = carbon_get_post_meta($postvalue->ID,'bike_slider_background');
						$bike_slider_image = carbon_get_post_meta($postvalue->ID,'bike_slider_image');
						$b_img = attachment_url_to_postid(carbon_get_post_meta($postvalue->ID,'b_img'));

						if($bike_slider_background) {
							$bike_slider_background_id = $bike_slider_background;
						} else {
							$bike_slider_background_id = $b_img;
						}
						if($bike_slider_image) {
							$image_id = $bike_slider_image;
						} else {
							$image_id = $b_img;
						}
						?>
						<div class="swiper-slide bike-id-<?= $postvalue->ID ?>">
							<div class="item">
								<div class="background-box " style="background-image: url(<?= wp_get_attachment_image_url( $bike_slider_background_id, 'large' ); ?>)">
									<div class="content-holder">
										<div class="inner" style="    z-index: 9;">
											<div class="heading-box">
												<h3>
													<?=$postvalue->post_title?>
												</h3>
											</div>
											<a class="pc-btn white anchor-modal" href="<?=get_permalink($postvalue->ID)?>">DISCOVER</a>
										</div>
									</div>
								</div>
								<div class="image-box " data-swiper-parallax="-50%">
									<img class="no-lazyload" src="<?= wp_get_attachment_image_url( $image_id, 'large' ); ?>" alt="<?=$postvalue->post_title?>">
								</div>
							</div>
						</div>
					<?php endforeach;  ?>
				</div>
				<div class="swiper-pagination"></div>
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>
		</div>
	</section>
	
	<?php 
	$args_wp= array(
		'category_name' => 'news-and-updates', 
		'posts_per_page' => 3,
	);
	$wp_query = new WP_Query($args_wp);
	?>
	<section class="latest-news">
		<div class="bar">
			<div class="container wide witdh1700">
				<div class="inner">
					<div class="heading-box light" data-aos="fade-right" data-aos-duration="500">
						<h2 class="mb-0">Latest News</h2>
					</div>
					<a class="pc-btn anchor-modal with-arrow float-right" href="https://www.ccm-motorcycles.com/updates/">VIEW ALL</a>
				</div>
			</div>
		</div>
		<div class="latest-news-holder">
			<div class="container wide witdh1700">
				<div class="row">
					<?php while ( $wp_query->have_posts() ) { ?>
						<?php $wp_query->the_post();  ?>
						<div class="col-sm-4">
							<a href="<?php the_permalink() ?>" class="column-holder" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="300">
								<?php the_post_thumbnail( 'large' ); ?>
								<div class="post-details-box">
									<div class="post-date inner">
										<?= ccm_date_format(get_the_date()) ?>
									</div>
									<div class="post-title inner">
										<h3><?php the_title() ?></h3>
									</div>
								</div>
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<section class="info-section img ctr cvr" style="background-image: url(https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/MB4-JPG-1.jpg)">
		<div class="container wide witdh1700">
			<div class="inner">
				<div class="heading-box light white-text" data-aos="fade-up" data-aos-duration="500">
					<h2>Accessories</h2>
				</div>
				<div class="paragraph white small" data-aos="fade-up" data-aos-duration="500">
					<p>
						Customise your bike with a selection of official CCM Motorcycles accessories
					</p>
				</div>
				<a class="pc-btn white anchor-modal" href="/shop/" data-aos="fade-up" data-aos-duration="500">BROWSE ACCESSORIES</a>

			</div>
		</div>
	</section>

</main>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<script>
	var $hero_carousel = jQuery('.hero-carousel');

	jQuery(document).ready(function($) {
		navbar_toggle();
	});

	function navbar_toggle() {
		$body = jQuery('body');
		jQuery('.navbar-toggle').click(function(event) {
			if($body.hasClass('navbar-active')) {
				$body.removeClass('navbar-active');
			} else {
				$body.addClass('navbar-active');
			}
		});
	}

	


	$hero_carousel.on('initialized.owl.carousel', function(event) {
		$hero_carousel.find('.owl-item.active .item .right-side').css('margin-left', '-105px');
		$hero_carousel.find('.fake-owl-navs').click(function(event) {
			$hero_carousel.find(jQuery(this).attr('target')).click();
		});
	});


	$hero_carousel.on('translated.owl.carousel', function(event) {
		$hero_carousel.find('.owl-item.active .item .right-side').css('margin-left', '-105px');
		$hero_carousel.find('.owl-item:not(.active) .item .right-side').css('margin-left', 0);
	});


	$hero_carousel.owlCarousel({
		loop:true,
		stagePadding: 0,
		margin:0,
		nav:true,
		dots:false,
		singleItem: true,
		autoplay: true,
		autoplayTimeout: 6000,
		autoplaySpeed: 1200,
		navSpeed: 1200,
		items:1
	});



</script>
<script>
	var swiperHome = new Swiper(".mySwiper-Home", {
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

	var mySwiperThumbs = new Swiper(".mySwiperThumbs-Current", {
		loop: true,
		spaceBetween: 0,
		slidesPerView: 6,
		watchSlidesProgress: true,
	});


	var mySwiper_Header = new Swiper(".mySwiper-Header-Current", {
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
		},
		thumbs: {
			swiper: mySwiperThumbs,
		},


		
	});


	var mySwiperThumbs = new Swiper(".mySwiperThumbs-Previous", {
		loop: true,
		spaceBetween: 0,
		slidesPerView: 6,
		watchSlidesProgress: true,
	});


	var mySwiper_Header = new Swiper(".mySwiper-Header-Previous", {
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
		},
		thumbs: {
			swiper: mySwiperThumbs,
		},


		
	});

/*	jQuery('.bike-thumbnail').click(function(event) {
		$target = jQuery(this).attr('data-target');
		console.log($target);
		jQuery('.swiper-pagination-bullet[aria-label="'+$target+'"]').click();
	});*/

</script>

<script>
	AOS.init({
		once: true
	});
</script>

<?php get_footer(); ?> 
