<?php
/*-----------------------------------------------------------------------------------*/
/* This template will be called by all other template files to finish 
	/* rendering the page and display the footer area/content
	/*-----------------------------------------------------------------------------------*/
$hide_contact_slider = carbon_get_the_post_meta('hide_contact_slider');
$template = get_page_template_slug();
?>
<?php if ($template != 'templates/page-tablet.php') { ?>

	<footer class="bt-5">
		<div class="container">
			
		</div>
	</footer>

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