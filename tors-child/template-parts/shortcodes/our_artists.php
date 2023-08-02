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
                      <div class="audio-box" id="before-audio-<?= get_the_ID() ?>">
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
      container: document.getElementById($id),
      waveColor: 'rgb(255, 255, 255)',
      progressColor: 'rgb(0, 0, 0)',
      barWidth: 3,
      barRadius: 2s,
      barGap: 1,
      url: $url,
      peaks: [
        [
          0, 0.0023595101665705442, 0.012107174843549728, 0.005919494666159153, -0.31324470043182373, 0.1511787623167038,
          0.2473851442337036, 0.11443428695201874, -0.036057762801647186, -0.0968964695930481, -0.03033737652003765,
          0.10682467371225357, 0.23974689841270447, 0.013210971839725971, -0.12377244979143143, 0.046145666390657425,
          -0.015757400542497635, 0.10884027928113937, 0.06681904196739197, 0.09432944655418396, -0.17105795443058014,
          -0.023439358919858932, -0.10380347073078156, 0.0034454423002898693, 0.08061369508504868, 0.026129156351089478,
          0.18730352818965912, 0.020447958260774612, -0.15030759572982788, 0.05689578503370285, -0.0009095853311009705,
          0.2749626338481903, 0.2565386891365051, 0.07571295648813248, 0.10791446268558502, -0.06575305759906769,
          0.15336275100708008, 0.07056761533021927, 0.03287476301193237, -0.09044631570577621, 0.01777501218020916,
          -0.04906218498945236, -0.04756792634725571, -0.006875281687825918, 0.04520256072282791, -0.02362387254834175,
          -0.0668797641992569, 0.12266506254673004, -0.10895221680402756, 0.03791835159063339, -0.0195105392485857,
          -0.031097881495952606, 0.04252675920724869, -0.09187793731689453, 0.0829525887966156, -0.003812957089394331,
          0.0431736595928669, 0.07634212076663971, -0.05335947126150131, 0.0345163568854332, -0.049201950430870056,
          0.02300390601158142, 0.007677287794649601, 0.015354577451944351, 0.007677287794649601, 0.007677288725972176,
        ],
      ],
    })

    wavesurfer.on('interaction', () => {
      wavesurfer.play()
    })

    wavesurfer.on('finish', () => {
      wavesurfer.setTime(0)
    })
  }

</script>