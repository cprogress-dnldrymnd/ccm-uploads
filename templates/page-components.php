<?php
/**
 *  Template Name: -Template : Page Components
 *  Template Post Type: page, bikes
 *
*/

$footer_type = carbon_get_the_post_meta('footer_type');
$header_type = carbon_get_the_post_meta('header_type');
$display_sticky_button = carbon_get_the_post_meta('display_sticky_button');
$button_text = carbon_get_the_post_meta('stickty_button_text');
$button_link = carbon_get_the_post_meta('sticky_button_link');
$custom_css = carbon_get_the_post_meta('custom_css');

$main_class = $header_type == 'logo-only' ? 'mt-0': '';
if(get_post_type() == 'bikes' && $display_sticky_button) {
    $class = 'sticky-mobile-button-main';
}
?>
<?php get_header('v2'); ?>
<main id="page-components" class="page-components page-components-2 <?= $class ?> <?= $main_class ?>">
    <?php
    page_components();
    ?>

    <?php if(get_post_type() == 'bikes') { ?>
        <?php
                $isIvendi = get_field('is_ivendi');

                if ($isIvendi) : 
                    $widget = get_field('ivendi');
            ?>
            <section>
                <div class="container" style="padding:0; margin-bottom: 30px;" id="ivendi">
                    <iframe width="100%" height="900" src="https://newvehicle.com/widgets/lib/finance-comparator-convert/?username=<?php echo $widget['username'] ?>&quoteeUid=<?php echo $widget['quoteeuid'] ?>&class=<?php echo $widget['class'] ?>&condition=<?php echo $widget['condition'] ?>&vrm=<?php echo $widget['vrm'] ?>&registrationDate=<?php echo date('d/m/Y') ?>&cashPrice=<?php echo $widget['cashprice'] ?>&currentOdometerReading=<?php echo $widget['currentodometerreading'] ?>&vehicleImageUrl=<?php echo $widget['vehicleimageurl'] ?>&widgetId=iv-finance-widget&cashDeposit=<?php echo $widget['cashdeposit'] ?>&term=<?php echo $widget['term'] ?>&annualDistance=<?php echo $widget['annualDistance'] ?>&capCode=<?php echo $widget['capCode'] ?>&capId=<?php echo $widget['capId'] ?>" id="iv-finance-widget" name="iv-finance-widget"></iframe>
                </div>
            </section>
            <?php 
                endif;
            ?>

        <div class="phone-number-contact-form" style="display: none">
            <?= do_shortcode('[contact-form-7 id="12434" title="Phone Number Click Submission"]') ?>
        </div>
        <?php if($display_sticky_button) { ?>
            <div class="sticky-mobile-buttons">
                <div class="button-group d-flex">
                    <?= get_button($button_text, $button_link, true, 'anchor-modal pc-btn', false, false) ?>
                    <?php  
                    if(get_post_type() == 'bikes') {
                        echo do_shortcode( '[phone_number class="white white-bg" text="SPEAK TO US" dynamic=1]' );
                    }
                    ?>
                </div>
            </div>
        <?php } ?>
    <?php } ?>


</main>
<?php get_footer($footer_type); ?>


<script>

    jQuery(document).ready(function($) {
        navbar_toggle();
    });

    function navbar_toggle() {
        $body = jQuery('body');
        jQuery('.navbar-toggle').click(function(event) {
            if($body.hasClass('navbar-active')) {
                $body.removeClass('navbar-active');
            } else {
                $body.addClass('navbar-active');
            }
        });
    }

</script>

<?php if(get_post_type() == 'bikes') { ?>
    <script>
        jQuery(document).ready(function($) {
            jQuery('.phone-number').click(function(event) {
                jQuery('.phone-number-contact-form .wpcf7-submit').click();
                jQuery('.phone-number-contact-form').remove();
            });
        });
    </script>
    <?php } ?>