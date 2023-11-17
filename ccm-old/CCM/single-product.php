<?php 
/**
 * 	
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
 * @version 1.6.4
*/
get_header(); // This fxn gets the header.php file and renders it ?>
<?php if ( have_posts() ) : ?>

  <?php while ( have_posts() ) : the_post(); ?>
   <main class="subpage post-single">
    <section class="mid-section" style="padding-bottom: 0;">
      <div class="container no-padding">
        <h1 class="title"><?php the_title(); ?></h1>
      </div>
    </section>
    <?php 
    $class = '';
    if( has_term( 113, 'product_cat' , get_the_ID()) ) {
      $class = 'remove-wishlist approved-motor';
    }
    ?>
    <section class="content innerpadding xlarge <?= $class ?>" style="padding-top:40px;">
      <?php 
      $title = carbon_get_the_post_meta( 'sp_con_title' ); 
      $content = carbon_get_the_post_meta('sp_content');
      $price = get_post_meta( get_the_ID(), '_price', true );
      $pre_reg_tag = carbon_get_the_post_meta('pre_reg_tag');
      $registration_year = carbon_get_the_post_meta('registration_year');
      $mileage = carbon_get_the_post_meta('mileage');
      $model = carbon_get_the_post_meta('model');
      $registration_number = carbon_get_the_post_meta('registration_number');
      $series_number = carbon_get_the_post_meta('series_number');
      $warranty_term = carbon_get_the_post_meta('warranty_term');
      $provenance = carbon_get_the_post_meta('provenance');
      $more_details = carbon_get_the_post_meta('more_details');
      ?>
      <div class="container">
        <div class="the-content">
          <?php the_content(); ?>
          <?php if( has_term( 113, 'product_cat' , get_the_ID()) ) { ?> 
           <div class="additional-info">
            <div class="provenance">
              <h3>Provenance</h3>
              <?= wpautop( $provenance ); ?>
            </div>
            <div class="more-details">
              <h3>More details</h3>
              <?= wpautop( $more_details ); ?>
            </div>
            <div class="row features">
              <?php if($model) { ?>
                <div class="col-sm-6 the-feature mh">
                  <div class="inner" title="Model">
                    <i class="fas fa-motorcycle"></i>
                    <span> <?= $model ?> </span>
                  </div>
                </div>
              <?php } ?>

              <?php if($price) { ?>
                <div class="col-sm-6 the-feature mh">
                  <div class="inner" title="Price">
                    <i class="fas fa-tag"></i>
                    <span> <?= wc_price( $price ) ?> </span>
                  </div>
                </div>
              <?php } ?>
              <?php if($mileage) { ?>
                <div class="col-sm-6 the-feature mh">
                  <div class="inner" title="Mileage">
                    <i class="fas fa-road"></i>
                    <span> <?= $mileage ?> </span>
                  </div>
                </div>
              <?php } ?>

              <?php if($registration_year) { ?>
                <div class="col-sm-6 the-feature mh">
                  <div class="inner" title="Registration year">
                    <i class="fas fa-calendar"></i>
                    <span> <?= $registration_year  ?> </span>
                  </div>
                </div>
              <?php } ?>

              <?php if($registration_number) { ?>
                <div class="col-sm-6 the-feature mh">
                  <div class="inner" title="Registration number">
                    <i class="far fa-registered"></i>
                    <span> <?=  $registration_number  ?> </span>
                  </div>
                </div>
              <?php } ?>

              <?php if($series_number) { ?>
                <div class="col-sm-6 the-feature mh">
                  <div class="inner" title="Series number">
                    <i class="fas fa-hashtag"></i>
                    <span> <?=  $series_number  ?> </span>
                  </div>
                </div>
              <?php } ?>
              <?php if($warranty_term) { ?>
                <div class="col-sm-6 the-feature mh">
                  <div class="inner" title="Warranty term">
                    <i class="fas fa-shield-alt with-check"></i>
                    <span> <?= $warranty_term ?> </span>
                  </div>
                </div>
              <?php } ?>
              <div class="col-sm-6 the-feature mh">
                <div class="inner" title="Finance available">
                  <i class="finance"><img src="<?php _e(get_site_url()) ?>/wp-content/uploads/2020/09/finance3.png"></i>
                  <span> Low rate finance available </span>
                </div>
              </div>

            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn" data-toggle="modal" data-target="#exbikemodal">
              Enquire now
            </button>
            <!-- Modal -->
          </div>


          <div class="modal fade modal-v1" id="exbikemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="exampleModalLabel">Enquire Now</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                 <?= do_shortcode('[contact-form-7 id="5644" title="Ex-Bikes Enquire Form"]') ?>
               </div>
             </div>
           </div>
         </div>
       <?php } ?>
     </div>
   </div>
 </section>
 <?php if( has_term( 113, 'product_cat' , get_the_ID()) ) { ?> 
  <div class="back-to thank-you" style="text-align: center;"><a class="btn" href="/approved-motorcycles">Back to Bikes</a>
  <?php } else { ?>
    <div class="back-to thank-you" style="text-align: center;"><a class="btn" href="/shop">Back to Accessories</a>  <a class="btn" href="/offers/">Back to Offers</a></div>
  <?php } ?>
</main>
<?php endwhile; // OK, let's stop the post loop once we've displayed it ?>
<?php endif; // OK, I think that takes care of both scenarios (having a post or not having a post to show) ?>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>