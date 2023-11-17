<?php
$wysiwyg = $page_component['wysiwyg'];
$custom_class = $page_component['custom_class'];
?>
<section class="wysiwyg <?= $custom_class ?>" id="<?= $section_id ?>">
    <div class="container <?= $container_width ?>">
        <div class="paragraph">
            <?= do_shortcode(wpautop($wysiwyg)) ?>
        </div>
    </div>
</section>