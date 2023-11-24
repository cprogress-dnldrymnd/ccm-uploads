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
                    $tagline = carbon_get_post_meta($bike['id'], 'tagline');
                    ?>
                    <div class="swiper-slide">
                        <div class="image-box">
                            <img class="no-lazyload" src="https://ccm.theprogressteam.com/wp-content/uploads/2020/11/Maverick_Black_Transparent-_Shadow.png" alt="">
                        </div>
                        <div class="content-holder text-center">
                            <div class="heading-box">
                                <h2>
                                    <?= get_the_title($bike['id']) ?>
                                </h2>
                            </div>
                            <div class="description-box">
                                <p>
                                    Motorcycle tag line.
                                </p>
                            </div>
                            <div class="btn-box">
                                <a href="<?= get_permalink($bike['ID']) ?>" class="pc-btn">
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