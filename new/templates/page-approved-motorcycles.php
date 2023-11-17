<?php
/**
    *   Template Name: APPROVED MOTORCYCLES
    *   This page template has a sidebar built into it,
    *   and can be used as a home page, in which case the title will not show up.
*
*/
get_header();
?>

<?php 
$sort_by = $_GET['ex-display-orderby'];

$sort_options = array('Sort By','Price (lowest first)','Price (highest first)');
$the_sort_option = '';
foreach($sort_options as $sort_option) {
	if($sort_option == $sort_by) {
		$the_sort_option .= '<option value="'.$sort_option.'" selected="selected">'.$sort_option.'</option>';
	} else {
		$the_sort_option .= '<option value="'.$sort_option.'">'.$sort_option.'</option>';
	}
}


if($sort_by == 'Price (lowest first)') {
	$sort_value = 'asc';
} else if($sort_by == 'Price (highest first)') {
	$sort_value = 'desc';
}
/*$sort_options[] = array(
	'value' => 'Sort By',
	'text' => ''
);

$sort_options[] = array(
	'value' => 'price_lowest_first',
	'text' => 'Price (lowest first)'
);

$sort_options[] = array(
	'value' => 'price_lowest_first',
	'text' => 'Price (highest first)'
);*/
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

$posts_per_page = 15;

$tax_query[] = array(
	'taxonomy' => 'product_cat',
	'field'    => 'slug',
	'terms'    => array( 'approved-motorcycles')
);

if($sort_by != 'Sort By') {
	$args_wp = array(
		'post_type' => 'product',
		'posts_per_page' => $posts_per_page,
		'paged' => $paged,
		'tax_query' => $tax_query,
		'orderby' => 'meta_value_num',
		'meta_key' => '_price',
		'order' => $sort_value
	);
} else {
	$args_wp = array(
		'post_type' => 'product',
		'posts_per_page' => $posts_per_page,
		'paged' => $paged,
		'tax_query' => $tax_query,
	);
}

$wp_query_bikes = new WP_Query($args_wp);


$post_count = $wp_query_bikes->post_count;
$found_posts = $wp_query_bikes->found_posts;
$max_num_pages = $wp_query_bikes->max_num_pages;


