<?php 
/**
 * 	Template Name: Defences
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); // This fxn gets the header.php file and renders it ?>
<?php 
    $banner = carbon_get_the_post_meta( 'ds_banner' ); 
    $banner_text = carbon_get_the_post_meta( 'ds_banner_text' ); 
?>
	<main class="defences">
        <section class="ds-banner" style="background-image: url(<?php echo $banner; ?>)">
            <div class="container no-padding">
                <h2><?php echo $banner_text; ?></h2>
            </div>
        </section>
        <section class="content innerpadding xlarge">
            <?php 
                $title = carbon_get_the_post_meta( 'ds_con_title' ); 
                $content = carbon_get_the_post_meta('ds_content');
            ?>
            <div class="container">
                <div class="row">
                    <h2><?php echo $title; ?></h2>
                    <div class="col-sm-4 col-md-5 no-padding">
                        <div class="separator"></div>
                    </div>
                    <div class="col-sm-8 col-md-7">
                        <?php echo apply_filters( 'the_content', $content ); ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="list innerpadding xlarge">
            <div class="container">
                <div class="row">
                    <?php
                        $args = array( 'post_type'   => 'defences');
                         
                        $defences = new WP_Query( $args );
                        $x = 0;
                        if( $defences->have_posts() ) :
                        while( $defences->have_posts() ) : $defences->the_post(); $x++; ?>
                            <div class="col-md-4">
                               <div class="holder">
                                    <div class="date"><div class="wrapper"><span><?php echo get_the_date('Y'); ?></span></div></div>
                                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full'); ?>
                                    <img src="<?php echo $image[0]; ?>" class="img-responsive">
                                    <div class="zoom-text-wrapper">
                                        <div class="zoom-text">
                                          <span><a href="<?php echo $image[0]; ?>" class="foobox" rel="gallery"><i class="fa fa-plus"></i></a></span>
                                        </div>
                                    </div>
                               </div>
                               <div class="title match-height">
                                   <h3><?php echo the_title(); ?></h3>
                               </div>
                            </div>
                            <?php if($x % 3 == 0){ echo '</div><div class="row">'; } ?>
                        <?php endwhile; wp_reset_postdata(); ?>
                        <?php
                        else :
                          esc_html_e( 'No defences to show!', 'text-domain' );
                        endif;
                    ?>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>