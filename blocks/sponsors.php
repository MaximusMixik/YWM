
<?php
/*
 * Block: Sponsors
 */
$switch = get_sub_field('default_block_values');
if(!$switch){
$heading = get_sub_field('section_title');
$label = $heading['label'];
$title = $heading['title'];
$titleTag = $heading['title_tag'];
$content = $heading['content'];


$buttonPrimary = get_sub_field('button_primary');
$buttonSecondary = get_sub_field('button_secondary');

$sponsors = get_sub_field('sponsors_list');
}
else{
$label = get_field('sponsors_label', 'option');
$title = get_field('sponsors_title', 'option');
$titleTag = get_field('sponsors_title_tag', 'option');
$content = get_field('sponsors_content', 'option');


$buttonPrimary = get_field('sponsors_button_primary', 'option');
$buttonSecondary = get_field('sponsors_button_secondary', 'option');

$sponsors = get_field('sponsors_list', 'option');
}

if(!$title  && !$sponsors) return;
?>

<section class="info-media"> 
	<div class="info-media__container ">
		<!-- , 'info-media__content' -->
		<?php if ($title): ?>
			<div class="info-media__content">
				<?php render_heading_block($label, $title, $titleTag, $content); ?>
				<?php if ($buttonPrimary || $buttonSecondary) {
					render_buttons_block($buttonPrimary, $buttonSecondary, 'info-media__buttons');
					} ?>
			</div>
			<?php endif; ?>


		<?php if (!empty($sponsors)):
			$sponsors_bg = get_sub_field('sponsors_bg');
			?>
			<div class="info-media__body sponsors-preview">
					<ul class=" sponsors-preview__list ">
						<?php foreach ($sponsors as $sponsor) : 
						$post_id = $sponsor->ID;
						$name = get_the_title($post_id);
						$image = get_the_post_thumbnail_url($post_id, 'full');
						$terms = wp_get_post_terms($post_id, 'sponsors_level');
						$level = !empty($terms) && !is_wp_error($terms) ? $terms[0]->name : '';
						?>
						<li class=" sponsors-preview__item  sponsor-label | animate zoom-out">
							<div class="sponsor-label__image ">
								<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($name); ?>">
							</div>
							<div class="sponsor-label__category">
								<?php echo esc_html($level); ?>
							</div>
						</li>
							<?php endforeach; wp_reset_postdata(); ?>
					</ul>
					<?php if($sponsors_bg): ?>
						<img class=" sponsors-preview__bg" src="<?php echo esc_url($sponsors_bg['url']); ?>" alt="<?php echo esc_attr($sponsors_bg['alt']); ?>">
					<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>