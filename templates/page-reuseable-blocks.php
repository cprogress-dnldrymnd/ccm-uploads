<?php

/**
 *  Template Name: -Template : Page Reusable Blocks
 *  Template Post Type: page, bikes
 *
 *  This page template has a sidebar built into it, 
 *  and can be used as a home page, in which case the title will not show up.
 *
 */

$footer_type = carbon_get_the_post_meta('footer_type');
$header_type = carbon_get_the_post_meta('header_type');

?>
<?php get_header('v2'); ?>
<main id="page-components" class="page-components reusable-blocks <?= $class ?> <?= $main_class ?>">

    <section class="hero-banner-with-breadcrumbs">
        <div class="container">
            <?= breadcrumbs() ?>
        </div>
    </section>

</main>
<?php get_footer($footer_type); ?>