<section class="ui-kit-popups | section section--small">
  <h1 class="heading-1">
    Popups <a href="https://blog.webdevsimplified.com/2023-04/html-dialog/">Reference</a>
  </h1>

  <div class="flex-group | mt-16">
    <button class="button button--primary" data-popup="popup-1">
      Popup #1
    </button>
    <button class="button button--primary" data-popup="popup-2">
      Popup #2
    </button>

		<button type="button" data-popup="video-3" class="sponsor__button | button button--primary">
				<?php esc_html_e('Video-Popup #3', 'ywm'); ?>
		</button>
  </div>


  <dialog class="popup | js-popup" id="popup-1" data-lenis-prevent>
    <button type="button" class="popup__close | js-popup-close">
      <?php echo get_inline_svg('close-icon.svg') ?>
    </button>

    <div class="popup__inner">
      <h2 class="heading-2">
        Popup #1
      </h2>

      <div class="mt-32">
        <p>
          Maria Theresia Ahlefeldt (16 January 1755 – 20 December 1810) was a Danish, (originally German), composer. She is known as the first female composer in Denmark. Maria Theresia composed music for several ballets, operas, and plays of the royal theatre. She was given good critic as a composer and described as a “virkelig Tonekunstnerinde” ('a True Artist of Music').
        </p>
      </div>
    </div>
  </dialog>

  <dialog class="popup | js-popup" id="popup-2" data-lenis-prevent>
    <button type="button" class="popup__close | js-popup-close">
      <?php echo get_inline_svg('close-icon.svg') ?>
    </button>

    <div class="popup__inner">
      <h2 class="heading-2">
        Popup #2
      </h2>

      <div class="mt-32">
        <p>
          Maria Theresia Ahlefeldt (16 January 1755 – 20 December 1810) was a Danish, (originally German), composer. She is known as the first female composer in Denmark. Maria Theresia composed music for several ballets, operas, and plays of the royal theatre. She was given good critic as a composer and described as a “virkelig Tonekunstnerinde” ('a True Artist of Music').
        </p>
      </div>
    </div>
  </dialog>
	<dialog class="popup popup--video | js-popup" id="video-3" data-lenis-prevent>
		<button type="button" class="popup__close | js-popup-close">
			<?php echo get_inline_svg('close-icon.svg') ?>
		</button>
		<div class="popup__video">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/6Fv-wbsIA2s?si=Odohf1VpBDmD3aRW" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
		</div>
	</dialog>

</section>
