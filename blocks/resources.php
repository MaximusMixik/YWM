
<?php
/*
 * Block: Resources
 */

$heading = get_sub_field('section_title');
$label = $heading['label'];
$title = $heading['title'];
$titleTag = $heading['title_tag'];
$content = $heading['content'];


$buttonPrimary = get_sub_field('button_primary');
$buttonSecondary = get_sub_field('button_secondary');

$cards = get_sub_field('resources_cards');


if(!$heading  && !$cards) return;
?>

<section class="resources  | section ">
	<div class="resources__container | container">
		<?php if ($heading): ?>
			<div class="resources__header | text-center">
				<?php render_heading_block($label, $title, $titleTag, $content); ?>
				<?php if ($buttonPrimary || $buttonSecondary) {
					render_buttons_block($buttonPrimary, $buttonSecondary, 'info-media__buttons');
					} ?>
			</div>
		<?php endif; ?>
		<?php if ($cards):?>
			<div class="resources__row | gy-20 row  mt-60 mt-md-32">
				<?php 
							$counter = 1;
				foreach($cards as $card):
					$icon = $card['icon'];
					$title = $card['title'];
					$link = $card['link']; 
					
									// animation steps
									if($counter > 3) $counter = 1;
									$animation_classes = '';
									switch($counter){
									case 1: $animation_classes = 'fade-right delay-1';
										break;
									case 2: $animation_classes = 'fade-up delay-2';
										break;
									case 3: $animation_classes = ' fade-left delay-3';
										break;
									}
										$counter++
					?>

					
					<article class="resources__item | col-12 col-md-4 col-sm-6 | animate <?php echo $animation_classes; ?>">
						<a <?php acf_link_attrs($link); ?> class="card">
							<div class="card__image-box">
								<img <?php acf_image_attrs($icon) ?>>
							</div>
							<h3 class="card__heading | heading-4">
								<?php echo esc_html($title); ?>
							</h3>
							<div class="card__button | button button--accent">
								<?php echo esc_html($link['title']); ?>
							</div>
						</a>
					</article>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
