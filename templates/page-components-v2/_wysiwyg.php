<?php
$wysiwyg = $page_component['wysiwyg'];
$heading = $page_component['heading'];
$button_text = $page_component['button_text'];
$button_link = $page_component['button_link'];
?>

<section class="wysiwyg-v2" id="<?= $section_id ?>">
    <div class="container">
        <div class="inner text-center content-margin">
            <?= wpautop($wysiwyg) ?>
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