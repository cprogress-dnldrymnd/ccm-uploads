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
?>
<?php get_header(); ?>
<main id="page-components" class="page-components reusable-blocks <?= $class ?> <?= $main_class ?>">
    <section class="hero-banner-with-breadcrumbs">
        <div class="video-holder">
            <iframe frameborder="0" height="100%" width="100%" src="https://www.youtube.com/embed/<?= $embed_id ?>?autoplay=1&mute=1&controls=0&showinfo=0&autohide=1&loop=1&rel=0&playlist=q6CEBGW4szM">
            </iframe>
        </div>
        <div class="container">
            <?= breadcrumbs() ?>
        </div>
    </section>
</main>
<?php get_footer($footer_type); ?>