<?php
/*-----------------------------------------------------------------------------------*/
/* This template will be called by all other template files to finish 
	/* rendering the page and display the footer area/content
	/*-----------------------------------------------------------------------------------*/
$hide_contact_slider = carbon_get_the_post_meta('hide_contact_slider');
$template = get_page_template_slug();
?>
<?php if ($template != 'templates/page-tablet.php') { ?>

	<?php if (!is_page(3701) && !is_page(3673) && !is_page(3699) && !is_page(3721) && !is_page(3761) && !is_page(3708) && !is_page_template('templates/page-configure-bike.php')) { ?>
		<section class="options innerpadding xxlarge">
			<?php
			$link_text1 = carbon_get_theme_option('link_text1');
			$link1 = carbon_get_theme_option('link1');
			$link_text2 = carbon_get_theme_option('link_text2');
			$link2 = carbon_get_theme_option('link2');
			$link_text3 = carbon_get_theme_option('link_text3');
			$link3 = carbon_get_theme_option('link3');
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
							if (is_active_sidebar('footer-sidebar-1')) {
								dynamic_sidebar('footer-sidebar-1');
							}
							?>
						</div>
						<div class="col-sm-2">
							<?php
							if (is_active_sidebar('footer-sidebar-2')) {
								dynamic_sidebar('footer-sidebar-2');
							}
							?>
						</div>
						<div class="col-sm-3">
							<?php
							if (is_active_sidebar('footer-sidebar-3')) {
								dynamic_sidebar('footer-sidebar-3');
							}
							?>
						</div>
						<div class="col-sm-5">
							<?php
							if (is_active_sidebar('footer-sidebar-4')) {
								dynamic_sidebar('footer-sidebar-4');
							}
							?>
							<ul class="floating-social-links list-unstyled list-inline text-center">
								<?php $links = carbon_get_theme_option('floating_social_links'); ?>
								<?php foreach ($links as $link) : ?>
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
							wp_nav_menu(
								array(
									'menu'              => 'bottom-footer',
									'theme_location'    => 'bottom-footer',
									'depth'             => 2,
									'container'         => false,
									'menu_class'        => 'nav list-inline list-unstyled',
									'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
									'walker'            => new WP_Bootstrap_Navwalker()
								)
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
			<?php if (current_user_can('administrator')) { ?>
				<a class="admin-link" href="/wp-admin/"> <img src="<?= get_stylesheet_directory_uri() ?>/app/images/admin.png"> </a>
			<?php } else if (current_user_can('shop_manager')) { ?>
				<a class="admin-link" href="/wp-admin/edit.php?post_type=shop_order"> <img src="<?= get_stylesheet_directory_uri() ?>/app/images/admin.png"> </a>
			<?php } ?>

			<?php if (!$hide_contact_slider) { ?>
				<!--<div class="Enquiry-Form-mn">
				<div id="Enquiry-Form-button"><span>Enquire <i class="fa fa-chevron-up"></i></span></div>
				<div class="Enquiry-Form">
					<?php echo do_shortcode('[contact-form-7 id="2303" title="Enquiry Form"]'); ?>
				</div>
			</div>-->
			<?php } ?>
			<div class="club-tab hidden">
				<div id="club-button" style="background-color: rgba(43,43,43,0.9); width: 130px; padding: 13px 0 10px; font-family: 'Fira Sans Condensed', sans-serif; text-transform: uppercase; color: #fff; transform: rotate(-90deg); position: fixed; right: -35px; top: 150px">
					<div class="main-text" style="margin: 0 auto; width: 130px; text-align: center; font-size: 25px; font-weight: 600; font-style: italic; padding-right: 5px; line-height: 25px">
						Club CCM
					</div>
					<div class="sub-text" style="margin: 0 auto; width: 130px; text-align: center; font-size: 12px; letter-spacing: 1px">
						Coming Soon
					</div>
				</div>
			</div>
			</div>
		</footer>
	<?php } ?>

<div class="whats-app"> <a href="https://wa.me/7791962112"> <img src="https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/WhatsApp_icon.png"> </a> </div>

	<script>
		jQuery(document).ready(function() {
			jQuery('#myModal').find('form').attr('id', 'story_id');
			jQuery(".wpcf7-submit").click(function() {
				setTimeout(function() {
					if (jQuery('div').hasClass("wpcf7-mail-sent-ok")) {

						jQuery('.Enquiry-Form').find('.wpcf7-submit').css('background', 'gray');
						jQuery('.Enquiry-Form').find('.wpcf7-submit').val('Message Sent');
					}



				}, 2000);


			});

			jQuery('.story_file').css('display', 'none');

			jQuery('.file-text').on('click', function() {
				jQuery('.story-file-hidden').trigger('click');
				//jQuery('.story_file').css('display','block');
			});

			jQuery(document).on('change', '.story-file-hidden', function() {
				var a = document.getElementById('story-file-hidden');
				if (a.value == "") {
					jQuery('.story_file').css('display', 'none');
					jQuery('.file-text').css('display', 'block');
				} else {
					jQuery('.story_file').css('display', 'block');
					jQuery('.file-text').css('display', 'none');
				}
			});

			<?php if (!is_user_logged_in()) { ?>

				jQuery('.user-account-menu a').attr('href', '/ccm-login/');

			<?php } ?>


		});

		document.addEventListener('wpcf7mailsent', function(event) {
			if ('2761' == event.detail.contactFormId) {
				var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

				var formData = new FormData(document.getElementById('story_id'));

				jQuery.each(jQuery("input[type=file]"), function(i, obj) {
					jQuery.each(obj.files, function(j, file) {
						formData.append('photo[' + j + ']', file);
					});
				});

				formData.append("action", "stories_post");

				jQuery.ajax({
					url: ajaxurl,
					type: 'POST',
					data: formData,
					cache: false,
					processData: false,
					contentType: false,
					success: function(data) {
						console.log(data);


					}
				});
			}
		});
	</script>


	<div id="loader"><img src="<?php bloginfo('template_url'); ?>/app/assets/images/ripple.svg"></div>
	<?php wp_footer(); ?>
	<!--[if lte IE 9]>
		<script src="javascripts/non-responsive.js"></script>
	<![endif]-->
<?php } ?>

</body>

</html>