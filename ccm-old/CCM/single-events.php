<?php
/**
    *   Template Name: Club CCM Event Single *
    *   This page template has a sidebar built into it,
    *   and can be used as a home page, in which case the title will not show up.*
*/
get_header();
$page_name = 'Events';
$reg_users = get_field('users');
$current_user =  wp_get_current_user();



$user_id =  $current_user->ID;
$first_name =  $current_user->user_firstname ;
$last_name =  $current_user->user_lastname ;
$email =  $current_user->user_email;
$phone = get_user_meta( $user_id, 'billing_phone', true );

$shipping_postcode = get_user_meta( $current_user->ID, 'shipping_postcode', true );

$reg_ids = array(); 



foreach($reg_users as $reg_user) {
	$reg_ids[] = $reg_user['user'];
/*	$reg_user_id = $reg_user['user'];
	if($reg_user_id == $user_id) {
		$first_name = $reg_user['first_name'];
		$last_name = $reg_user['last_name'];
		$email = $reg_user['email'];
		$phone = $reg_user['phone'];
	}*/
}
if(!in_array($user_id, $reg_ids)) {
	$message = 'Register to this event';
} else {
	$message = 'You are already registered to this event';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$method = $_POST['method'];
	if($method == 'add' && !in_array($user_id, $reg_ids)) {
		$first_name =  $_POST['first_name'];
		$last_name =  $_POST['last_name'];
		$email =  $_POST['email'];
		$phone =  $_POST['phone'];
		$row = array(
			'user' => $user_id,
			'first_name'   => $first_name,
			'last_name'  => $last_name,
			'email'  => $email,
			'phone'  => $phone,
		);
		add_row('users', $row, get_the_ID());
		$message = 'Successfully Registered';
	} else if($method == 'delete'){
		$method = $_POST['method'];
		$row = array(
			'user' => $user_id,
		);
		delete_row('users', 1, get_the_ID());
		$message = 'Successfully Unregistered<span> You can register again by filling up the form below.</span>';
	} 
} else {
	if(!in_array($user_id, $reg_ids)) {
		$message = 'Register to this event';
	} else {
		$message = 'You are already registered to this event';
	}
}
?>

