<?php
$heading = $page_component['heading'];
$columns = $page_component['columns'];
$number_of_columns = $page_component['number_of_columns'];
?>
<section class="columns" <?= $hide_heading ?> id="<?= $section_id ?>">
    <div class="container new-bike-col config-bikes">
        <?php if ($heading && !$hide_heading) { ?>
            <div class="row">
                <h1><?php _e($heading) ?> </h1>
            </div>
        <?php } ?>
        <div class="row">
            <?php foreach ($columns as $column) { ?>
                <div class="<?php _e($number_of_columns) ?>">
                    <div class="bike">
                        <?php if ($column['image']) { ?>
                            <div class="bike-img">
                                <img alt="<?php _e($column['heading']) ?>"
                                    src="<?php _e(wp_get_attachment_image_url($column['image'], 'large')) ?>"
                                    class="img-responsive" />
                            </div>
                        <?php } ?>
                        <?php if ($column['heading']) { ?>
                            <h3 class="mh"><?php _e($column['heading']) ?></h3>
                        <?php } ?>
                        <?php if ($column['button_text'] || $column['button_text_2']) { ?>
                            <div class="button-box">
                                <?php if ($column['button_text'] && $column['button_link']) { ?>
                                    <a class="btn-outline-red btn-outline-black" href="<?php _e($column['button_link']) ?>"><?php _e($column['button_text']) ?> </a>
                                <?php } ?>
                                <?php if ($column['button_text_2'] && $column['button_link_2']) { ?>
                                    <a class="btn-outline-red" href="<?php _e($column['button_link_2']) ?>"><?php _e($column['button_text_2']) ?> <i class="fas fa-wrench"></i></a>
                                <?php } ?>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>