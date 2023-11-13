<?php 
/**
 * 	Template Name: Contact Form V1
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); // This fxn gets the header.php file and renders it ?>
<?php 
$banner = carbon_get_the_post_meta( 'sp_banner' ); 
$banner_text = carbon_get_the_post_meta( 'sp_banner_text' ); 
$contact_form_shortcode = carbon_get_the_post_meta( 'contact_form_shortcode' ); 
?>
<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>
        <main class="subpage contact-page">
            <section class="content bg innerpadding xlarge" style="background-image: url('<?php echo carbon_get_the_post_meta('cp_background'); ?>');">
                <div class="container">
                    <div class="row">
                       <div class="col-lg-6 col-md-8 col-xs-12 col-sm-12">
                           <div class="contact-form">
                            
                            <?php echo $contact_form_shortcode ?>
							   <!-- <script type="text/javascript" src="https://form.jotformeu.com/jsform/83122578256359"></script> -->
                            <div class="contact-details">
                                <?php the_content(); ?>
                           
                           <div class="row contact-details-inner">
                            <div class="contact-tel">
                                01204 544930
                            </div>
                            <div class="contact-email">
                                <a href="mailto:spitfire@ccm-motorcycles.com">spitfire@ccm-motorcycles.com</a>
                            </div>
                            <div class="contact-address">
                                CCM Motorcycles, Unit 5, Jubilee works, Vale Street, Bolton, BL2 6QF
                            </div>
                            </div>
                          </div>
                        
                       </div>
                   </div>
               </div>
           </div>
       </section>
   </main>

<?php endwhile; // OK, let's stop the post loop once we've displayed it ?>
<?php endif; // OK, I think that takes care of both scenarios (having a post or not having a post to show) ?>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>

<script>
    jQuery(document).ready(function($) {
        jQuery('select[name="bike_to_test"]').find('option:first-child').text('Bike You Wish To Test*');
        jQuery('select[name="venues"]').find('option:first-child').text('Venues*');
    });
</script>