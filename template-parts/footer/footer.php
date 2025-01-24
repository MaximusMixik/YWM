<?php
$logo = get_field('footer-logo', 'option');

$menu = [
    'menu' => wp_nav_menu([
      'theme_location' => 'footer-menu',
      'echo' => false,
    ])
];

?>

<footer class="footer" id="footer">
	<div class="footer__container | container">
		<?php if($logo): ?>
			<a class="footer__logo" href="<?php echo home_url() ?>">
				<img <?php acf_image_attrs($logo) ?> />
			</a>
      <?php endif; ?>
      <div class="footer__menu">
            <?php echo $menu['menu'] ?>
      </div>
  </div>
</footer>


<?php the_field('footer_scripts', 'option') ?>
