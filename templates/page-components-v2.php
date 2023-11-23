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
    <?php
    page_components_v2();
    ?>
    <?php if (is_page(17267)) { ?>
        <section class="two-columns-8-4">
            <div class="container">
                <div class="inner">
                    <div class="row g-5">
                        <div class="col-lg-8">
                            <div class="image-box">
                                <img src="https://ccm.theprogressteam.com/wp-content/uploads/2020/11/ccm-insurance.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 content-margin">
                            <div class="heading-box">
                                <h3>
                                    HEADING THREE
                                </h3>
                            </div>
                            <div class="description-box">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam magna lorem, ultricies eget pretium et, suscipit tincidunt libero.
                                </p>
                            </div>
                            <div class="btn-box btn-bordered">
                                <a href="#" class="pc-btn">CALL TO ACTION</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="two-columns-8-4">
            <div class="container">
                <div class="inner">
                    <div class="row g-5 row-reverse">
                        <div class="col-lg-8">
                            <div class="image-box">
                                <img src="https://ccm.theprogressteam.com/wp-content/uploads/2020/11/ccm-insurance.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 content-margin">
                            <div class="heading-box">
                                <h3>
                                    HEADING THREE
                                </h3>
                            </div>
                            <div class="description-box">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam magna lorem, ultricies eget pretium et, suscipit tincidunt libero.
                                </p>
                            </div>
                            <div class="btn-box btn-bordered">
                                <a href="#" class="pc-btn">CALL TO ACTION</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="background-section" style="background-image: url(https://ccm.theprogressteam.com/wp-content/uploads/2020/11/maverick-1.png)">
            <div class="container">
                <div class="inner text-center content-margin">
                    <div class="heading-box">
                        <h2 class="mt-0">
                            LOREM IPSUM DOLOR SIT
                        </h2>
                    </div>
                    <div class="description-box">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam magna lorem, ultricies eget pretium et, suscipit tincidunt libero. Quisque vehicula volutpat diam. Morbi magna sem, viverra non euismod at, elementum in nisl.
                        </p>
                    </div>
                    <div class="btn-box">
                        <a class="pc-btn" href="<?= $configure_url ?>" data-target="#enquire-now">
                            GET A QUOTE
                        </a>
                    </div>
                </div>
            </div>
        </section>
    <?php } else { ?>
        <section class="two-column-carousel">
            <div class="container">
                <div class="inner">
                    <!-- Swiper -->
                    <div class="swiper-container mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="row gy-4">
                                    <div class="col-lg-7">
                                        <div class="image-box">
                                            <img src="https://ccm.theprogressteam.com/wp-content/uploads/2020/11/ccm-service.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="heading-box">
                                            <h2>SERVICE CAROUSEL</h2>
                                        </div>
                                        <div class="description-box">
                                            <p>
                                                The hand-made characteristics shine through, embodying the spirit of our founder, Alan Clews. Since the inception of CCM in 1970, Alan's vision of combining a powerful engine with a lightweight and robust frame remains at the heart of our design philosophy.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="row gy-4">
                                    <div class="col-lg-7">
                                        <div class="image-box">
                                            <img src="https://ccm.theprogressteam.com/wp-content/uploads/2020/11/ccm-service.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="heading-box">
                                            <h2>SERVICE CAROUSEL</h2>
                                        </div>
                                        <div class="description-box">
                                            <p>
                                                The hand-made characteristics shine through, embodying the spirit of our founder, Alan Clews. Since the inception of CCM in 1970, Alan's vision of combining a powerful engine with a lightweight and robust frame remains at the heart of our design philosophy.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="row gy-4">
                                    <div class="col-lg-7">
                                        <div class="image-box">
                                            <img src="https://ccm.theprogressteam.com/wp-content/uploads/2020/11/ccm-service.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="heading-box">
                                            <h2>SERVICE CAROUSEL</h2>
                                        </div>
                                        <div class="description-box">
                                            <p>
                                                The hand-made characteristics shine through, embodying the spirit of our founder, Alan Clews. Since the inception of CCM in 1970, Alan's vision of combining a powerful engine with a lightweight and robust frame remains at the heart of our design philosophy.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <section class="footer-buttons">
        <div class="row g-0">
            <div class="col-6">
                <a href="#" class="light-blue">
                    <span>CONFIGURE A BIKE</span>
                    <span class="icon"></span>
                </a>
            </div>

            <div class="col-6">
                <a href="/book-ccm-test-ride/" class="light-gray">
                    <span>BOOK A TEST RIDE</span>
                    <span class="icon"></span>
                </a>
            </div>
        </div>
    </section>

    <?php
    page_components_v2();
    ?>
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