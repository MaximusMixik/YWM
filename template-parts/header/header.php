<?php
$logo = get_field('site-logo', 'option');
$button = get_field('cta-button', 'option');
?>

<header data-lp class="header | bg-neutral-000" id="header">

  <div class="header__container | container">
      <?php if($logo): ?>
        <a class="header__logo | site-logo" href="<?php echo home_url() ?>">
          <img <?php acf_image_attrs($logo) ?> />
        </a>
      <?php endif; ?>
		<div class="header__menu menu">
			<button type="button" aria-label="burger menu" class="menu__icon icon-menu">
				<span></span>
			</button>
			<div class="menu__body">
					<?php wp_nav_menu([
							'theme_location' => 'header-menu',
							'container' => 'nav',
							'container_class' => 'menu__nav',
							'menu_class' => 'menu__list',
						]) ?>

						<?php if($button): ?>
							<a class="menu__btn | button button--primary" <?php acf_link_attrs($button) ?>>
								<?php echo $button['title'] ?>
							</a>
						<?php endif; ?>
			</div>
		</div>

  </div>
</header>
