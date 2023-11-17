<?php

/**
 *  Template Name: -Template : Tablet 
 *  Template Post Type: page, bikes
 *
 *  This page template has a sidebar built into it, 
 *  and can be used as a home page, in which case the title will not show up.
 *
 */

?>
<?php get_header('v2'); ?>
<?php $white_bg = carbon_get_the_post_meta('white_bg'); ?>
<style>
    section.main-bike-section .qr-code-box img {
        height: 8vw;
        width: 8vw;
    }

    section.main-bike-section .finance-box {
        padding: 3vh 2vh;
    }

    section.main-bike-section .finance-box p {
        margin-bottom: 0;
    }

    section.main-bike-section .bike-specs .spec-holder .small-text {
        font-size: 1.4vw !important;
    }

    .page-components:not(.no-sleep-active):before {
        content: '';
        position: fixed;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        border: 1px solid red;
        z-index: 1;
    }

    section.main-bike-section .bike-title-tagline .title {
        border-right: 1px solid;
    }

    .tagline {
        display: flex;
        flex-direction: column;
        font-size: 2.5vh !important;
    }
    @media (max-width: 991px) {
        .viewport {
            left: 20px !important
        }
    }

    <?php if ($white_bg) { ?>
        body.bikes-template-page-tablet {
            background-color: #fff;
        }

        section.main-bike-section .col-bike-details {
            color: #000;
        }

        section.main-bike-section .bike-finance {
            color: #fff;
        }

        section.main-bike-section .finance-box {
            color: #fff;
        }

    <?php } ?>
