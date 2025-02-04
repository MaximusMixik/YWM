<?php
/*
 * Block: Info
 */

$title = get_sub_field('info__title');
$infos = get_sub_field('info__list');
$link = get_sub_field('info__link');

if(!$title && !$infos) return ;

?>

<section class="info | animate zoom-out" aria-labelledby="info"> 
	<div class="info__container | container  ">

		<?php if($title): ?>
			<h2 class="info__title | heading-6 clr-neutral-1000" id="info"> 
				<?php echo $title ?>
			</h2>
		<?php endif; ?>

		<ul class="info__column column-info">
			<?php foreach ($infos as $info): ?>
				<li class="column-info__item">

					<div class="column-info__row">
							<img class="column-info__icon" <?php acf_image_attrs($info['icon']); ?>>

							<div class="column-info__title | clr-neutral-1000">
								<?php echo  $info['title']; ?>
							</div>

					</div>

					<div class="column-info__content | mt-12 clr-neutral-1000">
						<?php echo $info['text'] ?>
					</div>

				</li>
			<?php endforeach; ?>
		</ul>
		<?php if( $link ): ?>
				<a class="info__button | button button--primary" <?php acf_link_attrs($link) ?>>
					<?php echo $link['title']; ?>
				</a>
		<?php endif; ?>

	</div>
</section>

