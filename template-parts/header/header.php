<?php
$logo = get_field('site-logo', 'option');
$button = get_field('cta-button', 'option');
?>

<header class="header | bg-neutral-000" id="header">

  <div class="header__container | container">
      <?php if($logo): ?>
        <a class="header__logo | site-logo" href="<?php echo home_url() ?>">
          <img <?php acf_image_attrs($logo) ?> />
        </a>
      <?php endif; ?>
			<div class="header__actions | d-md-none d-lg-flex align-items-center g-60">
						<?php wp_nav_menu([
							'theme_location' => 'header-menu',
							'container' => 'nav',
							'menu_class' => 'header-menu',
							'container_class' => 'header-menu',
						]) ?>

						<?php if($button): ?>
							<a class="header__button | button button--primary" <?php acf_link_attrs($button) ?>>
								<?php echo $button['title'] ?>
							</a>
						<?php endif; ?>
			</div>



      <!-- Mobile Start -->
        <!-- Menu Burger Button -->
        <button class="mobile-menu__toggle | 	 d-md-block d-lg-none | js-mobile-menu-button">
          <span class="js-mobile-open-icon">
            <?php echo get_inline_svg('open-menu-icon.svg') ?>
          </span>
          <span class="js-mobile-close-icon" style="display:none">
            <?php echo get_inline_svg('close-menu-icon.svg') ?>
          </span>
        </button>
        <!-- Menu Burger Button End -->

        <!-- Mobile Menu Start -->
        <div class="mobile-menu | js-mobile-menu" style="display:none">
          <div class="container">
            <div class="mobile-menu__inner">
              <?php wp_nav_menu([
                'theme_location' => 'header-menu',
                'container' => 'nav',
                'menu_class' => 'header-menu',
                'container_class' => 'header-menu',
              ]) ?>

              <?php if($button): ?>
                <a class="header__button mobile-menu__button | button button--primary" <?php acf_link_attrs($button) ?>>
                  <?php echo $button['title'] ?>
                </a>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <!-- Mobile Menu End -->
      <!-- Mobile End -->

  </div>
</header>
