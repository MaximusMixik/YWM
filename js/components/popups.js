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
			this.htmlElement = document.documentElement; // Сохраняем ссылку на html элемент
		}

		query() {
			this.popups = $(".js-popup");
			this.openPopupButtons = $("[data-popup]");
			this.closePopupButtons = $(".js-popup-close");
		}

		events() {
			this.openPopupButtons.click(this.openPopup.bind(this));
			this.closePopupButtons.click((e) => {
				e.preventDefault();
				this.closePopup();
			});

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
						e.preventDefault();
						this.closePopup();
					}
				});
			});

			// Handle ESC key
			$(document).keydown((e) => {
				if (e.key === 'Escape') {
					e.preventDefault();
					this.closePopup();
				}
			});
		}

		openPopup(event) {
			event.preventDefault();
			const $button = $(event.currentTarget);
			const popupId = $button.data("popup");

			if (popupId.startsWith('video-')) {
				this.currentPopupType = 'video';
				this.currentPopupId = popupId.replace("video-", "");
			} else {
				this.currentPopupType = 'popup';
				this.currentPopupId = popupId.replace("popup-", "");
			}

			this.update();

			if (this.currentPopupType === 'video') {
				this.handleVideoPopup();
			}
		}

		handleVideoPopup() {
			const videoPopup = document.querySelector(`#video-${this.currentPopupId}`);
			const videoContainer = videoPopup.querySelector('.popup__inner');
		}

		closePopup() {
			if (this.currentPopupType === 'video') {
				const videoPopup = document.querySelector(`#video-${this.currentPopupId}`);
				const iframe = videoPopup.querySelector('iframe');

				if (iframe) {
					const currentSrc = iframe.src;
					iframe.src = '';
					iframe.src = currentSrc;
				}
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
				activePopup.classList.add('is-active');
				this.htmlElement.classList.add('lock'); // Добавляем класс lock на html
			}
		}

		hideAllPopups() {
			this.popups.each((i, el) => {
				const iframe = el.querySelector('iframe');
				if (iframe) {
					const currentSrc = iframe.src;
					iframe.src = '';
					iframe.src = currentSrc;
				}
				el.close();
				el.classList.remove('is-active');
			});
			this.htmlElement.classList.remove('lock'); // Убираем класс lock с html
		}
	}

	new Popups();
});