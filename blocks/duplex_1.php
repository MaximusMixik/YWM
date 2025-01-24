<?php
/*
 * Block: Dulex 1
 * Shows image/video + content
 * 
 * Files to migrate to make this work
 * 
 * sass
 * 
 * 
 * acf
 * 
 * 
 * php
 * helpers/heading-block.php
 * 
 */



/* Heading */

$content = get_sub_field('section_title');

$label = $content['label'];
$content = $content['content'];

$buttonPrimary = get_sub_field('button_primary');
$buttonSecondary = get_sub_field('button_secondary');

/* Media */

$mediaType = get_sub_field('media_type');

    if ($mediaType == 'image') :

        $image = get_sub_field('image');

	elseif ($mediaType == 'video') :

		$videoSource = get_sub_field('video_source');

		if ($videoSource == 'media-library') :

			$video = get_sub_field('video_file');

		elseif ($videoSource == 'vimeo') :

			$video = get_sub_field('video_url');

		endif;
        
    endif; 

/* Settings */

$contentPosition = get_sub_field('content_position');
$contentSize = get_sub_field('content_size');
 
if ($contentSize == '40-content') : 
	$contentCol = 'col-lg-5';
	$mediaCol = 'col-lg-7';
elseif($contentSize == 'equal') : 
	$contentCol = 'col-md-6 ';
	$mediaCol = 'col-md-6 ';
	// $contentCol = 'col-6';
	// $mediaCol = 'col-6';

elseif($contentSize == '60-content') : 
	$contentCol = 'col-lg-7';
	$mediaCol = 'col-lg-5';
else :
	// default
	if ($contentPosition == 'right') :
		$contentCol = 'col-lg-5';
		$mediaCol = 'col-lg-6 offset-lg-1';
	else : 
		$mediaCol = 'col-lg-6 offset-lg-1';
		$contentCol = 'col-lg-5';
	endif;
endif;

/* Video settings */

$videoSettings = get_sub_field('video_settings');

$controls = $videoSettings['enable_controls'];
$autoplay = $videoSettings['enable_autoplay'];
$poster = $videoSettings['custom_poster'];

/* Background settings */

$background_settings = get_sub_field('background_settings');

$background_image = $background_settings['background_image'];
$background_color = $background_settings['background_color'];
$text_color = $background_settings['text_color'];

//var_dump($background_settings);

$sectionMode = '';

if(!$content) return;

?>

<section class="duplex duplex-1 <?php echo $text_color;?> | section" id="duplex-1-<?php echo get_row_index();?>" <?php if ($background_image) : ?>
		style="background-image: url(<?php echo $background_image['url'];?>)"
	<?php endif; ?>>

	<?php if ($background_color || $background_image) : ?>

			<style>
				/** can be mvoed to css */
				#duplex-1-<?php echo get_row_index();?> {
					position: relative;
				}

				/** can be mvoed to css except background color itself */
				#duplex-1-<?php echo get_row_index();?>::before {
					content: "";
					display: block;
					inset: 0;
					width: 100%;
					height: 100%;
					position: absolute;
					background-color: <?php echo $background_color;?>
				}

				/** can be mvoed to css */
				#duplex-1-<?php echo get_row_index();?> .container {
					position: relative;
				}

			</style>

	<?php endif; ?>
	<div class="duplex__container | container ">

        <div class="row duplex__row">

            <?php if ($content) : ?>

                <div class="<?php echo $contentCol;?> duplex__content-wrapper<?php echo ' ' . $contentPosition;?>">

                    <?php render_content_block($label, $content, 'duplex__content ');?>

                    <?php if ($buttonPrimary || $buttonSecondary) : ?>

                        <?php render_buttons_block($buttonPrimary, $buttonSecondary, 'duplex__buttons ');?>

                    <?php endif; ?>

                </div>

            <?php endif; ?>

            <?php if ($image || $video ) : ?>

                <div class="<?php echo $mediaCol;?> duplex__media-wrapper">

                    <?php if($image && $mediaType == 'image') : ?>
                        <img  class="animate zoom-out" <?php acf_image_attrs($image) ?> >
					<?php elseif ($mediaType == 'image'): ?>
						<img class="animate zoom-out" <?php img_src('/placeholder-icon.svg'); ?> alt="placeholder">
					<?php elseif ($mediaType == 'video'): ?>
						<!-- <video src="<?php echo $video;?>"<?php if ($controls) : echo ' controls'; endif; if ($autoplay) : echo ' autoplay muted playsinline'; endif; if ($poster) :?> poster="<?php echo esc_url($poster);?>" <?php endif; ?>></video> -->
						<div class="video-box1" style="margin: 0;">
                            <img class="title-active skip-lazy" src="<?php echo esc_url($poster);?>" fetchpriority="high">
                            <a href="<?php echo $video ?>" class="play-btn popup-video"><i class="fas fa-play"></i></a>
                        </div>
					<?php endif; ?>
                    
                </div>

            <?php endif; ?>
    
        </div>

	</div>
</section>

