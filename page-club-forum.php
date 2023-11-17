<?php
/**
    *   Template Name: CLUB CCM: Forum
*
    *   This page template has a sidebar built into it,
    *   and can be used as a home page, in which case the title will not show up.
*
*/
get_header();
$page_name = 'Forum';
$user = wp_get_current_user();
if($user->roles[0] == 'administrator' || $user->roles[0] == 'ccmowner') {
	$user_type = 'owner';
} else {
	$user_type = 'subscriber';
}
?>
<main class="news careers page-template-page-owners club-main">
	<?php include(locate_template('/ccm-club/banner.php')); ?>
	<?php if(is_user_logged_in()) { ?>
		<section class="heading">	
			<div class="container tight width1116">
				<div class="title-box">
					<h1 class="title">
						Owners' Forum
					</h1>
				</div>
				<div class="sub-content">
					<?php the_content() ?>
					<div data-toggle="modal" data-target="#forumRules"  data-keyboard="false">
						<span class="cs-btn">
							FORUM RULES
						</span>
					</div>
				</div>
			</div>
		</section>
		<section class="forum-topic careers-sc-one">
			<div class="container tight width1116">
				<div class="row">
					<div id="Forum">
						<div class="container forum_form">
							<hr>
							<?php if($_GET['fourms'] == '') { ?>
								<?php echo do_shortcode('[bbp-forum-index]');?>
							<?php } else { ?>
								<?php echo do_shortcode('[bbp-single-forum id='.$_GET['fourms'].']');?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php }  ?>
</main>
<?php 
$forum_rule_heading = carbon_get_the_post_meta('forum_rule_heading');
$forum_rule_content = carbon_get_the_post_meta('forum_rule_content');
 ?>
<div class="modal fade" id="forumRules">
	<div class="modal-dialog">
		<div class="modal-content story-popup">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2 class="modal-title"><?= $forum_rule_heading ?></h2>
			</div>
			<div class="modal-body">
				<?= wpautop( $forum_rule_content ) ?>
			</div>
        <!--<div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>-->
  </div>
</div>
</div>



<?php get_footer(); // This fxn gets the footer.php file and renders it ?>