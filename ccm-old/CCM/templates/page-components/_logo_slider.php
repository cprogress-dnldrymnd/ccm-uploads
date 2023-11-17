<?php
$logo_slider = $page_component['logo_slider'];
$heading = $page_component['heading'];

?>
<section class="logo-slider">
    <div class="container <?= $container_width ?>">
        <?= get_heading($heading, 'semibold medium') ?>
        <div class="logo-slider-box md-padding">
            <div class="swiper mySwiper-logoSwiper">
                <div class="swiper-wrapper text-center align-items-center">
                    <?php foreach ($logo_slider as $logo) { ?>
                        <div class="swiper-slide">
                            <div class="image-box">
                                <img src="<?= wp_get_attachment_image_url($logo, 'medium') ?>">
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    jQuery(document).ready(function () {
        var logoSwiper = new Swiper(".mySwiper-logoSwiper", {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false
            },
            breakpoints: {
                0: {
                    slidesPerView: 2,
                },

                360: {
                    slidesPerView: 3,
                },

                576: {
                    slidesPerView: 4,
                },

                768: {
                    slidesPerView: 5,
                },


                992: {
                    slidesPerView: 6,
                },


                1200: {
                    slidesPerView: 7,
                },


            },

        });
    });

</script>