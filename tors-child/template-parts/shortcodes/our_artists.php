<?php
$args = array(
  'post_type'      => 'recordings',
  'posts_per_page' => -1,
);
$query = new WP_Query($args);

?>

<?php if ($query->have_posts()) { ?>
  <div class="our-recordings">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <?php while ($query->have_posts()) { ?>
          <?php
          $query->the_post();
          $artist = get_the_terms(get_the_ID(), 'artists')[0]->name;
          $background_image = get_the_post_thumbnail_url( get_the_ID(), 'large' );
          ?>
          <!-- Swiper -->
          <div class="swiper-slide">
            <div class="recording-box" style="background-image: url(<?= $background_image ?>)">
              <div class="name-box">
                <h3><?= $artist ?></h3>
              </div>
              <div class="title-box">
                <span><?php the_title() ?></span>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php
        wp_reset_postdata();
        ?>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </div>
<?php }
else { ?>
  <div class="no-post">
    <p>No recordings found</p>
  </div>
<?php } ?>