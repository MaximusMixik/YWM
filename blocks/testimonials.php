
<?php
/*
 * Block: Testimonials
 */

$heading = get_sub_field('section_title');

$label = $heading['label'];
$title = $heading['title'];
$titleTag = $heading['title_tag'];
$content = $heading['content'];

$testimonials = get_sub_field('testimonials');

$buttonPrimary = get_sub_field('button_primary');
$buttonSecondary = get_sub_field('button_secondary');

if(!$heading && !$testimonials) return
?>

<section class="testimonials | section" > 
	<div class="testimonials__container | container">

		<?php if ($title) {
			render_heading_block($label, $title, "h2", $content, "testimonials__header ");
		} ?>

		<?php if($testimonials): ?>
		<div class="testimonials__slider | js-testimonials-swiper | animate fade-up delay-2">
			<div class="testimonials__list  | swiper-wrapper">
						<?php foreach ($testimonials as $testimonial):
									$post_id = $testimonial->ID;
									$photo = get_the_post_thumbnail_url($post_id, 'thumbnail');
									$name = get_field('name', $post_id );
									$position = get_field('position', $post_id );
									$content = get_the_content(null, false, $testimonial);
									?>
								<div class="testimonial swiper-slide | p-20 box-shadow-2 border-radius-2 | animate fade-up zoom-out ">
										<div class="testimonial__header">
											<?php if ($photo): ?>
												<div class="testimonial__photo">
													<img  src="<?php echo esc_url($photo); ?>" alt="<?php echo esc_attr($name); ?>">
												</div>
											<?php endif; ?>
											<div class="testimonial__info">
												<?php if ($photo): ?>
													<div class="testimonial__author">
														<?php echo esc_html($name); ?>
													</div>
												<?php endif; ?>
												<?php if ($photo): ?>
													<div class="testimonial__position">
														<?php echo esc_html($position); ?>
													</div>
												<?php endif; ?>
											</div>
										</div>
										<?php if ($content): ?>
											<div class="testimonial__content">
												<?php echo esc_html($content); ?>
											</div>
										<?php endif; ?>
								</div>

						<?php endforeach; ?>
						<?php wp_reset_postdata(); ?>
			</div>
			<?php if(count($testimonials)>1): ?>
				<div class="testimonials__navigation navigation | animate fade-up">
					<div class="navigation__pagination"></div>
				</div>
			<?php endif; ?>
		</div>

		<?php endif; ?>

		<?php if ($buttonPrimary || $buttonSecondary) {
			render_buttons_block($buttonPrimary, $buttonSecondary, "testimonials__buttons");
		} ?>
	</div>

</section>