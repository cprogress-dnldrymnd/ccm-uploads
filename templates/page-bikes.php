<?php

/**
 *  Template Name: -Template : Page Bikes
 *  Template Post Type: page
 *
 *
 */
?>
<?php get_header(); ?>
<?php
$bikes = carbon_get_the_post_meta('bikes');
?>
<main id="page-components" class="main-holder main-holder-v2  bt-5">
    <section class="slider-hero">
        <h1 class="slider-title"><?php the_title() ?></h1>
        <div class="swiper-container mySwiper">
            <div class="swiper-wrapper">
                <?php foreach ($bikes as $bike) { ?>
                    <?php
                    $title = get_the_title($bike['id']);
                    $link = get_permalink($bike['id']);
                    $bike_tagline = carbon_get_post_meta($bike['id'], 'bike_tagline');
                    $bike_slider_image_bike_page = carbon_get_post_meta($bike['id'], 'bike_slider_image_bike_page');
                    $bike_slider_image = carbon_get_post_meta($bike['id'], 'bike_slider_image');
                    $tagline = carbon_get_post_meta($bike['id'], 'tagline');
                    $bike_image = $bike_slider_image_bike_page ? $bike_slider_image_bike_page : $bike_slider_image;
                    $bike_image_url = wp_get_attachment_image_url($bike_image, 'large');
                    ?>
                    <div class="swiper-slide bike-<?= $key ?>">
                        <div class="image-box">
                            <img class="no-lazyload" src="<?= $bike_image_url ?>" alt="<?= $title ?>">
                        </div>
                        <div class="content-holder text-center" data-swiper-parallax="-50%">
                            <div class="heading-box">
                                <h2>
                                    <?= get_the_title($bike['id']) ?>
                                </h2>
                            </div>

                            <?php if ($bike_tagline) { ?>
                                <div class="description-box">
                                    <p>
                                        <?= $bike_tagline ?>
                                    </p>
                                </div>
                            <?php } ?>
                            <div class="button-group-box row justify-content-center align-items-center">
                                <?php if ($configure_url) { ?>
                                    <div class="btn-box col-auto">
                                        <a href="<?= $link ?>" class="pc-btn">
                                            CCONFIGURE
                                        </a>
                                    </div>
                                <?php } ?>
                                <div class="btn-box col-auto">
                                    <a href="<?= $link ?>" class="pc-btn">
                                        DISCOVER
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <section class="bike-lists-menu bike-lists-menu-page">
        <div class="container bike-lists-holder">
            <div class="row g-0 bikes">
                <?php foreach ($bikes as $key => $bike) { ?>
                    <?php
                    $title = get_the_title($bike['id']);
                    $link = get_permalink($bike['id']);
                    $bike_tagline = carbon_get_post_meta($bike['id'], 'bike_tagline');
                    $bike_slider_image_bike_page = carbon_get_post_meta($bike['id'], 'bike_slider_image_bike_page');
                    $bike_slider_image = carbon_get_post_meta($bike['id'], 'bike_slider_image');
                    $tagline = carbon_get_post_meta($bike['id'], 'tagline');
                    $bike_image = $bike_slider_image_bike_page ? $bike_slider_image_bike_page : $bike_slider_image;
                    $bike_image_url = wp_get_attachment_image_url($bike_image, 'large');
                    ?>
                    <div class="col-lg-4">
                        <div class="column-holder text-center bike-<?= $key ?>">
                            <a href="<?= $link ?>">
                                <div class="bike-name">
                                    <h4><?= $title ?></h4>
                                </div>
                                <div class="image-box">
                                    <img src="<?= $bike_image_url ?>" alt="<?= $title ?>">
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>


</main>
<?php get_footer(); ?>

<script>
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        centeredSlides: true,
        parallax: true,
        pagination: {
            el: '.swiper-pagination',
            type: 'fraction',
            formatFractionCurrent: function (number) {
                return '0' + number;
            }
        },
        breakpoints: {

            0: {
                slidesPerView: 1,
                spaceBetween: 10
            },

            481: {
                slidesPerView: 1,
                spaceBetween: 20,
            },

            768: {
                slidesPerView: 2,
                spaceBetween: 30,
            },


            992: {
                slidesPerView: 2,
                spaceBetween: 40,
            },

            1024: {
                slidesPerView: 2,
                spaceBetween: 50,
            },

        }
    });
</script>