<?php

/**
 *  Template Name: -Template : Page Delear Locator
 *  Template Post Type: page
 *
 *
 */
?>
<?php get_header(); ?>
<?php
$background = carbon_get_the_post_meta('background');
$background = 17248;
?>
<main id="page-components" class="main-holder main-holder-v2  bt-5">
    <section class="hero-banner-with-breadcrumbs hero-banner-with-breadcrumbs-small d-flex align-items-end ">
        <div class="video-holder">
            <img alt="banner" data-src="<?= wp_get_attachment_image_url($background, 'full') ?>" class=" ls-is-cached lazyloaded" src="<?= wp_get_attachment_image_url($background, 'full') ?>">
        </div>
        <div class="container-fluid container-fluid-wide content">
            <?= breadcrumbs() ?>
            <div class="inner d-flex justify-content-between align-items-end">
                <div class="heading-box">
                    <h1>
                        <?= $alt_title ? $alt_title : get_the_title() ?>
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="wysiwyg-v2" id="section-17272-wysiwyg_1">
        <div class="container">
            <div class="inner content-margin">
                <?php while (have_posts()) {
                    the_post();
                ?>
                    <?php the_content() ?>
                <?php } ?>
            </div>
        </div>
    </section>
    <div id="store-locator-holder">
        <div class="container">
            <?= do_shortcode('[wpsl]') ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>