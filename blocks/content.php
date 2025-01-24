<?php
/*
 * Block: Content block
 * Shows just content and adds some flexibility to control it
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

/* Settings */

$add_inner_box = get_sub_field('add_inner_box');
$inner_box_class = $add_inner_box ? "project-inner-box" : "";

/* Settings */

$contentSettings = get_sub_field('content_settings');
//var_dump($contentSettings);

//echo '<br>';

$textAlign = $contentSettings['text_align'];
$contentWidth = $contentSettings['content_width'];
$centerMobile = $contentSettings['center_on_mobile'];

if($centerMobile) :
    $headingMod .= ' center-mobile';
endif;

//echo $textAlign;

if ($textAlign == 'text-right') :

    if ($contentWidth === 'col-12 col-lg-10') : 
        $contentCol = 'col-12 col-lg-10 offset-lg-2';
    elseif ($contentWidth === 'col-12 col-lg-8') : 
        $contentCol = 'col-12 col-lg-8 offset-lg-4';
    elseif ($contentWidth === 'col-12 col-lg-6') : 
        $contentCol = 'col-12 col-lg-6 offset-lg-6';
    else : 
        $contentCol = 'col-12';
    endif; 

elseif($textAlign == 'text-center') :

    if ($contentWidth === 'col-12 col-lg-10') : 
        $contentCol = 'col-12 col-lg-10 offset-lg-1';
    elseif ($contentWidth === 'col-12 col-lg-8') : 
        $contentCol = 'col-12 col-lg-10 offset-lg-2';
    elseif ($contentWidth === 'col-12 col-lg-6') : 
        $contentCol = 'col-12 col-lg-6 offset-lg-3';
    else : 
        $contentCol = 'col-12';
    endif; 

else : 

    $contentCol = $contentWidth;

endif; 

/* Background settings */

$background_settings = get_sub_field('background_settings');

$background_image = $background_settings['background_image'];
$background_color = $background_settings['background_color'];
$text_color = $background_settings['text_color'];

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
?>

<section class="content-block__section <?php echo $text_color;?> | section" id="content-block-<?php echo get_row_index();?>" <?php if ($background_image && $add_inner_box === false) : ?>
                        style="background-image: url(<?php echo $background_image['url'];?>)"
                    <?php endif; ?>>
    <?php if ($background_color && $add_inner_box ) : ?>
	<style>
        #content-block-<?php echo get_row_index();?> .project-inner-box {
            position: relative;
        }
		#content-block-<?php echo get_row_index();?> .project-inner-box::before {
            content: "";
            display: block;
            inset: 0;
            width: 100%;
            height: 100%;
            position: absolute;
			background-color: <?php echo $background_color;?>
		}

        #content-block-<?php echo get_row_index();?> .content-block {
            position: relative;
        }
	</style>
    <?php elseif ($background_color || $background_image) : ?>

        <?php if (!$add_inner_box) : ?>

            <style>
                #content-block-<?php echo get_row_index();?> {
                    position: relative;
                }

                #content-block-<?php echo get_row_index();?>::before {
                    content: "";
                    display: block;
                    inset: 0;
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    background-color: <?php echo $background_color;?>
                }

                #content-block-<?php echo get_row_index();?> .content-block {
                    position: relative;
                }

            </style>

        <?php endif; ?>

    

	<?php endif; ?>
	<div class="content-block__container | container">

        <div class="row content-block__row<?php echo ' ' . $textAlign;?>">

            <?php if ($content) : ?>

                <div class="<?php echo $contentCol;?> content-block__content-wrapper">

                    <div class="<?php echo $inner_box_class . $headingMod;?>" <?php if ($background_image && $add_inner_box) : ?>
                        style="background-image: url(<?php echo $background_image['url'];?>)"
                    <?php endif; ?>>

                    <?php render_content_block($label, $content);?>

                    <?php if ($buttonPrimary || $buttonSecondary) : ?>

                        <?php render_buttons_block($buttonPrimary, $buttonSecondary, "content-block__buttons $buttonMod");?>

                    <?php endif; ?>

                    </div>

                </div>

            <?php endif; ?>
    
        </div>

	</div>
</section>


