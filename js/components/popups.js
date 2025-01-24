jQuery(function ($) {
	class Popups {
		constructor() {
			this.state();
			this.query();
			this.events();
		}

		state() {
			this.currentPopupId = null;
			this.currentPopupType = null;
		}

		query() {
			this.popups = $(".js-popup");
			// Match both #popup- and #video- prefixes
			this.openPopupButtons = $("[href^='#popup-'], [href^='#video-']");
			this.closePopupButtons = $(".js-popup-close");
		}

		events() {
			this.openPopupButtons.click(this.openPopup.bind(this));
			this.closePopupButtons.click(this.closePopup.bind(this));

			// Close on clicking outside
			this.popups.each((i, popup) => {
				popup.addEventListener('click', (e) => {
					const dialogDimensions = popup.getBoundingClientRect();
					if (
						e.clientX < dialogDimensions.left ||
						e.clientX > dialogDimensions.right ||
						e.clientY < dialogDimensions.top ||
						e.clientY > dialogDimensions.bottom
					) {
						this.closePopup();
					}
				});
			});

			// Handle ESC key
			$(document).keydown((e) => {
				if (e.key === 'Escape') {
					this.closePopup();
				}
			});
		}

		openPopup(event) {
			event.preventDefault();
			const $button = $(event.currentTarget);
			const href = $button.attr("href");

			// Determine popup type and ID
			if (href.startsWith('#video-')) {
				this.currentPopupType = 'video';
				this.currentPopupId = href.replace("#video-", "");
			} else {
				this.currentPopupType = 'popup';
				this.currentPopupId = href.replace("#popup-", "");
			}

			this.update();

			// Additional handling for video popups
			if (this.currentPopupType === 'video') {
				this.handleVideoPopup();
			}
		}

		handleVideoPopup() {
			const videoPopup = document.querySelector(`#video-${this.currentPopupId}`);
			const videoContainer = videoPopup.querySelector('.popup__inner');

			// Here you can add specific video handling logic
			// For example, auto-playing the video, setting up video players, etc.
		}

		closePopup() {
			// Cleanup for video if needed
			if (this.currentPopupType === 'video') {
				const videoPopup = document.querySelector(`#video-${this.currentPopupId}`);
				// Add any cleanup logic for videos here
			}

			this.currentPopupId = null;
			this.currentPopupType = null;
			this.update();
		}

		update() {
			this.currentPopupId ? this.showCurrentPopup() : this.hideAllPopups();
		}

		showCurrentPopup() {
			const selector = this.currentPopupType === 'video'
				? `#video-${this.currentPopupId}`
				: `#popup-${this.currentPopupId}`;

			const activePopup = document.querySelector(selector);
			if (activePopup) {
				activePopup.showModal();
				// Add active class for styling if needed
				activePopup.classList.add('is-active');
			}
		}

		hideAllPopups() {
			this.popups.each((i, el) => {
				el.close();
				// Remove active class
				el.classList.remove('is-active');
			});
		}
	}

	new Popups();
});