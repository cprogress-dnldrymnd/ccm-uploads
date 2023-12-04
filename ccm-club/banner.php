<?php
$banner = carbon_get_the_post_meta( 'sp_banner' );
$banner_text = carbon_get_the_post_meta( 'sp_banner_text' );
$content2 = carbon_get_the_post_meta('sp_content2');
$contact_form_content = get_field('contact_form_content');
$login_url=site_url('my-account');

$content_banner = "<h1>Club CCM</h1>Welcome to Club CCM—The online members' zone for CCM owners. Sign in now to book a service and access unique, exclusive offers and content.<div class='owner_btn'><a href='/my-account'>Sign in</a></div>";
$bg_img = carbon_get_the_post_meta('sp_bg_img');
$overviewTitle=get_field('owners_overview_title');


$current_user = wp_get_current_user();
$username= $current_user->user_firstname ;
$logouturl=wp_logout_url();


$user = wp_get_current_user();

if ( in_array( 'ccm_owner', (array) $user->roles ) ) {
	if (in_array( 'administrator', (array) $user->roles )) {
		$user_role = '<span>Administrator/CCM Owner</span>';
	} else {
		$user_role = 'CCM Owner';
	}
} else if(in_array( 'administrator', (array) $user->roles )) {
	$user_role = 'Administrator';
} else {
	$user_role = 'Enthusiast';
}



/*
if($user->roles[0] == 'administrator') {
	$user_role = 'Administrator';
} else if($user->roles[0] == 'ccm_owner') {
	$user_role = 'CCM Owner';
} else {
	$user_role = 'Subscriber';
}*/
/*$user_content="<h3>Club CCM</h3>
<div class='user-meta'><div class='icon'><i class='fas fa-user'></i></div><div class='welcome'><span>Welcome back, ".$username. "</span><span class='sign_outbanner' style='float:right;'><span class='notYou'>Not you?</span> <a href=" .$logouturl.">Sign Out</a></span></div></div>";*/
$myAccounturl = get_site_url().'/my-account';
$user_content = "
<div class='row user-meta ct-no-gutter'>
<h1>Club CCM</h1>
<div class='col-sm-12 welcome'>
<span class='name'>Welcome back, ".$username. "<span class='sign_outbanner' style='float:right;'>
<span class='notYou'>Not you?</span> 
<a href=" .$logouturl." style='text-decoration: none'>Sign Out</a>
</span></span>
<span class='user-group'>
".$user_role."
</span>
<span class='sign_outbanner' style='float:right;'>
<a href=" .$myAccounturl." style='text-decoration: none'>My Account</a>
</span>
</div>
</div>";



if(is_user_logged_in()) {
	$content_user = $user_content;
	$bannerContent = 'bannerContenttext';
}
else 
{
	//$content_user= $content2;
	$content_user= $content_banner;
	$bannerContent = '';
}

