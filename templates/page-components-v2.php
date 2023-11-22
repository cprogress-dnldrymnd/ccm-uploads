<?php

/**
 *  Template Name: -Template : Page Components V2
 *  Template Post Type: page
 *
 *
 */
?>
<?php get_header(); ?>
<main id="page-components" class="main-holder  bt-5">
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
    <?php
    page_components_v2();
    ?>
</main>
<?php get_footer($footer_type); ?>