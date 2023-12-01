<?php 
$heading = $page_component['heading'];
$bike_category = $page_component['bike_category'];

$bike_id = array();
foreach($bike_category as $bike_categ) {
	$bike_id = $bike_categ['id'];
}

$args_new_model = array(
	'post_type' => 'bikes',
	'numberposts' => -1,
	'tax_query' => array(
		array(
			'taxonomy' => 'bike-type',
			'field' => 'term_id',
			'terms' => array($bike_id)
		)
	)
);
$query_new_model = get_posts( $args_new_model );
?>
<section class="featured-bikes">
	<?php if($heading) { ?>
		<div class="bar">
			<div class="container <?= $container_width ?>">
				<div class="heading-box light" data-aos="fade-right" data-aos-duration="500">
					<h2 class="mb-0">	<?= $heading ?></h2>
				</div>
			</div>
		</div>
	<?php } ?>
	

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
								<img  src="<?= wp_get_attachment_image_url( $image_id, 'large' ); ?>" alt="<?=$postvalue->post_title?>">
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
