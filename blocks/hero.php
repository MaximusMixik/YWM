<?php
/*
 * Block: Hero
 */
$heading = get_sub_field('section_title');

$label = $heading['label'];
$title = $heading['title'];
$titleTag = $heading['title_tag'];
$content = $heading['content'];

$content_position =  get_sub_field('hero_content_position');

$background = get_sub_field('hero_image');
$full_height = get_sub_field('full_screen_hero_height');

if(!$heading)  return ;

?>

<section class="hero <?php echo "hero--" . $content_position ?>" <?php echo !$full_height ? 'style="min-height: 0;"' : '' ?>>
	<?php if($background): ?>
<!-- 		<img class="hero__background" <?php acf_image_attrs($background) ?> class="skip-lazy" fetchpriority="high"> -->
		<img fetchpriority="high" <?php awesome_acf_responsive_image($background['id'],'large','1920px'); ?> alt="<?php echo $background['alt'] ?: $background['title']; ?>" data-no-lazy="1" class="hero__background no-lazy skip-lazy" width="1920" height="615">
	<?php endif; ?>
	<div class="hero__container | container ">
		<?php render_heading_block($label, $title, $titleTag, $content, 'hero__content'); ?>
	</div>
</section>

