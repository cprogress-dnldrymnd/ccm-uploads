<?php
$items = $page_component['item'];
?>


<section class="two-column-carousel">
    <div class="container">
        <div class="inner">
            <!-- Swiper -->
            <div class="swiper-container mySwiper">
                <div class="swiper-wrapper">
                    <?php foreach ($items as $item) { ?>
                        <div class="swiper-slide">
                            <div class="row gy-4">
                                <div class="col-lg-7">
                                    <div class="image-box">
                                        <img src="<?= wp_get_attachment_image_url($item['image'], 'large') ?>">
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <?php if ($item['heading']) { ?>
                                        <div class="heading-box">
                                            <h2><?= $item['heading'] ?></h2>
                                        </div>
                                    <?php } ?>
                                    <?php if ($item['description']) { ?>
                                        <div class="description-box">
                                            <?= wpautop($item['description']) ?>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
                <div class="navigation-holder">
                    <div class="swiper-button-prev-custom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                        </svg>
                    </div>
                    <div class="swiper-button-next-custom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                        </svg>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>