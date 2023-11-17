<?php 
/**
 * 	Template Name: Landing Page
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
get_header('landing'); // This fxn gets the header.php file and renders it ?>
<?php 
    //$banner = carbon_get_the_post_meta( 'sp_banner' ); 
    //$banner_text = carbon_get_the_post_meta( 'sp_banner_text' ); 
?>
    <?php if( get_field('background_image') ): ?>
	<section class="landing-handler"  style="background-image:url(<?php the_field('background_image'); ?>);background-size:cover;background-position: center;background-repeat: no-repeat;">
        <?php endif; ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 no-padding">
                    <div class="d-cell v-middle color-white">
                        <?php the_field('left_wysiwyg_editor'); ?>
                    </div>
                </div>
                <div class="col-md-6 no-padding">
                    <div class="d-cell v-middle color-white">
                        <?php the_field('right_wysiwyg_editor'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    if( have_rows('social_links') ):

        // loop through the rows of data
        while ( have_rows('social_links') ) : the_row();

            echo the_sub_field('facebook');
            echo the_sub_field('twitter');
            echo the_sub_field('instagram');

        endwhile;

    endif;
    ?>

<div class="hidden-footer">
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
</div>
