<?php
/*
 * Block: Logo Slider
 */

$logos = get_array_value($args, 'logo-slider', get_sub_field('logo-slider'));

if(!$logos || empty($logos)) {
  return get_template_part('template-parts/error/invalid-block', '', [
    'title' => 'Logo Slider is empty'
  ]);
}

?>

<section class="logo-slider | section">
  <div class="container">
    <div class="js-logo-slider">
      <div class="swiper-wrapper">

        <?php foreach ($logos as $logo): ?>
          <div class="swiper-slide">
            <img <?php acf_image_attrs($logo) ?> />
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
</section>
