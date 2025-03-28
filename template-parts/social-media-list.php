<?php 

/**
 * Quick export from Myhat - not tested yet.
 * Please update the description, after tests with any projects
 * 
 * For dev: I've added in theme facebook icon only
 */

$socials = get_field('social_media_list','option');

if ($socials) : ?>

    <ul class="social-media | animate fade-up">

        <?php foreach ($socials as $social) : 
        
        $socialMedia = $social['social_media'];
        $socialURL = $social['social_media_url'];

        if ($socialURL) : 
        ?>
        <li class="social-media__item">
          <a class="social-media__link" aria-label="<?php  echo esc_attr($socialMedia); ?>" href="<?php echo $socialURL;?>" target="_blank">
            <?php echo get_inline_svg($socialMedia . '.svg');?>
						<title><?php  echo esc_html($socialMedia); ?></title>
          </a>
        </li>
        <?php endif; ?>
        <?php endforeach; ?>
        
    </ul>

<?php endif; ?>