global $wp;
$background_image_ccm = carbon_get_theme_option('background_image_ccm');
$bg_img = wp_get_attachment_url($background_image_ccm);
?>
<?php 
$tablinks = carbon_get_theme_option('navigation-bar');
?>
<section class="sp-banner" style="background-image: url(<?php echo $bg_img; ?>)">
	<div class="container wide width1500">
		<div class="the-user">
			<div class="the-user-content <?php echo $bannerContent; ?>"> 
				<?php echo $content_user; ?></div>
			</div>
		</div>
	</section>
	<?php if(!is_user_logged_in()) { ?>
		<div class="bottom_banner"></div>
	<?php } ?>  

	<?php if(is_user_logged_in()) { ?>
		<section class="tabing_btn">
			<div class="main-tab">
				<div class="container">
					<div class="tab row">
						<?php foreach($tablinks as $tablink) { ?>
							<?php 
							$menu_name = $tablink['menu_name'];
							$menu_link = $tablink['menu_link'];
							$status = $tablink['status'];
							if($page_name == $menu_name) {
								$class= ' active';
							} else {
								$class = '';
							}
							if($page_name == ""){
								if(strtolower($post_type) == strtolower($menu_name)) {
									$class= ' active';
								} else {
									$class = '';
								}	
							}
							?>

							<?php if($status == 'show_if_ccm_owner')  { ?>
								<?php if ( (in_array( 'ccm_owner', (array) $user->roles )) || (in_array( 'administrator', (array) $user->roles ) )) { ?>
									<a class="tablinks<?= $class ?>" href="<?= get_site_url().'/'.$menu_link ?>">
										<?= $menu_name ?>
									</a>
								<?php } ?>
							<?php } else if($status == 'show_on_both') { ?>
								<a class="tablinks<?= $class ?>" href="<?= get_site_url().$menu_link ?>">
									<?= $menu_name ?>
								</a>
							<?php } else if($status == 'show_on_logged_out') { ?>
								<?php if(!is_user_logged_in()) { ?>
									<a class="tablinks<?= $class ?>" href="<?= get_site_url().'/'.$menu_link ?>">
										<?= $menu_name ?>
									</a>
								<?php } ?>
							<?php } ?>
						<?php } ?>
					</div>

				</div>
			</div>
			<?php if($page_name == 'Events') { ?>

				<div class="sub-tab">
					<div class="container">
						<div class="news-cat">
							<?php 
							$term_slug = $_GET['c'];
							$term = get_term_by('slug', $term_slug, 'event-category');
							$all_class = '';
							if(!$term) {
								$all_class = 'active';
							}
							?>
							<?php
							$args = array(
								'taxonomy' => 'event-category',
								'orderby' => 'name',
								'order'   => 'ASC'
							);

							$cats = get_categories($args);
							?>
							<a class="<?= $all_class ?>" href="https://www.ccm-motorcycles.com/events/">
								ALL EVENTS
							</a>
							<?php foreach($cats as $cat) { ?>
								<?php 
								$class = '';
								if( $term->name == $cat->name) {
									$class = 'active';
								}
								?>
								<a class="<?= $class ?>" href="https://www.ccm-motorcycles.com/events/category?c=<?= $cat->slug ?>">
									<?php echo $cat->name; ?>
								</a>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
		</section>
	<!-- <section class="tabing_btn">
		<div class="container">
			<div class="tab row">
				<?php foreach($tablinks as $tablink) { ?>
					<?php 
					$menu_name = $tablink['menu_name'];
					$menu_link = $tablink['menu_link'];
					$status = $tablink['status'];
					if($page_name == $menu_name) {
						$class= ' active';
					} else {
						$class = '';
					}
					?>
	
					<?php if($status == 'show_if_ccm_owner')  { ?>
						<?php if ( (in_array( 'ccm_owner', (array) $user->roles )) || (in_array( 'administrator', (array) $user->roles ) )) { ?>
							<button class="tablinks<?= $class ?>" onclick="location.href='<?= $menu_link ?>';">
								<?= $menu_name ?>
							</button>
						<?php } ?>
					<?php } else if($status == 'show_on_both') { ?>
						<button class="tablinks<?= $class ?>" onclick="location.href='<?= $menu_link ?>';">
							<?= $menu_name ?>
						</button>
					<?php } else if($status == 'show_on_logged_out') { ?>
						<?php if(!is_user_logged_in()) { ?>
							<button class="tablinks<?= $class ?>" onclick="location.href='<?= $menu_link ?>';">
								<?= $menu_name ?>
							</button>
						<?php } ?>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	</section> -->
<?php }  ?>
<!-- 
<script>
	function openTab(evt, tabname) {
		console.log(tabname);

		if(tabname == 'Events')
		{
			jQuery('.careers-sc-one').addClass('event_tab');
		}
		else
		{
			jQuery('.careers-sc-one').removeClass('event_tab');
		}
	  // Declare all variables
	  var i, tabcontent, tablinks;

	  // Get all elements with class="tabcontent" and hide them
	  tabcontent = document.getElementsByClassName("tabcontent");
	  for (i = 0; i < tabcontent.length; i++) {
	  	tabcontent[i].style.display = "none";
	  }

	  // Get all elements with class="tablinks" and remove the class "active"
	  tablinks = document.getElementsByClassName("tablinks");
	  for (i = 0; i < tablinks.length; i++) {
	  	tablinks[i].className = tablinks[i].className.replace(" active", "");
	  }

	  // Show the current tab, and add an "active" class to the button that opened the tab
	  document.getElementById(tabname).style.display = "block";
	  evt.currentTarget.className += " active";
	}
</script>

-->

