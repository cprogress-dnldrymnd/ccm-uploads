<?php

/**
 *  Template Name: -Template : Bike Template
 *  Template Post Type: bikes
 *
 *  This page template has a sidebar built into it, 
 *  and can be used as a home page, in which case the title will not show up.
 *
 */

$version = carbon_get_the_post_meta('template_style');
?>
<?php get_header(); ?>
<?php
$background_type = carbon_get_the_post_meta('background_type');
$background = carbon_get_the_post_meta('background');
$embed_id = carbon_get_the_post_meta('embed_id');
$mime_type = get_post_mime_type($background);
$configure_url = carbon_get_the_post_meta('configure_url');

?>
<main id="page-components" class="main-holder bt-5">
    <section class="hero-banner-with-breadcrumbs d-flex align-items-end ">
        <div class="video-holder">
            <?php if ($background_type == 'embed') { ?>
                <iframe class="<?= $background ? 'desktop-only' : '' ?>" frameborder="0" height="100%" width="100%" src="https://www.youtube.com/embed/<?= $embed_id ?>?autoplay=1&mute=1&controls=0&showinfo=0&autohide=1&loop=1&rel=0&playlist=<?= $embed_id ?>">
                </iframe>
                <?php if ($background) { ?>
                    <?php if (strpos($mime_type, 'video') !== false) { ?>
                        <video id="video" autoplay muted loop playsinline class="mobile-only" preload="metadata" src="<?= wp_get_attachment_url($background) ?>">
                        </video>
                    <?php } else { ?>
                        <img alt="banner" data-src="<?= wp_get_attachment_image_url($background, 'full') ?>" class=" ls-is-cached lazyloaded" src="<?= wp_get_attachment_image_url($background, 'full') ?>">
                    <?php } ?>
                <?php } ?>
            <?php } else { ?>
                <?php if (strpos($mime_type, 'video') !== false) { ?>
                    <video id="video" autoplay muted loop playsinline preload="metadata" src="<?= wp_get_attachment_url($background) ?>">
                    </video>
                <?php } else { ?>
                    <img alt="banner" data-src="<?= wp_get_attachment_image_url($background, 'full') ?>" class=" ls-is-cached lazyloaded" src="<?= wp_get_attachment_image_url($background, 'full') ?>">
                <?php } ?>
            <?php } ?>

        </div>
        <div class="container-fluid container-fluid-wide content">
            <?= breadcrumbs() ?>
            <div class="inner d-flex justify-content-between align-items-end">
                <div class="heading-box">
                    <h1>
                        <?php the_title() ?>
                    </h1>
                </div>
                <div class="next-section">
                    <a href="#overview" class="d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="bike-navigation <?= $version == 'v2' ? 'v2' : 'v1' ?>">
        <div class="inner">
            <div class="container-fluid container-fluid-wide">
                <div class="row align-items-center">
                    <div class="col-auto col-xl-4">
                        <div class="bike-title">
                            <span><?php the_title() ?></span>
                        </div>
                    </div>
                    <div class="col-auto col-bike-nav col-xl-4">
                        <div class="bike-nav">
                            <ul class="list-inline text-center">
                                <li>
                                    <a href="#overview">OVERVIEW</a>
                                </li>
                                <li>
                                    <a href="#features">FEATURES</a>
                                </li>
                                <li>
                                    <a href="#bike-specification">SPECIFICATION</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto col-xl-4">
                        <div class="bike-buttons">
                            <div class="row justify-content-end">
                                <?php if ($configure_url) { ?>
                                    <div class="col-auto">
                                        <div class="btn-box btn-bordered">
                                            <a class="pc-btn" href="<?= $configure_url ?>" data-target="#enquire-now">
                                                CONFIGURE
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="col-auto">
                                    <div class="btn-box">
                                        <a class="pc-btn" href="#enquire-now" data-target="#enquire-now">
                                            ENQUIRE NOW
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    $overview_heading = carbon_get_the_post_meta('overview_heading');
    $overview_description = carbon_get_the_post_meta('overview_description');
    $overview_image = carbon_get_the_post_meta('overview_image');
    $overview_image_url = wp_get_attachment_image_url($overview_image, 'full');
    ?>
    <section class="overview <?= $version == 'v2' ? 'v2' : 'v1' ?>" id="overview">
        <?php if ($version == 'v2' && $overview_image_url) { ?>
            <div class="bg-holder" style="background-image: url(<?= $overview_image_url ?>)">
            </div>
        <?php } ?>
        <div class="container">
            <div class="inner">
                <?php if ($version == 'v2') { ?>
                    <?php if ($overview_heading) { ?>
                        <div class="heading-box text-center">
                            <h2><?= $overview_heading ?></h2>
                        </div>
                    <?php } ?>
                    <?php if ($overview_description) { ?>
                        <div class="row">
                            <div class="col-lg-6">

                            </div>
                            <div class="col-lg-6">
                                <div class="description-box">
                                    <?= wpautop($overview_description) ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <?php if ($overview_heading) { ?>
                        <div class="heading-box text-center">
                            <h2><?= $overview_heading ?></h2>
                        </div>
                    <?php } ?>
                    <?php if ($overview_description) { ?>
                        <div class="description-box">
                            <?= wpautop($overview_description) ?>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </section>

    <?php if ($version != 'v2') { ?>
        <section class="image-section">
            <div class="container">
                <div class="image-box">
                    <img src="<?= $overview_image_url ?>">
                </div>
            </div>
        </section>
    <?php } ?>
    <?php
    $features = carbon_get_the_post_meta('features');
    $feature_image = carbon_get_the_post_meta('feature_image');
    $feature_image_url = wp_get_attachment_image_url($feature_image, 'full');
    ?>
    <?php if ($features) { ?>
        <section class="features <?= $version == 'v2' ? 'v2' : 'v1' ?>" id="features">
            <div class="inner">
                <div class="container">
                    <div class="row align-items-center gy-3">
                        <div class="col-lg-4">
                            <div class="feature-box">
                                <?php foreach ($features as $feature) { ?>
                                    <div class="feature-item">
                                        <div class="heading-box">
                                            <h5><?= $feature['heading'] ?></h5>
                                        </div>
                                        <div class="description-box">
                                            <?= wpautop($feature['description']) ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="image-box text-center text-lg-right">
                                <img src="<?= $feature_image_url ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <?php
    $gallery = carbon_get_the_post_meta('gallery');
    ?>
    <?php if ($gallery) { ?>
        <section class="bike-scroller">
            <div class="inner">
                <div class="images">
                    <div class="swiper mySwiper">
                        <?php foreach ($gallery as $key => $image) { ?>
                            <div class="image" id="image-<?= $key ?>">
                                <img src="<?= wp_get_attachment_image_url($image, 'full') ?>" class="no-lazyload">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="scroll-offset"></div>
        </section>


        <section class="bike-scroller-swiper">
            <div class="inner">
                <div class="swiper mySwiperBikeScroller">
                    <div class="swiper-wrapper">
                        <?php foreach ($gallery as $key => $image) { ?>
                            <div class="swiper-slide" id="image-<?= $key ?>">
                                <img src="<?= wp_get_attachment_image_url($image, 'full') ?>" class="no-lazyload">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="scroll-offset"></div>
        </section>
    <?php } ?>
    <?php
    $specifications = carbon_get_the_post_meta('specifications');
    ?>
    <section class="bike-specification" id="bike-specification">
        <div class="container">
            <div class="specs-holder">
                <?php foreach ($specifications as $specs) { ?>
                    <?php $specification = $specs['specification']; ?>
                    <div class="specs-box">
                        <div class="specs-heading">
                            <h3>
                                <?= $specs['navigation'] ?>
                            </h3>
                            <span class="icon"></span>
                        </div>
                        <div class="specs-list">
                            <div class="row g-5">
                                <?php foreach ($specification as $spec) { ?>
                                    <div class="col-6">
                                        <div class="specs-name">
                                            <strong><?= $spec['specs_label'] ?></strong>
                                        </div>
                                        <div class="specs-val">
                                            <span><?= $spec['specs_value'] ?></span>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php
    $fullwidth_image = carbon_get_the_post_meta('fullwidth_image');
    $fullwidth_image_url = wp_get_attachment_image_url($fullwidth_image, 'full');
    ?>
    <?php if ($fullwidth_image_url) { ?>
        <section class="image-section">
            <div class="image-box">
                <img src="<?= $fullwidth_image_url ?>">
            </div>
        </section>
    <?php } ?>
    <?php
    $contact_form = carbon_get_the_post_meta('contact_form');
    ?>
    <section class="overview contact-form-holder <?= $version == 'v2' ? 'v2' : 'v1' ?>" id="enquire-now">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="inner">
                        <div class="heading-box">
                            <h2>REGISTER YOUR INTEREST</h2>
                        </div>
                        <div class="description-box">
                            <p>
                                Please fill in your details and one of our team members will contact you within 48
                                hours.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <?= $contact_form ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="footer-buttons">
        <div class="row g-0">
            <?php if ($configure_url) { ?>
                <div class="col-6">
                    <a href="<?= $configure_url ?>" class="light-blue">
                        <span>CONFIGURE A BIKE</span>
                        <span class="icon"></span>
                    </a>
                </div>
            <?php } ?>

            <div class="col-6">
                <a href="/book-ccm-test-ride/" class="light-gray">
                    <span>BOOK A TEST RIDE</span>
                    <span class="icon"></span>
                </a>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
<script>
    var swiper = new Swiper(".mySwiperBikeScroller", {
        slidesPerView: 2,
        spaceBetween: 30,
        mousewheel: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>