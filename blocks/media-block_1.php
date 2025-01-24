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

$heading = get_sub_field('section_title');

$label = $heading['label'];
$title = $heading['title'];
$titleTag = $heading['title_tag'];
$content = $heading['content'];

$buttonPrimary = get_sub_field('button_primary');
$buttonSecondary = get_sub_field('button_secondary');

/* Media */

$media = false;
$mediaType = get_sub_field('media_type');

    if ($mediaType == 'image') :

        $image = get_sub_field('image');

        if ($image) : 
            $media = true;
        endif;

	elseif ($mediaType == 'video') :

		$videoSource = get_sub_field('video_source');

		if ($videoSource == 'media-library') :

			$video = get_sub_field('video_file');

            if ($video) : 
                $media = true;
            endif; 

		endif;
        
    endif; 

/* Title settings */

$headingMod = 'heading-block--flexible';

$titleSettings = get_sub_field('title_settings');

$titleAlign = $titleSettings['text_align'];
$titleWidth = $titleSettings['content_width'];
$titleCenterMobile = $titleSettings['center_on_mobile'];

if ($titleAlign) : 
    $headingMod .= ' ' . $titleAlign;
endif;

if($titleWidth) :
    
    if ($titleAlign === 'text-right') : 

        // To handle short title adjusted to the right
        preg_match('/\d+/', $titleWidth, $matches);
        if($titleWidth === 'col-12 col-lg-10') :

            $offset = 2;

        elseif($titleWidth === 'col-12 col-lg-8') :

            $offset = 4;
        
        elseif($titleWidth === 'col-12 col-lg-6') :

            $offset = 6;

        endif;

        $headingMod .= ' ' . $titleWidth . ' offset-lg-' . $offset;
        elseif ($titleAlign === 'text-center') : 

            // To handle short title adjusted to the right
            preg_match('/\d+/', $titleWidth, $matches);
            if($titleWidth === 'col-12 col-lg-10') :

                $offset = 1;

            elseif($titleWidth === 'col-12 col-lg-8') :

                $offset = 2;
            
            elseif($titleWidth === 'col-12 col-lg-6') :

                $offset = 3;

            endif;

            $headingMod .= ' ' . $titleWidth . ' offset-lg-' . $offset;
    else : 
        $headingMod .= ' ' . $titleWidth;
    endif;
endif;

if($titleCenterMobile) :
    $headingMod .= ' center-mobile';
endif;

/* Media settings (Alignment/sise for video/image) */

$mediaSettings = get_sub_field('media_settings');
$mediaMod = '';

$mediaAlign = $mediaSettings['text_align'];
$mediaWidth = $mediaSettings['content_width'];
//$mediaCenterMobile = $mediaSettings['center_on_mobile']; removed because it's full width on mobile

//var_dump($mediaWidth);

if ($mediaAlign) : 
    $mediaMod .= ' ' . $mediaAlign;
endif;

if($mediaWidth) :
    if ($mediaAlign === 'text-right') : 

        if($mediaWidth === 'col-12 col-lg-10') :

            $offset = 2;

        elseif($mediaWidth === 'col-12 col-lg-8') :

            $offset = 3;
        
        elseif($mediaWidth === 'col-12 col-lg-6') :

            $offset = 4;

        endif;
        $mediaMod .= ' ' . $mediaWidth . ' offset-lg-' . $offset;

    elseif ($mediaAlign === 'text-center') : 

        if($mediaWidth === 'col-12 col-lg-10') :

            $offset = 1;

        elseif($mediaWidth === 'col-12 col-lg-8') :

            $offset = 2;
        
        elseif($mediaWidth === 'col-12 col-lg-6') :

            $offset = 3;

        endif;
        $mediaMod .= ' ' . $mediaWidth . ' offset-lg-' . $offset;
    else : 
        $mediaMod .= ' ' . $mediaWidth;
    endif;
endif;

if($titleCenterMobile) :
    $mediaMod .= ' center-mobile';
endif;

/* Buttons settings */

$buttonsSettings = get_sub_field('buttons_settings');
$buttonMod = '';

$buttonAlign = $buttonsSettings['text_align'];
$buttonCenterMobile = $buttonsSettings['center_on_mobile'];

if ($buttonAlign) : 
    $buttonMod .= ' ' . $buttonAlign;
endif;

if($buttonCenterMobile) :
    $buttonMod .= ' center-mobile';
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

if(!$media) return;

?>

<section class="media-block media-block-1 <?php echo $text_color;?> | section" id="media-block-1-<?php echo get_row_index();?>" <?php if ($background_image) : ?>
		style="background-image: url(<?php echo $background_image['url'];?>)"
	<?php endif; ?>>

    <?php if ($background_color || $background_image) : ?>

        <style>
            #media-block-1-<?php echo get_row_index();?> {
                position: relative;
            }

            #media-block-1-<?php echo get_row_index();?>::before {
                content: "";
                display: block;
                inset: 0;
                width: 100%;
                height: 100%;
                position: absolute;
                background-color: <?php echo $background_color;?>
            }

            #media-block-1-<?php echo get_row_index();?> .container {
                position: relative;
            }

        </style>

    <?php endif; ?>


	<div class="media-block__container | container ">

        <div class="media-block__content-row | row">

            <?php if ($title) : ?>

                    <?php render_heading_block($label, $title, $titleTag, $content, $headingMod); ?>

            <?php endif; ?>

        </div>

        <?php if ($image || $video ) : ?>

            <div class="media-block__row | row">

                <div class="media-block__media-wrapper<?php echo $mediaMod;?>  | animate fade-up ">

                    <?php if($image && $mediaType == 'image') : ?>
                        <img <?php acf_image_attrs($image) ?> >
                    <?php elseif ($mediaType == 'image'): ?>
                        <img <?php img_src('/placeholder-icon.svg'); ?> alt="placeholder">
                    <?php elseif ($mediaType == 'video'): ?>
                        <video src="<?php echo $video;?>"<?php if ($controls) : echo ' controls'; endif; if ($autoplay) : echo ' autoplay muted playsinline'; endif; if ($poster) :?> poster="<?php echo esc_url($poster);?>" <?php endif; ?>></video>
                    <?php endif; ?>
                    
                </div>

            </div>

        <?php endif; ?>
    
        <?php if ($buttonPrimary || $buttonSecondary) : ?>

        <?php render_buttons_block($buttonPrimary, $buttonSecondary, $buttonMod);?>

        <?php endif; ?>

	</div>
</section>


