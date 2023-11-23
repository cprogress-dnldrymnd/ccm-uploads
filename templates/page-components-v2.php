<?php

/**
 *  Template Name: -Template : Page Components V2
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
    <section class="hero-banner-with-breadcrumbs hero-banner-with-breadcrumbs-small d-flex align-items-end ">
        <div class="video-holder">
            <img alt="banner" data-src="<?= wp_get_attachment_image_url($background, 'full') ?>" class=" ls-is-cached lazyloaded" src="<?= wp_get_attachment_image_url($background, 'full') ?>">
        </div>
        <div class="container-fluid container-fluid-wide content">
            <?= breadcrumbs() ?>
            <div class="inner d-flex justify-content-between align-items-end">
                <div class="heading-box">
                    <h1>
                        <?= $alt_title ? $alt_title : get_the_title() ?>
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <?php while (have_posts()) {
        the_post();
        page_components_v2();
    }
    ?>
    <?php if (is_page(17267)) { ?>
     
    <?php } else { ?>
       
        <section class="wysiwyg-v2">
            <div class="container">
                <div class="inner content-margin">
                    <h2>
                        WYSIWYG SECTION H2
                    </h2>
                    <p>
                        The hand-made characteristics shine through, embodying the spirit of our founder, Alan Clews. Since the inception of CCM in 1970, Alan's vision of combining a <a href="">powerful engine</a> with a lightweight and robust frame remains at the heart of our design philosophy.
                    </p>
                    <h3>
                        WYSIWYG SECTION H3
                    </h3>
                    <p>
                        The hand-made characteristics shine through, embodying the spirit of our founder, Alan Clews. Since the inception of CCM in 1970, Alan's vision of combining a powerful engine with a lightweight and robust frame remains at the heart of our design philosophy.
                    </p>
                    <ul>
                        <li>List item one</li>
                        <li>List item two</li>
                        <li>List item three</li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="accordion-section">
            <div class="container">
                <div class="inner">
                    <div class="row gy-4">
                        <div class="col-lg-6">
                            <div class="inner">
                                <div class="heading-box">
                                    <h2>FREQUENTLY<br> ASKED QUESTIONS</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="accordion-holder">
                                <div class="accordion-item">
                                    <div class="accordion-heading">
                                        <h3>
                                            FREQUENTLY ASKED QUESTION
                                        </h3>
                                        <span class="icon"></span>
                                    </div>
                                    <div class="accordion-content">
                                        <div class="inner">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lobortis commodo diam, a aliquam ex posuere ac. Donec posuere tincidunt hendrerit. Aenean euismod, sapien in vestibulum posuere, metus massa viverra urna, id aliquam turpis magna at lorem. Nullam pharetra neque eu diam ornare ornare.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-heading">
                                        <h3>
                                            FREQUENTLY ASKED QUESTION
                                        </h3>
                                        <span class="icon"></span>
                                    </div>
                                    <div class="accordion-content">
                                        <div class="inner">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lobortis commodo diam, a aliquam ex posuere ac. Donec posuere tincidunt hendrerit. Aenean euismod, sapien in vestibulum posuere, metus massa viverra urna, id aliquam turpis magna at lorem. Nullam pharetra neque eu diam ornare ornare.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-heading">
                                        <h3>
                                            FREQUENTLY ASKED QUESTION
                                        </h3>
                                        <span class="icon"></span>
                                    </div>
                                    <div class="accordion-content">
                                        <div class="inner">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lobortis commodo diam, a aliquam ex posuere ac. Donec posuere tincidunt hendrerit. Aenean euismod, sapien in vestibulum posuere, metus massa viverra urna, id aliquam turpis magna at lorem. Nullam pharetra neque eu diam ornare ornare.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="overview contact-form-holder v2">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6">
                        <div class="inner">
                            <div class="heading-box">
                                <h2>BOOK A SERVICE</h2>
                            </div>
                            <div class="description-box">
                                <p>
                                    Please fill in your details and one of our team members will contact you within 48
                                    hours.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-form">
                            <script charset="utf-8" type="text/javascript" src="//js-eu1.hsforms.net/forms/embed/v2.js"></script>
                            <script>
                                hbspt.forms.create({
                                    region: "eu1",
                                    portalId: "139521183",
                                    formId: "c45f8060-df31-4ff7-bdf3-39a8a20823e1"
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
   
</main>
<?php get_footer(); ?>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next-custom',
            prevEl: '.swiper-button-prev-custom',
        },
    });
</script>