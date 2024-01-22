<?php

function tors_logo()
{
  ob_start();
  get_template_part('template-parts/shortcodes/tors_logo');
  return ob_get_clean();
}

add_shortcode('tors_logo', 'tors_logo');

function get_a_quote_form()
{
  ob_start();
  get_template_part('template-parts/shortcodes/get_a_quote_form');
  return ob_get_clean();
}

add_shortcode('get_a_quote_form', 'get_a_quote_form');


function our_artists()
{
  ob_start();
  get_template_part('template-parts/shortcodes/our_artists');
  return ob_get_clean();
}


add_shortcode('our_artists', 'our_artists');

function artists_audio()
{

  
?>
  <div class="audio-box-wrapper">
    <?php if ($before_audio) { ?>
      <div class="audio-box-holder d-flex align-items-center">
        <div class="audio-label">
          Before:
        </div>
        <div class="audio-box before-audio" id="before-audio-<?= get_the_ID() ?>">
        </div>
      </div>
    <?php } ?>
    <?php if ($after_audio) { ?>
      <div class="audio-box-holder d-flex align-items-center">
        <div class="audio-label">
          After:
        </div>
        <div class="audio-box" id="after-audio-<?= get_the_ID() ?>">
        </div>
      </div>
    <?php } ?>
  </div>
<?php
}