<?php
/*
 * Block: FAQ
 */

$content = get_sub_field('section_title');

$label = $content['label'];
$content = $content['content'];

$faqs = get_sub_field('faq__list');

$buttonPrimary = get_sub_field('button_primary');
$buttonSecondary = get_sub_field('button_secondary');

if (!$content) return;
?>

<section class="info-media info-media--top"> 
	<div class="info-media__container ">
		<div class="info-media__content">
			<!-- , 'info-media__content' -->
			<?php render_content_block($label, $content);?>
			<?php if ($buttonPrimary || $buttonSecondary) {
				render_buttons_block($buttonPrimary, $buttonSecondary, 'info-media__buttons');
				} ?>
		</div>

		<?php if (!empty($faqs)): ?>
			<div class="info-media__body faq">
				<div class="faq__list ">
					<?php foreach ($faqs as $faq): ?>
						<details class="accordion | animate fade-up">
							<summary class="accordion__button">
								<h3 class="accordion__title ">
									<?php echo esc_html($faq['title']); ?>
								</h3>
								<div class="accordion__icon">
									<?php echo get_inline_svg('accordion-icon.svg') ?>
								</div>
							</summary>
							<div class="accordion__dropdown">
								<div class="accordion__content">
									<?php echo wp_kses_post($faq['content']); ?>
								</div>
							</div>
						</details>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>