<?php
$image = $page_component['image'];
$heading = $page_component['heading'];
$description = $page_component['description'];
$button_text = $page_component['button_text'];
$button_link = $page_component['button_link'];
?>
<section class="background-section" id="<?= $section_id ?>" style="background-image: url(<?= wp_get_attachment_image_url($image, 'full') ?>)">
    <div class="container">
        <div class="inner text-center content-margin">
            <?php if ($heading) { ?>
                <div class="heading-box">
                    <h2 class="mt-0">
                        <?= $heading ?>
                    </h2>
                </div>
            <?php } ?>
            <?php if ($description) { ?>
                <div class="description-box">
                    <?= wpautop($description) ?>
                </div>
            <?php } ?>
            <?php if ($button_text) { ?>
                <div class="btn-box">
                    <a class="pc-btn" href="<?= $button_link ?>">
                        <?= $button_text ?>
                    </a>
                </div>
            <?php } ?>

        </div>
    </div>
</section>