</style>
<main id="page-components" class="page-components">
    <?php if (get_post_type() == 'bikes') { ?>
        <?php
        $title = wp_get_post_parent_id() ? get_the_title(wp_get_post_parent_id()) : get_the_title();
        $subheading = carbon_get_the_post_meta('subheading');
        $bike_price = carbon_get_the_post_meta('bike_price');
        $bike_shown_price = carbon_get_the_post_meta('bike_shown_price');
        $power = carbon_get_the_post_meta('power');
        $weight = carbon_get_the_post_meta('weight');
        $engine = carbon_get_the_post_meta('engine');
        $seat_height = carbon_get_the_post_meta('seat_height');
        $width = carbon_get_the_post_meta('width');
        $fuel_capacity = carbon_get_the_post_meta('fuel_capacity');
        $chassis = carbon_get_the_post_meta('chassis');
        $deposit = carbon_get_the_post_meta('deposit');
        $term = carbon_get_the_post_meta('term');
        $payments = carbon_get_the_post_meta('payments');
        $final_payment = carbon_get_the_post_meta('final_payment');
        $apr = carbon_get_the_post_meta('apr');
        $qr_coded = carbon_get_the_post_meta('qr_coded');
        $form_link = carbon_get_the_post_meta('form');
        $utm_medium = isset($_GET['utm_medium']) ? '&custentity_ccm_campaign_medium=' . $_GET['utm_medium'] : '';
        $utm_campaign = isset($_GET['utm_campaign']) ? '&custentity_ccm_campaign_name=' . $_GET['utm_campaign'] : '';
        $utm_content = isset($_GET['utm_content']) ? '&custentity_ccm_utm_content=' . $_GET['utm_content'] : '';
        $utm_source = isset($_GET['utm_source']) ? '&custentity_ccm_web_campaign_src=' . $_GET['utm_source'] : '';
        $product_name = isset($_GET['product_name']) ? '&custentity_ccm_product_name=' . $_GET['product_name'] : '';
        $form_final_link = $form_link . $utm_medium . $utm_campaign . $utm_content . $utm_source . $product_name;
        ?>
        <section class="main-bike-section">
            <div class="container-fluid">
                <div class="row flex-row">
                    <div class="col-lg-8 col-bike-details position-relative">
                        <!--<div class="viewport" style="position: absolute; top: 20px; right: 20px; background-color: #fff; color: #000; padding: 20px; font-size: 20px;">
                                        <div>
                                            <strong>Width:</strong> <span class="width"></span>px
                                        </div>
                                        <div>
                                            <strong>Height:</strong> <span class="height"></span>px
                                        </div>
                                    </div>-->
                        <div class="column-holder">
                            <div class="bike-title-tagline">
                                <div class="title">
                                    <h1><?= $title ?></h1>
                                    <?php if ($subheading) { ?>
                                        <div class="subheading">
                                            <p style="font-size: 2.75vh; margin-bottom: 0; margin-top: 1vh;">
                                                <?= $subheading ?>
                                            </p>
                                        </div>
                                    <?php } ?>
                                </div>
                                <?php if ($bike_price) { ?>
                                    <div class="tagline">
                                        <span> On The Road Price from <strong><?= $bike_price ?></strong> </span>
                                        <?php if ($bike_shown_price) { ?>
                                            <span> Model as shown <strong><?= $bike_shown_price ?></strong></span>
                                        <?php } ?>
                                    </div>
                                <?php } ?>

                            </div>
                            <div class="bike-image">
                                <?= get_the_post_thumbnail() ?>
                            </div>
                            <div class="bike-specs">
                                <?php if ($power) { ?>
                                    <div class="spec-holder">
                                        <span class="spec-label"><span>POWER</span> (BHP)</span>
                                        <span class="spec-value"><?= $power ?></span>
                                    </div>
                                <?php } ?>
                                <?php if ($weight) { ?>
                                    <div class="spec-holder">
                                        <span class="spec-label"><span>WEIGHT</span> (KG)</span>
                                        <span class="spec-value"><?= $weight ?></span>
                                    </div>
                                <?php } ?>
                                <?php if ($engine) { ?>
                                    <div class="spec-holder">
                                        <span class="spec-label"><span>ENGINE</span> (CC)</span>
                                        <span class="spec-value"><?= $engine ?></span>
                                    </div>
                                <?php } ?>
                                <?php if ($seat_height) { ?>
                                    <div class="spec-holder">
                                        <span class="spec-label"><span>SEAT HEIGHT</span> (MM)</span>
                                        <span class="spec-value"><?= $seat_height ?></span>
                                    </div>
                                <?php } ?>
                                <?php if ($width) { ?>
                                    <div class="spec-holder">
                                        <span class="spec-label"><span>WIDTH</span> (MM)</span>
                                        <span class="spec-value"><?= $width ?></span>
                                    </div>
                                <?php } ?>
                                <?php if ($fuel_capacity) { ?>
                                    <div class="spec-holder">
                                        <span class="spec-label"><span>FUEL CAPACITY</span> (L)</span>
                                        <span class="spec-value"><?= $fuel_capacity ?></span>
                                    </div>
                                <?php } ?>
                                <?php if ($chassis) { ?>
                                    <div class="spec-holder">
                                        <span class="spec-label"><span>CHASSIS</span> &nbsp;</span>
                                        <span class="spec-value small-text"><?= $chassis ?></span>
                                    </div>
                                <?php } ?>



                            </div>
                            <div class="bike-finance-qr">
                                <div class="row flex-row align-items-center">
                                    <?php if ($qr_coded) { ?>
                                        <div class="col-sm-6">
                                            <div class="column-holder">
                                                <div class="qr-code-box">
                                                    <div class="qr-title">
                                                        <h2>
                                                            SCAN FOR <br> DIGITAL <br>BROCHURE
                                                        </h2>
                                                    </div>
                                                    <div class="svg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="32"
                                                            viewBox="0 0 12 32">
                                                            <path id="Polygon_2" data-name="Polygon 2" d="M16,0,32,12H0Z"
                                                                transform="translate(12) rotate(90)" fill="#ed181f" />
                                                        </svg>
                                                    </div>
                                                    <div class="qr-code">
                                                        <?= wp_get_attachment_image($qr_coded, 'medium') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="<?= $qr_coded ? 'col-sm-6' : 'col-sm-12' ?>">
                                        <div class="column-holder">
                                            <div class="finance-box">
                                                <h3>
                                                    FINANCE AVAILABLE
                                                </h3>
                                                <p class="d-flex align-items-center justify-content-center">
                                                    Enquire for more information &nbsp; &nbsp; <svg
                                                        xmlns="http://www.w3.org/2000/svg" width="7" height="18"
                                                        viewBox="0 0 7 18">
                                                        <path id="Polygon_4" data-name="Polygon 4" d="M9,0l9,7H0Z"
                                                            transform="translate(7) rotate(90)" fill="#ed181f" />
                                                    </svg>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--
                                            <table>
                                                <tr>
                                                    <td rowspan="2" class="large-text">
                                                        FINANCE <br>EXAMPLE
                                                    </td>
                                                    <?php if ($deposit) { ?>
                                                                    <td class="td-label">
                                                                        DEPOSIT
                                                                    </td>
                                                    <?php } ?>
                                                    <?php if ($term) { ?>
                                                                    <td class="td-label">
                                                                        TERM
                                                                    </td>
                                                    <?php } ?>
                                                    <?php if ($payments) { ?>
                                                                    <td class="td-label">
                                                                        PAYMENTS
                                                                    </td>
                                                    <?php } ?>
                                                    <?php if ($final_payment) { ?>
                                                                    <td class="td-label">
                                                                        FINAL PAYMENT
                                                                    </td>
                                                    <?php } ?>
                                                    <?php if ($apr) { ?>
                                                                    <td class="td-label">
                                                                        APR
                                                                    </td>
                                                    <?php } ?>
                                                    <td rowspan="2" class="large-text">
                                                        £9,995 OTR
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <?php if ($deposit) { ?>
                                                                    <td class="td-value">
                                                                        <?= $deposit ?>
                                                                    </td>
                                                    <?php } ?>
                                                    <?php if ($term) { ?>
                                                                    <td class="td-value">
                                                                        <?= $term ?><span>months</span>
                                                                    </td>
                                                    <?php } ?>
                                                    <?php if ($payments) { ?>
                                                                    <td class="td-value">
                                                                        <?= $payments ?>
                                                                    </td>
                                                    <?php } ?>
                                                    <?php if ($final_payment) { ?>
                                                                    <td class="td-value">
                                                                        <?= $final_payment ?>
                                                                    </td>
                                                    <?php } ?>
                                                    <?php if ($apr) { ?>
                                                                    <td class="td-value">
                                                                        <?= $apr ?><span>%</span>
                                                                    </td>
                                                    <?php } ?>

                                                </tr>
                                            </table>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-form">
                        <div class="column-holder d-flex align-items-center">
                            <div class="form-box">
                                <div class="heading text-center">
                                    <h2>
                                        REGISTER YOUR INTEREST BY SUBMITTING YOUR DETAILS BELOW
                                    </h2>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="12" viewBox="0 0 32 12">
                                        <path id="Polygon_1" data-name="Polygon 1" d="M16,0,32,12H0Z"
                                            transform="translate(32 12) rotate(180)" fill="#ed181f" />
                                    </svg>
                                </div>
                                <div class="form-inner">
                                    <iframe id="netsuite-form" src="<?= $form_final_link ?>" width="100%"
                                        style=" width: 100%; height: 481px; border: none; background-color: #171717"></iframe>
                                    <div class="form-consent text-center">
                                        <p>
                                            By submitting, you're consenting to being contacted by CCM Motorcycles in
                                            response to your enquiry.
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php }
    else { ?>
        <section class="tablet-thank-you">
            <div class="container-fluid text-center">
                <div class="text-box">
                    <h1>
                        THANKS FOR ENQUIRING
                    </h1>
                    <p>
                        We've got your details and a member of the team will be in touch in due course.
                    </p>
                    <p>
                        There's nothing else you need to do. Enjoy the show!
                    </p>
                </div>
                <div class="returning">
                    <p>
                        RETURNING TO PAGE IN <span>5</span>...
                    </p>
                </div>
            </div>
        </section>
    <?php } ?>
</main>
<?php get_footer(); ?>
<script>
    var noSleep = new NoSleep();
    document.addEventListener('click', function enableNoSleep() {
        document.removeEventListener('click', enableNoSleep, false);
        noSleep.enable();
    }, false);

    setInterval(check_no_sleep, 1000);

    function check_no_sleep() {
        $enabled = noSleep.enabled;
        if ($enabled == true) {
            jQuery('.page-components').addClass('no-sleep-active');
        } else {
            jQuery('.page-components').removeClass('no-sleep-active');
        }
    }




    jQuery(window).resize(function () {
        viewport();
    });

    function viewport() {
        var viewportWidth = $(window).width();
        var viewportHeight = $(window).height();
        jQuery('.width').text(viewportWidth);
        jQuery('.height').text(viewportHeight);
    }
</script>