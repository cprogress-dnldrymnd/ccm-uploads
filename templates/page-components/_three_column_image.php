<?php
$image_1 = $page_component['image_1'];
$image_2 = $page_component['image_2'];
$image_3 = $page_component['image_3'];
?>
<section class="three-column-image" id="<?= $section_id ?>">
    <div class="container-fluid p-0">
        <div class="row flex-row no-gutters">
            <div class="col-md-4">
                <div class="inner">
                    <div class="img cvr ctr" style="<?= get_bg_image($image_1, 'large') ?>"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="inner">
                    <div class="img cvr ctr" style="<?= get_bg_image($image_2, 'large') ?>"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="inner">
                    <div class="img cvr ctr" style="<?= get_bg_image($image_3, 'large') ?>"></div>
                </div>
            </div>
        </div>
    </div>
</section>
