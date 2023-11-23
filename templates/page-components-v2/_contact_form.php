<?php
$heading = $page_component['heading'];
$description = $page_component['description'];
$contact_form = $page_component['contact_form'];
?>

<section class="overview contact-form-holder v2" id="<?= $section_id ?>">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6">
                <div class="inner">
                    <div class="heading-box">
                        <h2><?= $heading ?></h2>
                    </div>
                    <div class="description-box">
                        <?= wpautop($description) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-form">
                    <?= $contact_form ?>
                </div>
            </div>
        </div>
    </div>
</section>