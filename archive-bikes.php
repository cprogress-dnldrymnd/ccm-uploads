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
                            <div class="btn-box col-auto">
                                <a href="<?= $link ?>" class="pc-btn">
                                    PERSONALISE YOUR RIDE
                                </a>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
            <div class="swiper-pagination"></div>
            <div class="row row-nav justify-content-center">
                <div class="col-auto">
                    <div class="swiper-button-prev-custom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                        </svg>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="swiper-button-next-custom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                        </svg>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="bike-lists-menu bike-lists-menu-page d-none">
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
        navigation: {
            nextEl: ".swiper-button-next-custom",
            prevEl: ".swiper-button-prev-custom",
        },
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