
<?php
/*
 * Block: Contact Us
 */

$switch = get_sub_field('default_block_values');
if(!$switch){
$content = get_sub_field('section_title');

$label = $content['label'];
$content = $content['content'];

$buttonPrimary = get_sub_field('button_primary');
$buttonSecondary = get_sub_field('button_secondary');

$form = get_sub_field('form');
}
else{
$label = get_field('contact_label', 'option');
$content = get_field('contact_content', 'option');

$buttonPrimary = get_field('contact_button_primary', 'option');
$buttonSecondary = get_field('contact_button_secondary', 'option');

$form = get_field('form', 'option');
}

if (!$form || !$content) return;
?>

<section class="contact-us" id="form">
	<div class="contact-us__container | container | animate zoom-out fade-up">
		<?php if($content): ?>
		<div class="contact-us__content ">
			<?php render_content_block($label, $content,);?>
			<?php if ($buttonPrimary || $buttonSecondary) {
				render_buttons_block($buttonPrimary, $buttonSecondary, 'info-media__buttons');
				} ?>
				<?php get_template_part('template-parts/social-media-list') ?>

		</div>
		<?php endif; ?>
		<?php if($form): ?>
			<div class="contact-us__form form  | animate fade-up " >
				<?php echo $form; ?>
			</div>
		<?php endif; ?>

	</div>
</section>