<?php
/**
    *   Template Name: Careers
*
    *   This page template has a sidebar built into it,
    *   and can be used as a home page, in which case the title will not show up.
*
*/
get_header(); // This fxn gets the header.php file and renders it ?>
<?php
$banner = carbon_get_the_post_meta( 'sp_banner' );
$banner_text = carbon_get_the_post_meta( 'sp_banner_text' );
?>
<main class="news careers">
    <section class="sp-banner" style="background-image: url(<?php echo $banner; ?>)">
        <div class="banner-title"><h2><?php echo $banner_text; ?></h2></div>
    </section>

    <section class="careers-sc-one">
    	<div class="container">
    		<div class="row">
    			<div class="col-xs-12">
    				<h2>WE'RE ALWAYS LOOKING FOR<br/>TALENTED INDIVIDUALS</h2>
    			</div>
    			<div class="col-md-6">
    				<div class="bordered-top-black">
    				</div>
    			</div>
    			<div class="col-md-6">
    				<?php the_content() ?>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="featured-positions-titlehandler">
    	<div class="container">
    		<div class="row">
    			<div class="col-xs-12">
    				<div class="title-bg-white-bd-gray">
    					<h1>Featured Positions</h1>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="featured-careers-sc">
    	<div class="container">
    		<div class="row">
    			<div class="col-xs-12">
    				<div class="careers-tab-content">
    					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						  <?php
							$slides = carbon_get_the_post_meta( 'tab_careers' );
							$x = 0;
							foreach ( $slides as $slide ) {
								$content = wpautop( $slide['description'] );
							    echo '<div class="panel panel-default"><div class="panel-heading" role="tab" id="headingOne-'. $x .'"><h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne-'. $x .'" aria-expanded="true" aria-controls="collapseOne-'. $x .'" class="collapsed">'. $slide['title'] . '<div class="careers-tab-close"></div></a>
						      </h4></div>';
							    echo '<div id="collapseOne-'. $x .'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
						      <div class="panel-body">' . $content . '<div class="button-handler-careers"><a href="'. $slide['buttonlink'] .'">ENQUIRE NOW</a></div></div>
						    </div>
						  </div>';
						$x++;
							}

							?>
						</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
    
    </main>
    <?php get_footer(); // This fxn gets the footer.php file and renders it ?>