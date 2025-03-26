<?php
/*
 * Block: Pricing
 */
$switch = get_sub_field('default_block_values');
if (!$switch) {
	// without prefix
$heading = get_sub_field('section_title');
$label = $heading['label'];
$title = $heading['title'];
$titleTag = $heading['title_tag'];
$content = $heading['content'];

$selected_pricing = get_sub_field('pricing_list');
$custom = get_sub_field('show_custom');
} else{
$label = get_field('pricing_label', 'option');
$title = get_field('pricing_title', 'option');
$titleTag = get_field('pricing_title_tag', 'option');
$content = get_field('pricing_content', 'option');

$selected_pricing = get_field('pricing_list', 'option');
$custom = get_field('show_custom', 'option');
}


if ($selected_pricing && $custom) {
$pricing_posts = $selected_pricing;
} else {
$args = array(
'post_type' => 'pricings',
	'posts_per_page' => -1,
	'meta_key' => 'price',
	'orderby' => 'meta_value_num',
	'order' => 'ASC',
	'post_status' => 'publish',
	'meta_type' => 'NUMERIC',
);

$query = new WP_Query($args);
$pricing_posts = $query->posts;
}

$posts_count = count($pricing_posts);

if( !$pricing_posts) return
?>

	<section class="pricing | section <?php echo $posts_count < 3 ? 'pricing--duplex' : ''; ?>">
			<div class="pricing__container | container ">
					<?php if ($title){ 
							render_heading_block($label, $title, $titleTag, $content, "pricing__header"); 
					};?>

					<ul class="pricing__list | row mt-36 gy-24">
							<?php
							$primary_number = get_sub_field("primary_item") ? get_sub_field("primary_item") : 1;
							$primary_item = intval($primary_number - 1);
							
							
							

							foreach ($pricing_posts as $key => $post) :

									//echo get_post_status($post_id) . get_the_title();
								
									setup_postdata($post);
									$is_primary = $key === $primary_item;
									
									$price = get_field('price', $post->ID);
									$advantages_list = get_field('advantages_list', $post->ID);
									$link = get_field('link', $post->ID);

									// animation steps
									if($counter > 3) $counter = 1;
									$animation_classes = '';
									switch($counter){
									case 1: $animation_classes = 'fade-right ';
										break;
									case 2: $animation_classes = 'fade-up delay-1';
										break;
									case 3: $animation_classes = ' fade-left delay-2';
										break;
									}
										$counter++;
							?>

									<li class="pricing-card <?php echo $is_primary ? 'pricing-card--accent' : ''; ?> | col-lg-4 col-sm-6 | animate <?php echo $animation_classes; ?> ">
											<article class="pricing-card__wrapper | py-32 px-24 box-shadow-2 border-radius-2 ">
													<div class="pricing-card__content">
															<h3 class="pricing-card__title | heading-5">
																	<?php echo get_the_title($post->ID); ?>
															</h3>

															<?php if ($price) : ?>
															<div class="pricing-card__price | heading-3">
																	<?php echo esc_html($price); ?>
															</div>
															<?php endif; ?>

															<?php if ($advantages_list) : ?>
															<ul class="pricing-card__advantages">
																	<?php foreach ($advantages_list as $advantage) : ?>
																			<li class="pricing-card__advantages-item">
																					<span class="pricing-card__advantages-icon <?php echo $is_primary ? 'pricing-card__advantages-icon--accent' : ''; ?>"></span>
																					<?php echo esc_html($advantage['item']); ?>
																			</li>
																	<?php endforeach; ?>
															</ul>
															<?php endif; ?>
													</div>

													<?php if ($link) : ?>
													<a class="pricing-card__button | button <?php echo $is_primary ? 'button--accent' : 'button--primary'; ?>" 
														href="<?php echo esc_url($link['url']); ?>"
														target="<?php echo esc_attr($link['target']); ?>">
															<?php echo esc_html($link['title']); ?>
													</a>
													<?php endif; ?>
											</article>
									</li>
							<?php endforeach; 
							wp_reset_postdata(); ?>
					</ul>
			</div>
	</section>

	<style>
		.pricing--duplex .pricing__list{
			justify-content: center;
		}

		.pricing--duplex .pricing-card--accent {
			padding-bottom: 0;
			padding-top: 
		}

		@media (min-width: 49rem) {
			.pricing--duplex .pricing__container {
				display: flex;
				align-items: center;
				width: 100%;
				max-width: 1920px
			}
			
			.pricing--duplex .col-lg-4 {
				width: 50%;
				max-width: calc(370px + 24px + 24px);
			}
			
			.pricing--duplex .pricing__list{
				max-width: calc(100% - 42%);
				padding-right: 8.75rem;
			}
			
			.pricing--duplex .pricing__header {
				padding-left: 15px;
				padding-right: 35px;
				max-width: 42%;
				text-align: left;
				padding: 5.375rem 2.8% 5.375rem 9.7%;
				margin-left: 0;
			}
		}
	</style>