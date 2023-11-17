<?php
$heading = $page_component['heading'];
$button_type = $page_component['button_type'];
$button_text = $page_component['button_text'];
$button_link = $page_component['button_link'];
$modal_content = $page_component['modal_content'];
$modal_heading = $page_component['modal_heading'];
if($button_type == 'modal') {
    $btn_link = 'data-target="#enquire-now-modal"';
    $class = 'anchor-modal';
} else {
    $btn_link = 'href="'.$button_link.'"';
}

if($button_type == 'target="_blank"') {
    $target = $button_type;
}
?>
<section class="cta-bar" id="<?= $section_id ?>">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <?php if($heading) { ?>
                    <div class="outer mh">
                        <div class="inner">
                            <h2><?php _e($heading) ?></h2>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-sm-4">
                <?php if($button_text) { ?>
                    <div class="outer mh">
                        <div class="inner">
                            <a class="btn-outline-red <?php _e($class) ?>" <?php _e($target) ?> <?php _e($btn_link) ?>> <?php _e($button_text) ?></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php if($button_type == 'modal') { ?>
    <section class="enquire-now-modal" id="enquire-now-modal" page="Blackout">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 exit-col">
					<div class="valign">
						<div class="exit middle text-center">
							<a class="exit-modal" data-target="#enquire-now-modal"><i class="fas fa-times"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-6 contact-form">
					<div class="shortcode valign">
						<div class="middle">
                            <?php if($modal_heading) {?>
                                <div class="heading black medium semibold">
                                    <h2><?php _e($modal_heading) ?></h2>
                                </div>
                            <?php } ?>
							<?php _e(do_shortcode($modal_content)) ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>