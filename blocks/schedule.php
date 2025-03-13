<?php
/*
 * Block: Schedule
 */

$content = get_sub_field('section_title');

$label = $content['label'];
$content = $content['content'];
?>

		<section class="schedule"> 
				<div class="schedule__container | container row">
					<div class="schedule__about | col-12 col-md-7">
						<?php render_content_block($label, $content); ?>
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
<style>
@media (min-width: 768px) {
    .wcs-timetable__compact-list .wcs-day .wcs-timetable__classes::before {
        border-left: 1px solid #80BB3D4D;
    }
}

@media (min-width: 768px) {
    .wcs-timetable__compact-list .wcs-class__time {
        width: 100%;
				text-align: left;
				padding: 0 2vh;
}	
	.wcs-timetable__compact-list .wcs-class {
		flex-wrap: wrap;
	}
	
	.wcs-timetable__compact-list .wcs-class {
		padding-bottom: 16px;
		padding-top: 16px;
	}
	.wcs-class {
	position: relative;
}

.wcs-class::before,
.wcs-timetable__compact-list .wcs-class:not(.wcs-class--canceled):hover::before{
	content: "";
	position: absolute;
	left: -6px;
	top: -6px;
	width: 11px;
	height: 11px;
	background-color: #80BB3D;
	border-radius: 50%;
	opacity: 1;
}
}




.wcs-timetable__compact-list .wcs-class--visible::after {
	display: none;
}

.wcs-timetable__compact-list .wcs-day .wcs-timetable__classes::before {
	border-top: 0;
}

.wcs-class__title {
	margin-bottom: 16px !important;
}

.wcs-day__date {
	color: #80BB3D;
	font-size: 26px;
	font-weight: 600;
}

.wcs-timetable__compact-list .wcs-day--visible:not(:last-child)::after {
	opacity: 0;
}</style>

<?php ?>