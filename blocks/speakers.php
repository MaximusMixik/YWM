<?php
/*
 * Block: Speakers
 */

$heading = get_sub_field('section_title');
$label = $heading['label'];
$title = $heading['title'];
$titleTag = $heading['title_tag'];
$content = $heading['content'];

$members = get_sub_field('members');


$buttonPrimary = get_sub_field('button_primary');
$buttonSecondary = get_sub_field('button_secondary');

if(!$title && !$members) return;
?>

<section class="info-media"> 
	<!-- | container container--wide -->
	<div class="info-media__container ">

		<?php if ($heading): ?>
			<div class="info-media__content">
				<!-- , "info-media__content" -->
				<?php render_heading_block($label, $title, $titleTag, $content); ?>
				<?php if ($buttonPrimary || $buttonSecondary) {
				render_buttons_block($buttonPrimary, $buttonSecondary, 'info-media__buttons');
				} ?>
			</div>
		<?php endif; ?>

		<?php if (!empty($members)): ?>
			<div class="info-media__body">
				<ul class="experts | animate fade-left">
					<?php foreach ($members as $member) : 
					$name = get_the_title($member->ID);
					$position = get_field('position', $member->ID);
					$image = get_field('image', $member->ID);
					?>
						<li class="experts__member ">
							<!-- <a href="<?php echo get_permalink($member->ID); ?>" class="experts__link"> -->
								<?php if (!empty($image)) : ?>
									<img data-no-lazy="1" class="experts__photo"
										src="<?php echo esc_url($image['url']); ?>"
										alt="<?php echo esc_attr($image['alt']); ?>">
								<?php endif; ?>

								<div class="experts__about">
									<?php if (!empty($name)) : ?>
										<h3 class="experts__name | heading-5">
											<?php echo esc_html($name); ?>
										</h3>
									<?php endif; ?>
									<?php if (!empty($position)) : ?>
										<div class="experts__position">
											<?php echo esc_html($position); ?>
										</div>
									<?php endif; ?>
								</div>
							<!-- </a> -->
						</li>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
				</ul>
			</div>
		<?php endif; ?>
	</div>
</section>