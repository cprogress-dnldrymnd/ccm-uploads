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
        <div class="container">
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
        slidesPerView: 1,
        loop: false,
    });
</script>