<?php

function render_heading_block($label = false, $title = false, $titleTag = 'h2', $descr = false, $mod = '')
{

?>
	<div class="heading-block <?php echo esc_html($mod); ?>">
		<?php if (!empty($label)) { ?>
			<!-- style="margin-bottom: 0.5rem;" -->
			<div class="heading-block__label | animate fade-up label sub-title" >
				<?php echo $label; ?>
			</div>
		<?php }; ?>

		<?php if (!empty($title)) { ?>
			<<?php echo $titleTag;?>  class="heading-block__title | animate fade-up delay-1 <?php if($titleTag == 'h1') : echo 'in';endif; ?>">
				<?php echo esc_html($title); ?>
			</<?php echo $titleTag;?>>
		<?php }; ?>

    <?php if (!empty($descr)) { ?>
      <div class="heading-block__description | animate fade-up delay-2 "><?php echo $descr; ?></div>
    <?php }; ?>
  </div>
<?php
}