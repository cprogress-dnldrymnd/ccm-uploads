<?php
$buttons = $page_component['buttons'];
?>


<section class="footer-buttons">
    <div class="row g-0">
        <?php foreach ($buttons as $key => $button) { ?>
          
            <div class="col-6">
                <a href="<?= $button['button_link'] ?>" class="<?= $key == 0 ? 'light-blue' : 'light-gray' ?>">
                    <span><?= $button['button_text'] ?></span>
                    <span class="icon"></span>
                </a>
            </div>

        <?php } ?>
    </div>
</section>