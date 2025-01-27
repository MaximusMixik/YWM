<?php
/*
 * Block: Event translation
 */

$media = false;
$mediaType = get_sub_field('media_type');

    if ($mediaType == 'image') :
        $image = get_sub_field('image');
        $image_mobile = get_sub_field('image_mobile');

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

		elseif ($mediaType == 'code') :
			$code = get_sub_field('code');
				if ($code) $media = true;


		endif; 

$buttonPrimary = get_sub_field('button_primary');
$buttonSecondary = get_sub_field('button_secondary');
?>

<section class="event-translation">
	<div class="event-translation__media">
		<?php if($image && $mediaType == 'image') : ?>
			<img class="d-sm-none d-md-block "  <?php acf_image_attrs($image) ?> >
			<img class="d-none d-sm-block d-md-none" <?php acf_image_attrs($image_mobile) ?> >
		<?php elseif ($mediaType == 'image'): ?>
			<img <?php img_src('/placeholder-icon.svg'); ?> alt="placeholder">
		<?php elseif ($mediaType == 'video'): ?>
			<video src="<?php echo $video;?>"<?php if ($controls) : echo ' controls'; endif; if ($autoplay) : echo ' autoplay muted playsinline'; endif; if ($poster) :?> poster="<?php echo esc_url($poster);?>" <?php endif; ?>></video>
		<?php elseif ($mediaType == 'code'): ?>
			<?php echo $code; ?>
		<?php endif; ?>
	</div>

	<div class="event-translation__container | container ">
		<?php render_buttons_block($buttonPrimary, $buttonSecondary, "event-translation__buttons ");?>
	</div>

</section>

