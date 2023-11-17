<?php 
/**
 * 	Template Name: Landing Page - Version2
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
//get_header('landing'); // This fxn gets the header.php file and renders it 
get_header('landing'); 
?>
<?php 
    //$banner = carbon_get_the_post_meta( 'sp_banner' ); 
    //$banner_text = carbon_get_the_post_meta( 'sp_banner_text' ); 
?>
	<section class="landing-handler france"  style="background-image:url(<?php the_field('fbackground_image'); ?>);background-size:cover;background-position: center;background-repeat: no-repeat;">
        <div class="container-fluid">
            <div class="row" style="background: rgba(0, 0, 0, 0.7) !important;">
                <div class="col-md-6 no-padding">
                    <div class="d-cell v-middle color-white content-container">
                        <?php if( get_field('fsecondary_logo') ): ?>
                            <a href="<?php the_field('fsecondary_logo_link'); ?>" class="secondary_logo">
                                <img src="<?php the_field('fsecondary_logo'); ?>" class="img-responsive" />
                            </a>
                        <?php endif; ?>
                        <?php the_field('fleft_wysiwyg_editor'); ?>
                    </div>
                </div>
                <div class="col-md-6 no-padding">
                    <div class="d-cell v-middle color-white">
                        <?php the_field('fright_wysiwyg_editor'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    if( have_rows('fsocial_links') ):

        // loop through the rows of data
        while ( have_rows('fsocial_links') ) : the_row();

            echo the_sub_field('facebook');
            echo the_sub_field('twitter');
            echo the_sub_field('instagram');

        endwhile;

    endif;
    ?>

<div class="hidden-footer">
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
</div>
