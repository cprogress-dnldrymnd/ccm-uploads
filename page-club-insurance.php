<?php
/**
    *   Template Name: CLUB CCM: Insurance
*
    *   This page template has a sidebar built into it,
    *   and can be used as a home page, in which case the title will not show up.
*
*/
get_header();
$page_name = 'Club News';
?>
<main class="news careers page-template-page-owners club-news-main club-main">
	<?php include(locate_template('/ccm-club/banner.php')); ?>
	<?php if(is_user_logged_in()) { ?>
		<section class="heading insurance">	
			<div class="container tight width1116">
				<div class="ccm-page-title with-button">
					<h1 class="ccm-title">
						INSURANCE
					</h1>
					<div class="ccm-button small bg-hover">
						<a href=""> <span class="text">GET A QUOTE</span> </a>
					</div>
				</div>
				<div class="sub-content">
					<?php the_content() ?>
				</div>
				<div class="ccm-button with-arrow">
					<a href="">
						<span class="text">
							GET A QUOTE
						</span> 
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="#fff" d="M438.6 278.6l-160 160C272.4 444.9 264.2 448 256 448s-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L338.8 288H32C14.33 288 .0016 273.7 .0016 256S14.33 224 32 224h306.8l-105.4-105.4c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160C451.1 245.9 451.1 266.1 438.6 278.6z"/></svg>
					</a>
				</div>
			</div>
		</section>
		<section class="ccm-team">
			<div class="container tight width1116">
				<div class="team-wrapper">
					<div class="row">
						<div class="col-sm-6">
							<div class="column-holder">
								<div class="image-box">
									<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/Niall-Mackenzie.jpg" alt="">
									<div class="name">
										NIALL<br>MACKENZIE
									</div>
								</div>
								<div class="bio">
									<p>
										Niall Mackenzie had his first GP race in 1984 at the British Grand Prix hosted at the famous Silverstone. This was the start of a successful career in the sport, during which he won the British Superbike Championship three times from 1996 to 1998, having already won the British 250cc and 350cc titles twice earlier in his career.
									</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="column-holder">
								<div class="image-box">
									<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/Neil-Hodgson.jpg" alt="">
									<div class="name">
										NEIL<br>HODGSON
									</div>
								</div>
								<div class="bio">
									<p>
										Neil Hodgson started his GP journey 11 years later in 1995 at the Australian Grand Prix at Eastern Creek. Again, this proved to be the starting block of a successful career in the sport which took Neil all over the world. He won the 2000 British Superbike Championship and became Superbike World Champion in 2003.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="contact-wrapper">
					<div class="custom-row">
						<div class="col-4">
							<div class="column-holder contact-number-holder">
								<a href="tel:03330053100">
									Call <span>0333 0053 100</span>
								</a>
							</div>
						</div>
						<div class="col-8">
							<div class="column-holder office-hours-holder">
								<ul>
									<li>
										<strong>Monday - Friday:</strong> 9:00am - 6:00pm
									</li>
									<li>
										<strong>Saturday: 9:00am</strong> - 1:00pm
									</li>
									<li>
										<strong>Sunday:</strong> Closed 
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>
</main>


<?php get_footer(); // This fxn gets the footer.php file and renders it ?>