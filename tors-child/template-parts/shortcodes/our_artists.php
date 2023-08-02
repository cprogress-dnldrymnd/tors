<?php
$args = array(
  'post_type'      => 'recordings',
  'posts_per_page' => -1,
);
$query = new WP_Query($args);

?>

<?php if ($query->have_posts()) { ?>
  <div class="our-recordings">
    <div class="swiper mySwiperRecordings">
      <div class="swiper-wrapper">
        <?php while ($query->have_posts()) { ?>
          <?php
          $query->the_post();
          $artist = get_the_terms(get_the_ID(), 'artists')[0]->name;
          $background_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
          $before_audio = carbon_get_the_post_meta('before_audio');
          $after_audio = carbon_get_the_post_meta('after_audio');
          ?>
          <!-- Swiper -->
          <div class="swiper-slide">
            <div class="recording-box" style="background-image: url(<?= $background_image ?>)">
              <div class="inner">
                <div class="name-box">
                  <h3><?= $artist ?></h3>
                </div>
                <div class="title-box">
                  <span><?php the_title() ?></span>
                </div>
                <div class="audio-box-wrapper">
                  <?php if ($before_audio) { ?>
                    <div class="audio-box-holder d-flex align-items-center">
                      <div class="label">
                        Before:
                      </div>
                      <div class="audio-box before-audio" id="before-audio-<?= get_the_ID() ?>">
                      </div>
                    </div>
                  <?php } ?>
                  <?php if ($after_audio) { ?>
                    <div class="audio-box-holder d-flex align-items-center">
                      <div class="label">
                        Before:
                      </div>
                      <div class="audio-box" id="after-audio-<?= get_the_ID() ?>">
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="text-box">
              <?= wpautop(get_the_content()) ?>
            </div>

          </div>
        <?php } ?>
        <?php
        wp_reset_postdata();
        ?>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
<?php }
else { ?>
  <div class="no-post">
    <p>No recordings found</p>
  </div>
<?php } ?>

<script>

  <?php
  while ($query->have_posts()) {
    $query->the_post();

    $before_audio = carbon_get_the_post_meta('before_audio');
    $after_audio = carbon_get_the_post_meta('after_audio');

    if ($before_audio) {
      ?>
      $id = 'before-audio-<?= get_the_ID() ?>';
      $before_audio_url = '<?= wp_get_attachment_url($before_audio); ?>';
      wavesurfer($id, $before_audio_url);
      <?php
    }
    if ($after_audio) {
      ?>
      $id = 'after-audio-<?= get_the_ID() ?>';
      $after_audio_url = '<?= wp_get_attachment_url($after_audio); ?>';
      wavesurfer($id, $after_audio_url);
      <?php
    }

  }
  wp_reset_postdata();
  ?>

  function wavesurfer($id, $url) {
    // With pre-decoded audio data
    const wavesurfer = WaveSurfer.create({
      "container": document.getElementById($id),
      "height": 30,
      "splitChannels": false,
      "normalize": true,
      "waveColor": "#6e6e6d",
      "progressColor": "#ffffff",
      "cursorColor": "#ddd5e9",
      "cursorWidth": 4,
      "barWidth": 4,
      "barGap": 3,
      "barRadius": 30,
      "barHeight": null,
      "minPxPerSec": 1,
      "fillParent": true,
      "url": $url,
      "autoplay": false,
      "interact": true,
      "hideScrollbar": false,
      "audioRate": 1,
      "autoScroll": true,
      "autoCenter": true,
      "sampleRate": 8000
    })

    wavesurfer.on('interaction', () => {
      wavesurfer.play()
    })

    wavesurfer.on('finish', () => {
      wavesurfer.setTime(0)
    })
  }

</script>