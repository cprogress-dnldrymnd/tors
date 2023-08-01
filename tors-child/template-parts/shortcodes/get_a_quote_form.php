<?php
$get_a_quote_form = carbon_get_theme_option('get_a_quote_form');
?>

<div class="get-a-quote-form">
  <div class="row">
    <?php foreach ($get_a_quote_form as $key => $form) { ?>
      <div class="col-lg-4">
        <input type="checkbox" name="instruments[]" id="instrument-<?= $key ?>">
        <label for="instrument-<?= $key ?>" class="d-flex align-items-center">
          <div class="image-box">
            <img src="<?= wp_get_attachment_image_url($form['image'], 'medium') ?>" alt="<?= $form['name'] ?>">
          </div>
          <div class="name-box">
            <?= $form['name'] ?>
          </div>
          <div class="plus-minus-box">

          </div>
        </label>
      </div>
    <?Php } ?>
  </div>
</div>