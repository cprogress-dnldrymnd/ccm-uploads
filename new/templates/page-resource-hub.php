<?php
/**
    *   Template Name: RESOURCE HUB
*
    *   This page template has a sidebar built into it,
    *   and can be used as a home page, in which case the title will not show up.
*
*/
get_header();
?>


<?php 
$args_wp = array(
	'post_type' => 'bikes',
	'posts_per_page' => -1,
	'post_status' => 'publish'
);

$wp_query_bikes = new WP_Query($args_wp);

$bike_options = '<option value="">Select a bike</option>';
while ($wp_query_bikes->have_posts()) {
	$wp_query_bikes->the_post();
	$bike_options .= '<option value="'.get_the_ID().'">'. get_the_title() .'</option>';
}
wp_reset_postdata();

?>

<main id="resource-hub-main">
	<section class="dropdowns">
		<div class="container wide width1200">
			<div class="heading-box">
				<h1>
					Resource Hub
				</h1>
			</div>
			<form action="" method="GET" id="resource-hub-form">
				<div class="row no-margin">
					<div class="col-md-6">
						<div class="form-group">
							<select class="form-control" name="bike_id" id="bike_id">
								<?= $bike_options ?>
							</select>
						</div>

					</div>
					<div class="col-md-6">
						<div class="form-group">
							<select class="form-control" name="resource_type" id="resource_type">
								<option value="">Select a resource type</option>
								<option value="Photos">Photos</option>
								<option value="Videos">Videos</option>
								<option value="PDF">PDF</option>
							</select>
						</div>
					</div>
				</div>
			</form>
			<div id="results">
				<div class="row no-margin result-row">
					<h2>
						Please select a bike.
					</h2>
				</div>
			</div>
		</div>
	</section>
</main>
<script>
	function forceDownload(link){
		var url = link.getAttribute("data-href");
		var fileName = link.getAttribute("download");
		link.innerText = "Downloading...";
		var xhr = new XMLHttpRequest();
		xhr.open("GET", url, true);
		xhr.responseType = "blob";
		xhr.onload = function(){
			var urlCreator = window.URL || window.webkitURL;
			var imageUrl = urlCreator.createObjectURL(this.response);
			var tag = document.createElement('a');
			tag.href = imageUrl;
			tag.download = fileName;
			document.body.appendChild(tag);
			tag.click();
			document.body.removeChild(tag);
			link.innerText="Download";
		}
		xhr.send();

	}
</script>

<?php get_footer(); ?>