if($max_num_pages == 1) {
	$showing = 'Showing all '.$found_posts.' results';
} else {
	$showing_post_end = ($posts_per_page * $paged) - ($posts_per_page - $post_count) ;
	$showing_post_start =($posts_per_page * $paged) - ($posts_per_page - 1);
	$showing = 'Showing '.$showing_post_start.'–'.$showing_post_end.' of '.$found_posts.' results';
}
?>
<main class="news careers accessories-banner product-grid-wrap woocommerce">
	<section class="sp-banner ex-bikes" >
		<img src="<?php the_post_thumbnail_url() ?>" alt="Banner Image">
		<div class="container">
			<div class="inner">
				<div class="title-con">
					<h2>
						<?php the_title() ?>
					</h2>
				</div>
			</div>
		</div>
		<div class="intro-text">
			<div class="container">
				<p>
					<?php the_content(); ?>
				</p>
			</div>
		</div>
	</section>

	<section class="mid-section ex-display-bikes">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div id="primary" class="row-fluid">
						<div id="content" role="main" class="span8 offset2 Ex-Display Bikes">
							<article class="post">
								<div class="the-content">
									<div class="woocommerce columns-4 "><div class="woocommerce-notices-wrapper"></div>
									<p class="woocommerce-result-count">
										<?= $showing ?>
									</p>

									<form class="ex-display-order" method="get" id="ex-display-order">
										<select name="ex-display-orderby" class="orderby form-control" aria-label="Shop order">
											<?= $the_sort_option ?>
										</select>
									</form>
									<ul class="products columns-4">
										<?php while ($wp_query_bikes->have_posts()) { ?>
											<?php $wp_query_bikes->the_post(); ?>
											<?php 
											$price = get_post_meta( get_the_ID(), '_price', true );
											$pre_reg_tag = carbon_get_the_post_meta('pre_reg_tag');
											$registration_year = carbon_get_the_post_meta('registration_year');
											$mileage = carbon_get_the_post_meta('mileage');
											$model = carbon_get_the_post_meta('model');
											$registration_number = carbon_get_the_post_meta('registration_number');
											$series_number = carbon_get_the_post_meta('series_number');
											$warranty_term = carbon_get_the_post_meta('warranty_term');

											?>
											<li class="product">
												<div class="inner-div">
													<?php if($pre_reg_tag || $registration_year ) {?>
														<div class="tag-list">
															<?php if($pre_reg_tag) { ?>
																<span class="pre-tag">
																	EX-DEMO/PRE-REG
																</span>
															<?php } ?>
														<!-- <?php if($registration_year) { ?>
															<span class="year">
																<?= $registration_year ?>
															</span>
															<?php } ?> -->
														</div>
													<?php } ?>
													<div class="owl-carousel ex-bike-display-owl">
														<div class="item">
															<div class="inner img cvr ctr" style="background-image: url(<?php the_post_thumbnail_url('medium') ?>)">
															</div>
														</div>
														<?php 
														$product = new WC_product(get_the_ID());
														$attachment_ids = $product->get_gallery_image_ids();
														?>

														<?php foreach( $attachment_ids as $attachment_id ) { ?>
															<?php $image_link = wp_get_attachment_image_url( $attachment_id , 'medium'); ?>
															<div class="item">
																<div class="inner img cvr ctr" style="background-image: url(<?= $image_link ?>)">
																</div>
															</div>

														<?php } ?>
													</div>


													<a href="<?php the_permalink() ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
														<h2 class="woocommerce-loop-product__title">
															<?php the_title() ?>
														</h2>
													<!-- <?php  if($mileage) { ?>
														<span class="mileage">
															<?= $mileage ?>
														</span>
														<?php } ?> -->
												<!-- 	<span class="price" disabled="disabled">
														<?= wc_price( $price ) ?>
													</span> -->

												</a>
												<a href="<?php the_permalink() ?>" class="tinvwl_add_to_wishlist_button tinvwl-icon-heart  tinvwl-position-after tinvwl-product-in-list">
													<span class="tinvwl_add_to_wishlist-text">More Details</span>
												</a>
												<div class="row features">
													<?php if($model) { ?>
														<div class="col-sm-6 the-feature mh">
															<div class="inner" title="Model">
																<i class="fas fa-motorcycle"></i>
																<span> <?= $model ?> </span>
															</div>
														</div>
													<?php } ?>

													<?php if($price) { ?>
														<div class="col-sm-6 the-feature mh">
															<div class="inner" title="Price">
																<i class="fas fa-tag"></i>
																<span> <?= wc_price( $price ) ?> </span>
															</div>
														</div>
													<?php } ?>
													<?php if($mileage) { ?>
														<div class="col-sm-6 the-feature mh">
															<div class="inner" title="Mileage">
																<i class="fas fa-road"></i>
																<span> <?= $mileage ?> </span>
															</div>
														</div>
													<?php } ?>
													
													<?php if($registration_year) { ?>
														<div class="col-sm-6 the-feature mh">
															<div class="inner" title="Registration year">
																<i class="fas fa-calendar"></i>
																<span> <?= $registration_year  ?> </span>
															</div>
														</div>
													<?php } ?>
													
													<?php if($registration_number) { ?>
														<div class="col-sm-6 the-feature mh">
															<div class="inner" title="Registration number">
																<i class="far fa-registered"></i>
																<span> <?=  $registration_number  ?> </span>
															</div>
														</div>
													<?php } ?>
													
													<?php if($series_number) { ?>
														<div class="col-sm-6 the-feature mh">
															<div class="inner" title="Series number">
																<i class="fas fa-hashtag"></i>
																<span> <?=  $series_number  ?> </span>
															</div>
														</div>
													<?php } ?>
													<?php if($warranty_term) { ?>
														<div class="col-sm-6 the-feature mh">
															<div class="inner" title="Warranty term">
																<i class="fas fa-shield-alt with-check"></i>
																<span> <?= $warranty_term ?> </span>
															</div>
														</div>
													<?php } ?>
													<div class="col-sm-6 the-feature mh">
														<div class="inner" title="Finance available">
															<i class="finance"><img src="<?php _e(get_site_url()) ?>/wp-content/uploads/2020/09/finance3.png"></i>
															<span> Low rate finance available </span>
														</div>
													</div>
													
												</div>
											</div>



										</li>
									<?php } ?>

								</ul>
								<!-- 	<div class="back-to thank-you" style="text-align: center;"><a class="btn" href="https://www.ccm-motorcycles.com/offers/">Back to Offers</a></div></div>      -->       							
							</div><!-- the-content -->
						</article>
					</div><!-- #content .site-content -->
				</div><!-- #primary .content-area -->
			</div>
		</div>
		<?php 		
		echo '<div class="col-md-12 pagination_link"><div class="pagination">';
			$big = 999999999; // need an unlikely integer
			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query_bikes->max_num_pages
			) );
			echo '</div></div>' ?>

		</div>
	</section>
</main>


<?php get_footer(); ?>
