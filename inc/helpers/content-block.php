<?php

function render_content_block($label = false, $content = false, $mod = '')
	{
			if ($content) { ?>
					<div class="content-block  <?php echo esc_html($mod); ?>">
						<?php if ($label) : ?>
								<!-- style="margin-bottom: 0.5rem;" -->
								<div class="content-block__sub-title sub-title | animate fade-up" >
										<?php echo esc_html($label); ?>
								</div>
						<?php endif; ?>
						<div class="content-block__body | animate fade-up">
							<?php echo $content; ?>
						</div>
					</div>
			<?php
			}
	}
?>
