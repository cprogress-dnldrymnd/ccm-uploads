<?php
/**
 *  Template Name: -Template : Page Components V2
 *  Template Post Type: page
 *
 *
*/

$button_text = carbon_get_the_post_meta('stickty_button_text');
$button_link = carbon_get_the_post_meta('sticky_button_link');
$custom_css = carbon_get_the_post_meta('custom_css');
?>
<?php get_header(); ?>
<main id="page-components" class="page-components page-components-2 <?= $class ?> <?= $main_class ?>">
    <?php
    page_components_v2();
    ?>
</main>
<?php get_footer($footer_type); ?>