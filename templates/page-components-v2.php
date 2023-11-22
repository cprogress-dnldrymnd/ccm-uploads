<?php

/**
 *  Template Name: -Template : Page Components V2
 *  Template Post Type: page
 *
 *
 */
?>
<?php get_header(); ?>
<?php
$background = carbon_get_the_post_meta('background');
$alt_title = carbon_get_the_post_meta('alt_title');
?>
<main id="page-components" class="main-holder  bt-5">
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
    <section class="wysiwyg-v2">
        <div class="container">
            <div class="inner text-center content-margin">
                <h2>
                    NOT YOUR TYPICAL MOTORCYCLE INSURANCE
                </h2>
                <p>
                    CCM Motorcycles have teamed up with two of the greatest names in motorcycling to bring you the very best solutions to insure your CCM! We ensure that they understand your CCM model meaning no more long pauses as you explain what a Spitfire is!
                </p>
                <div class="btn-box">
                    <a class="pc-btn" href="<?= $configure_url ?>" data-target="#enquire-now">
                        GET A QUOTE
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="two-columns-8-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="image-box">
                        <img src="" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="heading-box">
                        <h3>
                            HEADING THREE
                        </h3>
                    </div>
                    <div class="description-box">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam magna lorem, ultricies eget pretium et, suscipit tincidunt libero.
                        </p>
                    </div>
                    <div class="btn-box btn-bordered">
                        <a href="#">CALL TO ACTION</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="footer-buttons">
        <div class="row g-0">
            <div class="col-6">
                <a href="#" class="light-blue">
                    <span>CONFIGURE A BIKE</span>
                    <span class="icon"></span>
                </a>
            </div>

            <div class="col-6">
                <a href="/book-ccm-test-ride/" class="light-gray">
                    <span>BOOK A TEST RIDE</span>
                    <span class="icon"></span>
                </a>
            </div>
        </div>
    </section>
    <?php
    page_components_v2();
    ?>
</main>
<?php get_footer($footer_type); ?>