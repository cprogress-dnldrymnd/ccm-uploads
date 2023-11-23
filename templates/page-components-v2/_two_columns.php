<?php
$wysiwyg = $page_component['wysiwyg'];
$image = $page_component['image'];
$heading = $page_component['heading'];
$description = $page_component['description'];
$button_text = $page_component['button_text'];
$button_link = $page_component['button_link'];
$button_link = $page_component['button_link'];
?>


<section class="two-columns-8-4">
    <div class="container">
        <div class="inner">
            <div class="row g-5">
                <div class="col-lg-8">
                    <div class="image-box">
                        <img src="<?= wp_get_attachment_image_url($image, 'full') ?>">
                    </div>
                </div>
                <div class="col-lg-4 content-margin">
                    <?php if ($heading) { ?>
                        <div class="heading-box">
                            <h3>
                                <?= $heading ?>
                            </h3>
                        </div>
                    <?php } ?>
                    <?php if ($heading) { ?>
                        <div class="description-box">
                            <?= wpautop($description) ?>
                        </div>
                    <?php } ?>
                    <?php if ($button_text) { ?>
                        <div class="btn-box btn-bordered">
                            <a href="<?= $button_link ?>" class="pc-btn"><?= $button_text ?></a>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>