<?php
/**
    *   Template Name: PRODUCT EXPORT
*
    *   This page template has a sidebar built into it,
    *   and can be used as a home page, in which case the title will not show up.
*
*/
get_header();
?>


<main class="expot">
	<section class="" style="background-image: url(<?php the_post_thumbnail_url() ?>)">
		<?php
		
		$tax_query[] = array(
			'taxonomy' => 'product_cat',
			'field'    => 'slug',
			'terms'    => array( 'ex-display-bikes', 'services'),
			'operator'  => 'NOT IN'
		);
		$args = array(
			'post_type' => 'product',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'tax_query' => $tax_query,
		);

		$wp_query = new WP_Query($args);



		while ($wp_query->have_posts()) {
			$wp_query->the_post(); 


			$compatibility =  get_field('ccm_product_bike_com');


			fputcsv($file, array(get_the_title(), get_the_permalink(), implode(",", $cats), implode(",", $tags)));
			
		} 
		exit();

		?>

	</section>

</main>


<?php get_footer(); ?>
