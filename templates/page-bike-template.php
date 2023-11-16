<?php

/**
 *  Template Name: -Template : Bike Template
 *  Template Post Type: bikes
 *
 *  This page template has a sidebar built into it, 
 *  and can be used as a home page, in which case the title will not show up.
 *
 */

$footer_type = carbon_get_the_post_meta('footer_type');
$version = $_GET['version'];
?>
<?php get_header(); ?>
<main id="page-components" class="main-holder reusable-blocks bt-5 <?= $class ?> <?= $main_class ?>">
    <section class="hero-banner-with-breadcrumbs d-flex align-items-end ">
        <div class="video-holder">
            <iframe frameborder="0" height="100%" width="100%" src="https://www.youtube.com/embed/<?= $embed_id ?>?autoplay=1&mute=1&controls=0&showinfo=0&autohide=1&loop=1&rel=0&playlist=q6CEBGW4szM">
            </iframe>
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
    <section class="bike-navigation <?= $version == 'v2' ? 'v2' : 'v1' ?>">
        <div class="inner">
            <div class="container-fluid container-fluid-wide">
                <div class="row align-items-center">
                    <div class="col-auto col-xl-4">
                        <div class="bike-title">
                            <span><?php the_title() ?></span>
                        </div>
                    </div>
                    <div class="col-auto col-bike-nav col-xl-4">
                        <div class="bike-nav">
                            <ul class="list-inline text-center">
                                <li>
                                    <a href="#overview">OVERVIEW</a>
                                </li>
                                <li>
                                    <a href="#features">FEATURES</a>
                                </li>
                                <li>
                                    <a href="#bike-specification">SPECIFICATION</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto col-xl-4">
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
        </div>
    </section>

    <section class="overview <?= $version == 'v2' ? 'v2' : 'v1' ?>" id="overview">
        <?php if ($version == 'v2') { ?>
            <div class="bg-holder" style="background-image: url(https://ccm.theprogressteam.com/wp-content/uploads/2022/02/maverick-image.png)">

            </div>
        <?php } ?>

        <div class="container">
            <div class="inner">
                <?php if ($version == 'v2') { ?>
                    <div class="heading-box text-center">
                        <h2>A PASSION TO WIN.</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">

                        </div>
                        <div class="col-lg-6">
                            <div class="description-box">
                                <p>
                                    Any motorcycle that bears our founding father’s signature has to be very special. Using the same gorgeous trellis frame that underpins the striking Spitfire range, this very limited edition machine has been designed using a range of components exclusive to this stunning machine. This machine is unmistakably CCM. It lifts any pre-conceived impressions to a new level. Our most striking bike to date, every component has been carefully considered to create a motorcycle that Alan would have been truly proud of.
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="heading-box">
                        <h2>LEAVE THE HERD BEHIND.</h2>
                    </div>
                    <div class="description-box">
                        <p>
                            The hand-made characteristics shine through, embodying the spirit of our founder, Alan Clews. Since the inception of CCM in 1970, Alan's vision of combining a powerful engine with a lightweight and robust frame remains at the heart of our design philosophy.
                        </p>
                    </div>
                <?php } ?>
            </div>

        </div>
    </section>
    <?php if ($version != 'v2') { ?>
        <section class="image-section">
            <div class="container">
                <div class="image-box">
                    <img src="https://ccm.theprogressteam.com/wp-content/uploads/2020/11/maverick-1.png" alt="">
                </div>
            </div>
        </section>
    <?php } ?>

    <section class="features <?= $version == 'v2' ? 'v2' : 'v1' ?>" id="features">
        <div class="inner">
            <div class="container">
                <div class="row align-items-center gy-3">
                    <div class="col-lg-4">
                        <div class="feature-box">
                            <div class="feature-item">
                                <div class="heading-box">
                                    <h5>SINGLE CYLINDER, FOUR-STROKE, 600CC ENGINE</h5>
                                </div>
                                <div class="description-box">
                                    <p>
                                        With its single cylinder, four-stroke, 600cc engine, the Maverick delivers 55bhp and 43 ft lb of torque.
                                    </p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="heading-box">
                                    <h5>STRAIGHT-THROUGH INLET AND TWIN EXHAUSTS</h5>
                                </div>
                                <div class="description-box">
                                    <p>
                                        Roaring to life with its straight-through inlet and twin exhausts producing a symphony of sound.
                                    </p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="heading-box">
                                    <h5>NOIR SABLE HARD POWDER-COAT FRAME FINISH</h5>
                                </div>
                                <div class="description-box">
                                    <p>
                                        Just to make sure your ride is tough enough to match its attitude.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <?php if ($version == 'v2') {
                            $image = 'https://ccm.theprogressteam.com/wp-content/uploads/2020/11/Heritage-Transparency-new.png';
                        } else {
                            $image = 'https://ccm.theprogressteam.com/wp-content/uploads/2020/11/maverick-2.png';
                        }

                        ?>
                        <div class="image-box text-center text-lg-right">
                            <img src="<?= $image ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php $images = array(17228, 17229, 17228, 17229) ?>

    <section class="bike-scroller">
        <div class="inner">
            <div class="images">
                <div class="row-images">
                    <?php foreach ($images as $key => $image) { ?>
                        <div class="image" id="image-<?= $key ?>">
                            <img src="<?= wp_get_attachment_image_url($image, 'full') ?>" class="no-lazyload">
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="scroll-offset"></div>
    </section>

    <section class="bike-specification" id="bike-specification">
        <div class="container">
            <div class="specs-holder">
                <div class="specs-box">
                    <div class="specs-heading">
                        <h3>
                            ENGINE
                        </h3>
                        <span class="icon"></span>
                    </div>
                    <div class="specs-list">
                        <div class="row g-5">
                            <?php for ($x = 0; $x <= 13; $x++) { ?>
                                <div class="col-6">
                                    <div class="specs-name">
                                        <strong>DISPLACEMENT</strong>
                                    </div>
                                    <div class="specs-val">
                                        <span>Displacement</span>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="specs-box">
                    <div class="specs-heading">
                        <h3>
                            CHASSIS, SUSPENSION & BRAKES
                        </h3>
                        <span class="icon"></span>
                    </div>
                    <div class="specs-list">
                        <div class="row g-5">
                            <?php for ($x = 0; $x <= 13; $x++) { ?>
                                <div class="col-6">
                                    <div class="specs-name">
                                        <strong>DISPLACEMENT</strong>
                                    </div>
                                    <div class="specs-val">
                                        <span>Displacement</span>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="specs-box">
                    <div class="specs-heading">
                        <h3>
                            STATIC DIMENSIONS
                        </h3>
                        <span class="icon"></span>
                    </div>
                    <div class="specs-list">
                        <div class="row g-5">
                            <?php for ($x = 0; $x <= 13; $x++) { ?>
                                <div class="col-6">
                                    <div class="specs-name">
                                        <strong>DISPLACEMENT</strong>
                                    </div>
                                    <div class="specs-val">
                                        <span>Displacement</span>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="image-section">
        <div class="image-box">
            <img src="https://ccm.theprogressteam.com/wp-content/uploads/2020/11/maverick-5.png" alt="">
        </div>
    </section>

    <section class="overview contact-form-holder">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="inner">
                        <div class="heading-box">
                            <h2>REGISTER YOUR INTEREST</h2>
                        </div>
                        <div class="description-box">
                            <p>
                                Please fill in your details and one of our team members will contact you within 48 hours.
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
    <section class="footer-buttons">
        <div class="row g-0">
            <div class="col-6">
                <a href="" class="light-blue">
                    <span>CONFIGURE A BIKE</span>
                    <span class="icon"></span>
                </a>
            </div>
            <div class="col-6">
                <a href="" class="light-gray">
                    <span>BOOK A TEST RIDE</span>
                    <span class="icon"></span>
                </a>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>