<?php
$heading = $page_component['heading'];
$items = $page_component['item'];
?>


<section class="accordion-section" id="<?= $section_id ?>">
    <div class="container">
        <div class="inner">
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="inner">
                        <div class="heading-box">
                            <h2><?= $heading ?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="accordion-holder">
                        <?php foreach ($items as $item) { ?>
                            <div class="accordion-item">
                                <div class="accordion-heading">
                                    <h3>
                                        <?= $item['accordion_title'] ?>
                                    </h3>
                                    <span class="icon"></span>
                                </div>
                                <div class="accordion-content">
                                    <div class="inner">
                                        <?= wpautop($item['accordion_description']) ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>