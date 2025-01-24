<?php
/*
 * Block: Schedule
 */

$content = get_sub_field('section_title');

$label = $content['label'];
$content = $content['content'];
?>

		<section class="schedule  | section"> 
				<div class="schedule__container | container row">
					<div class="schedule__about | col-12 col-md-7">
							<?php render_content_block($label, $content, 'schedule__content');?>
					</div>
					<div class="schedule__sidebar  | col-12 col-md-5">
						<aside class="sidebar  | animate fade-up">
						<?php 
						$infos = get_sub_field('info_repeater');
						if ($infos):
							foreach ($infos as $info):
								$title = $info['title'];
								$image = $info['image'];
								$text = $info['text'];
								$link = $info['link'];
						?>
							<section class="sidebar__info">
								<?php if ($title): ?>
									<h3 class="sidebar__title | heading-5">
										<?php echo esc_html($title); ?>
									</h3>
								<?php endif; ?>
								<?php if ($image): ?>
									<div class="sidebar__image">
										<img  <?php acf_image_attrs($image); ?>>
									</div>
								<?php endif; ?>
								<?php if ($text): ?>
									<div class="sidebar__text">
											<?php echo esc_html($text); ?>
									</div>
								<?php endif; ?>
								<?php if( $link ): ?>
									<a <?php acf_link_attrs($link) ?> class="sidebar__button | button button--primary">
										<?php echo $link['title']; ?>
									</a>
								<?php endif; ?>
							</section>
						<?php endforeach; endif;  ?>

						</aside>


					</div>
				</div>
		</section>

<?php ?>