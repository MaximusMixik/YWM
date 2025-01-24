
<?php
/*
 * Block: Sponsors info
 */

?>

<section class="sponsors "> 
	<div class="sponsors__container | container">
		<?php
					$level_order = array('platinum', 'gold', 'silver', 'bronze');
					$counter_id = 0;
					
					foreach ($level_order as $level) {
							$args = array(
									'post_type' => 'sponsors',
									'posts_per_page' => -1,
									'tax_query' => array(
											array(
													'taxonomy' => 'sponsors_level',
													'field' => 'slug',
													'terms' => $level
											)
									)
							);
							
							$sponsors_query = new WP_Query($args);
							$sponsors_count = $sponsors_query->found_posts;

							if ($sponsors_query->have_posts()) : ?>

									<div class="sponsors__group">
										<h2 class="sponsors__title  | animate fade-up">
											<?php echo ucfirst($level); ?> 
											<?php 
											// echo $sponsors_count === 1 ? 'Sponsor' : 'Sponsors';
											$sponsors_text= _n('Sponsor', 'Sponsors', $sponsors_count, 'ywm');
											printf(esc_html($sponsors_text), $sponsors_count);
											
											?>
										</h2>
											<ul class="sponsors__list">
													<?php
													while ($sponsors_query->have_posts()) : $sponsors_query->the_post(); 
															$image = get_the_post_thumbnail_url(get_the_ID(), 'full');
															$title = get_the_title();
															$excerpt = get_the_excerpt();
															$content = get_the_content();

															$check_content = strlen(strip_tags($content)) <= 50 ;

															$video = get_field('video');
															$has_video = (bool)$video;
													?>

												<li class="sponsors__item">
													<article class="sponsor">
														<div class="sponsor__image | border-radius-2 box-shadow-2  | animate fade-right delay-2">
																	<img src="<?php echo esc_url($image); ?>" alt="">
															</div>
															<div class="sponsor__content animate fade-left delay-3">
																<h3 class="sponsor__title | heading-4">
																	<?php echo esc_html($title); ?>
																</h3>
																<?php if($excerpt ) : ?>
																	<div class="sponsor__excerpt">
																		<?php echo !$check_content ? $excerpt : $content;	?>
																	</div>
																<?php endif; ?>
																<div class="sponsor__buttons">

																	<?php if( $has_video  ) : ?>
																		<a href="#video-<?php echo ++$counter_id ?>"class="sponsor__button |  button button--primary" >
																			<?php esc_html_e('view video', 'ywm' ); ?>
																		</a>
																	<?php endif; ?>

																	<?php if( !$check_content ) : ?>
																		<a href="#popup-<?php echo $counter_id ?>" type="button" class="sponsor__button | button ">
																			<?php esc_html_e('Read More', 'ywm' ); ?>
																		</a>
																	<?php endif; ?>

																</div>
															</div>
													</article>
													<?php if( $has_video  ) : ?>
														<dialog class="popup popup--video | js-popup" id="video-<?php echo $counter_id ?>" data-lenis-prevent>
															<button type="button" class="popup__close | js-popup-close">
																<?php echo get_inline_svg('close-icon.svg') ?>
															</button>
															<div class="popup__video">
																		<?php echo $video;	?>
															</div>
														</dialog>
													<?php endif; ?>

													<?php if(!$check_content ) : ?>
														<dialog class="popup | js-popup" id="popup-<?php echo $counter_id ?>" data-lenis-prevent>
															<button type="button" class="popup__close | js-popup-close">
																<?php echo get_inline_svg('close-icon.svg') ?>
															</button>
																<div class="popup__header">
																	<div class="popup__label   | sponsor-label sponsor-label--small">
																		<div class="sponsor-label__image ">
																			<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($name); ?>">
																		</div>
																		<div class="sponsor-label__category">
																			<?php echo esc_html($level); ?>
																		</div>
																	</div>
																	<h2 class="popup__title | heading-3">
																		<?php echo esc_html($title); ?>
																	</h2>
															</div>
															<div class="popup__content">
																		<?php echo wp_kses_post($content); ?>
															</div>
														</dialog>
													<?php endif; ?>

												</li>
											<?php endwhile; ?>
									</ul>
							</div>
					<?php endif; wp_reset_postdata();} ?>
	</div>
</section>