<?php

/**
 *  Template Name: -Template : Page Reusable Blocks
 *  Template Post Type: page, bikes
 *
 *  This page template has a sidebar built into it, 
 *  and can be used as a home page, in which case the title will not show up.
 *
 */

$footer_type = carbon_get_the_post_meta('footer_type');
?>
<?php get_header(); ?>
<main id="page-components" class="page-components reusable-blocks bt-5 <?= $class ?> <?= $main_class ?>">
    <section class="hero-banner-with-breadcrumbs d-flex align-items-end">
        <div class="video-holder">
            <iframe frameborder="0" height="100%" width="100%" src="https://www.youtube.com/embed/<?= $embed_id ?>?autoplay=1&mute=1&controls=0&showinfo=0&autohide=1&loop=1&rel=0&playlist=q6CEBGW4szM">
            </iframe>
        </div>
        <div class="container-fluid container-fluid-wide content">
            <?= breadcrumbs() ?>
            <div class="heading-box">
                <h1>
                    <?php the_title() ?>
                </h1>
            </div>
        </div>
    </section>
    <section class="bike-navigation">
        <div class="container-fluid container-fluid-wide">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="bike-title">
                        <span><?php the_title() ?></span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bike-nav">
                        <ul class="list-inline text-center">
                            <li>
                                <a href="#">OVERVIEW</a>
                            </li>
                            <li>
                                <a href="#">FEATURES</a>
                            </li>
                            <li>
                                <a href="#">SPECIFICATION</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bike-buttons">
                        <div class="row justify-content-end">
                            <div class="col-auto">
                                <div class="btn-box btn-bordered">
                                    <a class="anchor-modal pc-btn" href="#enquire-now" data-target="#enquire-now" data-aos="fade-up" data-aos-duration="500">
                                    CONFIGURE
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="btn-box">
                                    <a class="anchor-modal pc-btn" href="#enquire-now" data-target="#enquire-now" data-aos="fade-up" data-aos-duration="500">
                                        ENQUIRE NOW
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer($footer_type); ?>