<main class="news careers page-template-page-owners events-main club-main">
	<?php include(locate_template('/ccm-club/banner.php')); ?>
	<?php if(is_user_logged_in()) { ?>
		<?php if ( have_posts() ) { ?>
			<?php while ( have_posts() ) { ?>
				<?php the_post(); ?>
				<?php
				$the_thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );
				if($the_thumb) {
					$thumb = $the_thumb;
				} else {
					$thumb = 'https://www.ccm-motorcycles.com/wp-content/uploads/2020/03/IMG_2243-2.jpeg';
				}
				$start = carbon_get_the_post_meta( 'crb_event_start' ); 
				$end = carbon_get_the_post_meta('crb_event_end');
				$get_the_title = get_the_title();
				$start = carbon_get_the_post_meta( 'crb_event_start' );
				$end = carbon_get_the_post_meta( 'crb_event_end' );
				?>
				<section class="events-section-banner">
					<div class="container tight width1116">
						<div class="row">
							<div class="col-md-2">
								<div class="m-d-y-a-name">
									<div class="m-d-y">
										<h3 class="m-n"><?php echo date( 'M', strtotime( $start ) ); ?></h3>
										<h2 class="d-n"><?php echo date( 'd', strtotime( $start ) ); ?></h2>
										<h3 class="y-n"><?php echo date( 'Y', strtotime( $start ) ); ?></h3>
										<h2 class="to">TO</h2>
										<h3 class="m-n"><?php echo date( 'M', strtotime( $end ) ); ?></h3>
										<h2 class="d-n"><?php echo date( 'd', strtotime( $end ) ); ?></h2>
										<h3 class="y-n"><?php echo date( 'Y', strtotime( $end ) ); ?></h3>
									</div>
									<div class="a-name">
										<span>Starts<br><?php echo date( 'H:i', strtotime( $start ) ); ?></span>
									</div>
								</div>
							</div>
							<div class="col-md-10">
								<div class="img ctr cvr" style="background-image: url(<?= $thumb ?>)">
									<div class="inner">
										<div class="title-box">
											<h2>
												<?= $get_the_title ?>
											</h2>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="post-content">
					<div class="container tight width1116">
						<div class="row">
							<div class="col-md-2">

							</div>
							<div class="col-md-10">
								<div class="the-content">
									<?php the_content() ?>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="event-register" id="register">
					<div class="container tight width1116">
						<div class="row">
							<div class="col-md-2">

							</div>
							<div class="col-md-10">
								<?= do_shortcode('[contact-form-7 id="4135" title="Event Registration"]') ?>
								<div class="the-form">
									<h2>
										<?= $message ?> 
									</h2>
									<?php if ($message != 'Successfully Registered' && $message != 'You are already registered to this event') { ?>
										<form action="<?= get_the_permalink().'#register' ?>" method="post" id="event-register">
											<input type="hidden" name="method" value="add">
											<input type="hidden" name="event_name" value="<?= get_the_title() ?>">
											<input type="hidden" name="subject" value="Event Registration for">
											<input type="hidden" name="reg_status" value="registered">
											<div class="form-group">
												<input type="text" placeholder="First Name" class="form-control" name="first_name" value="<?= $first_name ?>" required>
											</div>

											<div class="form-group">
												<input type="text" placeholder="Last Name" class="form-control" name="last_name" value="<?= $last_name ?>" required>
											</div>

											<div class="form-group">
												<input type="email" placeholder="Email address" class="form-control" name="email" value="<?= $email ?>" required>
											</div>

											<div class="form-group">
												<input type="number" placeholder="Phone" class="form-control" name="phone" value="<?= $phone ?>" required>
											</div>
											<div class="form-group">
												<input type="text" placeholder="Postcode" class="form-control" name="postcode" value="<?= $shipping_postcode ?>" required>
											</div>
											
											<div class="form-group">
												<input type="submit" id="event-reg-btn" class="form-control" value="Register">
											</div>
										</form>
									<?php } else { ?>
										<?php if($message == 'Successfully Registered') { ?>
											<h4> Thanks for registering your interest in this event. We will be in touch with further details. In the meantime, you can contact us at <a href="mailto: events@ccm-motorcycles.net">events@ccm-motorcycles.net</a> if you have any further questions. </h4>
										<?php } ?>
										<p> Click the button below to cancel your registration.</p>
										<form action="<?= get_the_permalink().'#register' ?>" method="post" id="event-register">
											<input type="hidden" name="method" value="delete">
											<input type="hidden" name="event_name" value="<?= get_the_title() ?>">
											<input type="hidden" name="subject" value="User Unregistered for">
											<input type="hidden" name="reg_status" value="unregistered">

											<input type="hidden" placeholder="First Name" class="form-control" name="first_name" value="<?= $first_name ?>" required>

											<input type="hidden" placeholder="Last Name" class="form-control" name="last_name" value="<?= $last_name ?>" required>

											<input type="hidden" placeholder="Email address" class="form-control" name="email" value="<?= $email ?>" required>

											<input type="hidden" placeholder="Phone" class="form-control" name="phone" value="<?= $phone ?>" required>
											<input type="hidden" placeholder="Postcode" class="form-control" name="postcode" value="<?= $shipping_postcode ?>" required>
											<div class="form-group">
												<input type="submit" id="event-reg-btn" class="form-control" value="Cancel Registration">
											</div>
										</form>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="back text-center">
					<div class="container tight width1116">
						<div class="row">
							<div class="col-md-2">

							</div>
							<div class="col-md-10">
								<a class="btn ghost-btn red-b" href="https://www.ccm-motorcycles.com/events/">BACK TO EVENTS</a>
							</div>
						</div>
					</div>
				</section>
			<?php } ?>
		<?php } ?>
	<?php } ?>
</main>

<?php get_footer(); // This fxn gets the footer.php file and renders it ?>