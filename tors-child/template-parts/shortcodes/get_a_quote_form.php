<?php
$get_a_quote_form = carbon_get_theme_option('get_a_quote_form');
?>

<div class="get-a-quote-form">
  <div class="instruments">
    <div class="row">
      <?php foreach ($get_a_quote_form as $key => $form) { ?><div class="col-lg-4">
        <input type="checkbox" name="instruments[]" id="instrument-<?= $key ?>">
        <label for="instrument-<?= $key ?>" class="d-flex align-items-center justify-content-between label-box">
          <div class="image-holder">
            <div class="image-box">
              <img src="<?= wp_get_attachment_image_url($form['image'], 'medium') ?>" alt="<?= $form['name'] ?>">
            </div>
          </div>
          <div class="name-icon-box d-flex align-items-center justify-content-between">
            <div class="name-box">
              <?= $form['name'] ?>
            </div>
            <div class="plus-minus-box">

            </div>
          </div>
        </label>
      </div>
      <?Php } ?>
    </div>
  </div>
  <div class="form-box">
    <div class="instrument-selection">
      
    </div>
    <div class="form">
      <?= do_shortcode( '[contact-form-7 id="734" title="Get A Quote"]' ) ?>
    </div>
  </div>
</div>