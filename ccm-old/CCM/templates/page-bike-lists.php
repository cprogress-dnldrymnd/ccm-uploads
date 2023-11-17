<?php
/**
 *   Template Name: Bike Lists
 *
 *   This page template has a sidebar built into it,
 *   and can be used as a home page, in which case the title will not show up.
 *
 */
get_header();
$bikes_categ = carbon_get_the_post_meta('motorcycles');
	?>
<main>
	<?= do_shortcode('[bike_lists]') ?>
</main>

<?php get_footer(); ?>