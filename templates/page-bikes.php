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
                    <div class="swiper-slide">
                        <div class="image-box" data-swiper-parallax="-5%">
                            <img class="no-lazyload" src="<?= $bike_image_url ?>" alt="<?= $title ?>">
                        </div>
                        <div class="content-holder text-center">
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
                            <div class="btn-box">
                                <a href="<?= $link ?>" class="pc-btn">
                                    DISCOVER
                                </a>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
    </section>
    <?php while (have_posts()) {
        the_post();
    }
    ?>

</main>
<?php get_footer(); ?>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 2,
        loop: true,
        centeredSlides: true,
        parallax: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            type: 'bullets',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {

            0: {
                slidesPerView: 1,
                spaceBetween: 10
            },

            481: {
                slidesPerView: 2,
                spaceBetween: 20,
            },

            768: {
                spaceBetween: 30,
            },


            992: {
                spaceBetween: 40,
            },

            1024: {
                spaceBetween: 50,
            },


        }
    });
</script>