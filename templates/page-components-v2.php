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
    <?php if (is_page(17267)) { ?>
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
                <div class="inner">
                    <div class="row g-5">
                        <div class="col-lg-8">
                            <div class="image-box">
                                <img src="https://ccm.theprogressteam.com/wp-content/uploads/2020/11/ccm-insurance.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 content-margin">
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
                                <a href="#" class="pc-btn">CALL TO ACTION</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="two-columns-8-4">
            <div class="container">
                <div class="inner">
                    <div class="row g-5 row-reverse">
                        <div class="col-lg-8">
                            <div class="image-box">
                                <img src="https://ccm.theprogressteam.com/wp-content/uploads/2020/11/ccm-insurance.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 content-margin">
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
                                <a href="#" class="pc-btn">CALL TO ACTION</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="background-section" style="background-image: url(https://ccm.theprogressteam.com/wp-content/uploads/2020/11/maverick-1.png)">
            <div class="container">
                <div class="inner text-center content-margin">
                    <div class="heading-box">
                        <h2 class="mt-0">
                            LOREM IPSUM DOLOR SIT
                        </h2>
                    </div>
                    <div class="description-box">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam magna lorem, ultricies eget pretium et, suscipit tincidunt libero. Quisque vehicula volutpat diam. Morbi magna sem, viverra non euismod at, elementum in nisl.
                        </p>
                    </div>
                    <div class="btn-box">
                        <a class="pc-btn" href="<?= $configure_url ?>" data-target="#enquire-now">
                            GET A QUOTE
                        </a>
                    </div>
                </div>
            </div>
        </section>
    <?php } else { ?>
        <section class="two-column-carousel">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="image-box">
                                <img src="https://ccm.theprogressteam.com/wp-content/uploads/2020/11/ccm-service.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <!-- Swiper -->
                            <div class="swiper-container mySwiper swiper-slider-style-one">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="item">
                                            <div class="background-box" style="background-image: url(https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/Backgrounds.png)">
                                                <div class="content-holder">
                                                    <div class="inner">
                                                        <div class="heading-box">
                                                            <h3>
                                                                Spitfire <br> Six
                                                            </h3>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="image-box" data-swiper-parallax="-50%">
                                                <img class="no-lazyload" src="https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/six-shadow-2-e1637575702218.png" alt="Spirfire Six">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="item">
                                            <div class="background-box" style="background-image: url(https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/mav2.jpg)">
                                                <div class="content-holder">
                                                    <div class="inner">
                                                        <div class="heading-box">
                                                            <h3>
                                                                Spitfire <br> Maverick
                                                            </h3>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="image-box" data-swiper-parallax="-50%">
                                                <img class="no-lazyload" src="https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/maverick-Cutout.png" alt="Spirtfire Maverick">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="item">
                                            <div class="background-box" style="background-image: url(https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/moto-bg.jpg)">
                                                <div class="content-holder">
                                                    <div class="inner">
                                                        <div class="heading-box">
                                                            <h3>
                                                                Street <br> Moto
                                                            </h3>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="image-box" data-swiper-parallax="-50%">
                                                <img class="no-lazyload" src="https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/Moto-New.png" alt="Street Moto">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="item">
                                            <div class="background-box" style="background-image: url(https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/tracker-bg.jpg)">
                                                <div class="content-holder">
                                                    <div class="inner">
                                                        <div class="heading-box">
                                                            <h3>
                                                                Street <br> Tracker
                                                            </h3>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="image-box" data-swiper-parallax="-50%">
                                                <img class="no-lazyload" src="https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/Tracker-New2.png" alt="Street Tracker">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
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