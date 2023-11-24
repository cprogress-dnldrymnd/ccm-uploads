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
$background = carbon_get_the_post_meta('background');
$alt_title = carbon_get_the_post_meta('alt_title');
?>
<main id="page-components" class="main-holder main-holder-v2  bt-5">
    <section class="slider-hero">
        <div class="swiper-container mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="image-box">
                        <img src="https://ccm.theprogressteam.com/wp-content/uploads/2020/11/Maverick_Black_Transparent-_Shadow.png" alt="">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="image-box">
                        <img src="https://ccm.theprogressteam.com/wp-content/uploads/2020/11/Maverick_Black_Transparent-_Shadow.png" alt="">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="image-box">
                        <img src="https://ccm.theprogressteam.com/wp-content/uploads/2020/11/Maverick_Black_Transparent-_Shadow.png" alt="">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="image-box">
                        <img src="https://ccm.theprogressteam.com/wp-content/uploads/2020/11/Maverick_Black_Transparent-_Shadow.png" alt="">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="image-box">
                        <img src="https://ccm.theprogressteam.com/wp-content/uploads/2020/11/Maverick_Black_Transparent-_Shadow.png" alt="">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="image-box">
                        <img src="https://ccm.theprogressteam.com/wp-content/uploads/2020/11/Maverick_Black_Transparent-_Shadow.png" alt="">
                    </div>
                </div>
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