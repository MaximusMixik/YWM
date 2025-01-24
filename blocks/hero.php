<?php
/*
 * Block: Hero
 */
$heading = get_sub_field('section_title');

$label = $heading['label'];
$title = $heading['title'];
$titleTag = $heading['title_tag'];
$content = $heading['content'];

$background = get_sub_field('hero_image');

if(!$heading)  return ;

?>

<section class="hero ">
	<?php if($background): ?>
		<img class="hero__background" <?php acf_image_attrs($background) ?>>
	<?php endif; ?>
	<div class="hero__container | container">
		<?php render_heading_block($label, $title, $titleTag, $content, 'hero__content'); ?>
	</div>
</section>

