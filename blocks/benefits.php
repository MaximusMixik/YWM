<?php
/*
 * Block: Benefits 
 */
		$title = get_sub_field('benefits_title');
		$content = get_sub_field('benefits_content');
?>

<section class="info-media info-media--top"> 
	<div class="info-media__container ">
		<?php if( $title ): ?>
			<div class="info-media__content  ">
				<h2 class="heading-3 | animate fade-up">
					<?php echo esc_html( $title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<?php if ($content ):
			$buttonPrimary = get_sub_field('button_primary');
			$buttonSecondary = get_sub_field('button_secondary');
		?>
			<div class="info-media__body right-media">
				<div class="right-media__content  | animate fade-up delay-2">
					<?php echo wp_kses_post($content); ?>
				</div>
				<?php if ($buttonPrimary || $buttonSecondary) {
					render_buttons_block($buttonPrimary, $buttonSecondary, 'right-media__buttons');
					} ?>
			</div>
		<?php endif; ?>

	</div>
</section>
