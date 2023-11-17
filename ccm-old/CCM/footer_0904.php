<?php
/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to finish 
	/* rendering the page and display the footer area/content
	/*-----------------------------------------------------------------------------------*/
	?>
	<section class="options innerpadding xxlarge">
		<?php 
		$link_text1 = carbon_get_theme_option( 'link_text1' ); 
		$link1 = carbon_get_theme_option( 'link1' ); 
		$link_text2 = carbon_get_theme_option( 'link_text2' ); 
		$link2 = carbon_get_theme_option( 'link2' ); 
		$link_text3 = carbon_get_theme_option( 'link_text3' ); 
		$link3 = carbon_get_theme_option( 'link3' ); 
		?>
		<div class="container">
			<div class="col-sm-4" align="center">
				<div class="holder">
					<h4><a target="_blank" href="<?php echo $link1; ?>"><?php echo $link_text1; ?></a></h4>
				</div>
			</div>
			<div class="col-sm-4" align="center">
				<div class="holder">
					<h4><a href="<?php echo $link2; ?>"><?php echo $link_text2; ?></a></h4>
				</div>
			</div>
			<div class="col-sm-4" align="center">
				<div class="holder">
					<h4><a href="<?php echo $link3; ?>"><?php echo $link_text3; ?></a></h4>
				</div>
			</div>
		</div>
	</section>
	<footer>
		<div class="container">
			<div class="top-footer">
				<div class="row">
					<div class="col-sm-2">
						<?php
						if(is_active_sidebar('footer-sidebar-1')){
							dynamic_sidebar('footer-sidebar-1');
						}
						?>
					</div>
					<div class="col-sm-2">
						<?php
						if(is_active_sidebar('footer-sidebar-2')){
							dynamic_sidebar('footer-sidebar-2');
						}
						?>
					</div>
					<div class="col-sm-3">
						<?php
						if(is_active_sidebar('footer-sidebar-3')){
							dynamic_sidebar('footer-sidebar-3');
						}
						?>
					</div>
					<div class="col-sm-5">
						<?php
						if(is_active_sidebar('footer-sidebar-4')){
							dynamic_sidebar('footer-sidebar-4');
						}
						?>
						<ul class="floating-social-links list-unstyled list-inline text-center">
							<?php $links = carbon_get_theme_option('floating_social_links'); ?>
							<?php foreach($links as $link): ?>
							<li><a href="<?php echo $link['social_media_link']; ?>" target="_blank"><img src="<?php echo $link['social_media_image']; ?>" alt="<?php echo $link['social_media']; ?>"></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="bottom-footer">
				<div class="col-lg-4">
					<div class="bfooter-left">
						<?php
						wp_nav_menu( array(
							'menu'              => 'bottom-footer',
							'theme_location'    => 'bottom-footer',
							'depth'             => 2,
							'container'         => false,
							'menu_class'        => 'nav list-inline list-unstyled',
							'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
							'walker'            => new WP_Bootstrap_Navwalker())
					);
					?>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="copy text-right">
						<p>All Content © CCM Motorcycles | Registered in England and Wales: 05949003 | VAT no: 847 11 56 24</p>
					</div>
				</div>
			</div>
		</div>
		<div class="Enquiry-Form-mn">
        <div id="Enquiry-Form-button"><span>Enquire</span></div>
    <div class="Enquiry-Form">
        <?php echo do_shortcode('[contact-form-7 id="2303" title="Enquiry Form"]'); ?>
    </div>
    </div>
	</div>
</footer>
<script>
jQuery(document).ready(function(){
  
  jQuery(".wpcf7-submit").click(function(){
	setTimeout(function(){ 
	console.log('123');
		if(jQuery('div').hasClass( "wpcf7-mail-sent-ok" ) )
		{
			console.log('111');
			jQuery('.Enquiry-Form').find('.wpcf7-submit').css('background','gray');
			jQuery('.Enquiry-Form').find('.wpcf7-submit').val('Message Sent');
		}

	}, 2000);
  });
});
</script>

<div id="loader"><img src="<?php bloginfo('template_url'); ?>/app/assets/images/ripple.svg"></div>
<?php wp_footer();?>
   <!--[if lte IE 9]>
		<script src="javascripts/non-responsive.js"></script>
	<![endif]-->

</body>
</html>
