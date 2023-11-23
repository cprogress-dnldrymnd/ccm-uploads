<?php
$wysiwyg = $page_component['wysiwyg'];
$button_text = $page_component['button_text'];
$button_link = $page_component['button_link'];
?>

<section class="wysiwyg-v2" <?= $section_id ?>>
    <div class="container">
        <div class="inner text-center content-margin">
            <?= wpautop($wysiwyg) ?>
                <div class="btn-box">
                    <a class="pc-btn" href="<?= $button_link ?>">
                        <?= $button_text ?>
                    </a>
                </div>
        </div>
    </div>
</section>