<?php 
get_header(); 

$image = get_field('page404_image', 'option') ;
$title = get_field('page404_title', 'option');
$content = get_field('page404_main_content', 'option');
$homepage_button_label  = get_field('page404_homepage_button_label', 'option');
?>


<main class="error-page">
	<section class="error-page__wrapper ">
		<div class="error-page__container | container  text-center">
			<div class="error-page__box">
					<?php if($image): ?>
							<img class="error-page__image" <?php acf_image_attrs($image) ?> >
					<?php endif; ?>

					<h1 class="error-page__title | heading-2">
						<?php echo $title; ?>
					</h1>
			</div>

			<?php if($content): ?>
				<div class="error-page__content">
					<?php echo $content; ?>
				</div>
			<?php endif; ?>

			<?php if($homepage_button_label): ?>
				<a class="error-page__button | button button--primary" href="<?php echo get_home_url() ?>">
					<?php echo $homepage_button_label; ?>
				</a>
			<?php endif; ?>

		</div>
	</section>
</main>

<?php get_footer(); ?>
