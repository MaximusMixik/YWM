<?php
get_header();

$article_title = get_the_title();
?>
 <main class="single">

<?php

$heading = get_field('section_title');

$label = $heading['label'];
$title = $heading['title'] ? $heading['title'] :  $article_title;
$titleTag = $heading['title_tag'];
$content = $heading['content'];

$background = get_field('hero_image');

?>
	<section class="single__hero hero ">
		<?php if($background): ?>
			<img class="hero__background" <?php acf_image_attrs($background) ?>>
		<?php endif; ?>
		<div class="hero__container | container">
			<?php render_heading_block($label, $title, $titleTag, $content, 'hero__content'); ?>
		</div>
	</section>

	<?php
		$article_content = get_the_content();
		if (have_posts() && $article_content) :
			while (have_posts()) : the_post();
	?>
		<section class="single__post single-post | section" > 
			<!-- id="post-<?php the_ID(); ?>" <?php post_class(); ?> -->
				<div class="single-post__container | container">
					<div class="single-post__header  header-single">
						<ul class="header-single__categories categories">
							<?php
								$categories = get_the_category();
								if ($categories) {
										foreach($categories as $category) echo '<li class="button button--primary">' . esc_html($category->name) . '</li>';
								}
								?>
						</ul>
						<h2 class="header-single__title" > 
								<?php echo $article_title; ?>
						</h2>
						<div class="header-single__info ">
							<div class="header-single__author-info">
									<?php
									$author_id = get_the_author_meta('ID');
									$avatar = get_avatar($author_id, 32, '', get_the_author(), array('class' => 'header-single__author-avatar'));
									echo $avatar;
									?>
									<span class="header-single__author">
											Author: <?php the_author(); ?>
									</span>
							</div>

							<span class="header-single__date">
									<?php echo get_the_date('F d/Y'); ?>
							</span>

							<span class="header-single__read-time">
									<?php
									$content = get_the_content();
									$word_count = str_word_count(strip_tags($content));
									$reading_time = ceil($word_count / 200);
									echo $reading_time . ' Min. Read';
									?>
							</span>
						</div>
					</div>

							<?php if($article_content): ?>
								<div class="single-post__content">
									<?php echo $article_content; ?>
								</div>
							<?php endif; ?>


					<div class="single-post__footer footer-single">
						<ul class="footer-single__tags tags">
							<?php
							$post_tags = get_the_tags();
							if ($post_tags) {
									foreach($post_tags as $tag) echo '<li class="button button--accent ">' . esc_html($tag->name) . '</li>';
							}
							?>
						</ul>
						<?php get_template_part('template-parts/social-media-list') ?>
					</div>


				</div>
		</section>
	<?php 
		endwhile;
		endif;?>

<?php // feed section
	$feed_title = get_field('blog_feed_title');
	$feed_link = get_field('blog_feed_link');

	// Get custom option flag
	$custom = get_sub_field('blog_feed_options');

	// Initialize posts query
	$posts_query = null;

if ($custom) {
    // Get custom selected posts
    $custom_posts = get_sub_field('blog_feed_custom');
    
    if ($custom_posts) {
        // Create custom query from selected posts
        $args = array(
            'post_type' => 'post',
            'post__in' => wp_list_pluck($custom_posts, 'ID'),
            'orderby' => 'post__in', // Preserve custom order
            'posts_per_page' => -1
        );
        $posts_query = new WP_Query($args);
    }
} else {
    // Standard query based on settings
    $order_by = get_sub_field('blog_feed_order-by');
    $post_items = get_sub_field('blog_feed_posts');
    $date_order = get_sub_field('blog_feed_date-order');

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $post_items,
        'orderby' => $order_by
    );

    if (in_array($order_by, ['date', 'title', 'relevance'])) {
        $args['order'] = $date_order;
    }
    
    $posts_query = new WP_Query($args);
}

// Exit if no posts found
if (!$posts_query || !$posts_query->have_posts()) return;
?>

<section class="blog-feed ">
		<div class="blog-feed__container | container">
			<?php if($title): ?>
				<div class="blog-feed__header">
					<h2 class="blog-feed__title | heading-3 ">
						<?php echo esc_html($feed_title); ?>
					</h2>
					<a class="blog-feed__button | button button--accent " 
					<?php acf_link_attrs($feed_link); ?> >
					<?php echo esc_html($feed_link['title']); ?>
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 25" width="24" height="25" fill="none">
						<g clip-path="url(#a)">
							<path stroke="#80BB3D" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7.5 7.5L9 20"/>
						</g>
						<defs>
							<clipPath id="a">
								<path fill="#fff" d="M0 0h24v24H0z" transform="translate(0 .5)"/>
							</clipPath>
						</defs>
					</svg>
					</a>
				</div>
			<?php endif; ?>

				<div class="blog-feed__grid | row ">
						<?php while($posts_query->have_posts()): $posts_query->the_post(); ?>
								<div class="blog-feed__item | col-12 col-md-4 col-sm-6">
										<a  href="<?php the_permalink(); ?>" class="blog-card">
												<div class="blog-card__image | mb-32 mb-sm-16">
														<?php if(has_post_thumbnail()): ?>
																<?php the_post_thumbnail('medium'); ?>
														<?php else: ?>
																<img <?php img_src('/placeholder.jpg') ?> alt="placeholder">
														<?php endif; ?>
														<?php $categories = get_the_category(); 
															if ($categories) : ?>
																<ul class="blog-card__categories categories | p-16">
																	<?php	foreach($categories as $category) echo '<li class="button button--primary">' . esc_html($category->name) . '</li>';
																		?>
																</ul>
														<?php endif; ?> 
												</div>
												<div class="blog-card__content">

														<h3 class="blog-card__title | heading-6 mb-32 mb-sm-16">
																<?php the_title(); ?>
														</h3>
														<div class="blog-card__meta | pt-16">
																	<?php
																	$author_id = get_the_author_meta('ID');
																	$avatar = get_avatar($author_id, 32, '', get_the_author(), array('class' => 'blog-card__author-avatar'));
																	echo $avatar;
																	?>
																	<span class="blog-card__author">
																		<!-- Author: Lorem Ipsum -->
																			Author: <?php the_author(); ?>
																	</span>
															<span class="blog-card__date">
																	<?php echo get_the_date('F d/Y'); ?>
															</span>
									
														</div>
												</div>
										</a>
								</div>
						<?php endwhile; ?>
				</div>
		</div>
</section>
<?php wp_reset_postdata(); ?>


	<?php
		$title =  get_field('contact_title','option');
		$text =  get_field('contact_text','option');

		$form =  get_field('contact_form','option');
		if ($form) :
	?>
		<section class="contact-us" >
			<div class="contact-us__container | container ">
				<?php if($title): ?>
				<div class="contact-us__content   ">
					<div class="content-block">
						<div class="content-block__body">
							<h2 class="heading-4">
								<?php echo esc_html($title); ?>
							</h2>
							<p><?php echo esc_html($text); ?></p>
						</div>
					</div>
						<?php get_template_part('template-parts/social-media-list') ?>
				</div>
				<?php endif; ?>

					<div class="contact-us__form form" >
						<?php echo $form; ?>
					</div>

			</div>
		</section>
	<?php endif; ?>

</main>

<?php get_footer(); ?>
