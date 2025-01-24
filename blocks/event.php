
<?php
/*
 * Block: Event
 */
$content = get_sub_field('section_title');

$label = $content['label'];
$content = $content['content'];

$buttons = get_sub_field('buttons');

$background = get_sub_field('background');

?>
<section class="event" aria-labelledby="event"> 
	<!--  bgc-neutral-000 box-shadow-2 border-radius-2  -->
	<div class="event__container | container | animate zoom-out fade-in">
					<?php render_content_block($label, $content, 'event__content');?>
					<?php if($buttons): ?>
						<div class="event__buttons | animate  fade-up delay-2">
							<?php foreach($buttons as $button): ?>
								<a <?php acf_link_attrs($button['link']); ?> 
								class="event__button button button--primary">
										<?php echo esc_html($button['link']['title']); ?>
								</a>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
					<img class= "event__bg" <?php acf_image_attrs($background) ?> >
	</div>
</section>
