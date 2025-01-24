jQuery(document).ready(function ($) {
	let currentlyOpen = null;

	class Accordion {
		constructor(el) {
			this.el = el;
			this.summary = el.querySelector('.accordion__button');
			this.content = el.querySelector('.accordion__dropdown');
			this.animation = null;
			this.isClosing = false;
			this.isExpanding = false;

			this.summary.addEventListener('click', (e) => this.onClick(e));
		}

		onClick(e) {
			e.preventDefault();

			// If there's an open accordion and it's not this one, close it smoothly
			if (currentlyOpen && currentlyOpen !== this && currentlyOpen.el.open) {
				currentlyOpen.shrink();
			}

			if (this.isClosing || !this.el.open) {
				currentlyOpen = this;
				this.open();
			} else if (this.isExpanding || this.el.open) {
				currentlyOpen = null;
				this.shrink();
			}
		}

		shrink() {
			this.isClosing = true;
			this.el.style.overflow = 'hidden';

			const startHeight = `${this.el.offsetHeight}px`;
			const endHeight = `${this.summary.offsetHeight}px`;

			if (this.animation) {
				this.animation.cancel();
			}

			this.animation = this.el.animate({
				height: [startHeight, endHeight]
			}, {
				duration: 300,
				easing: 'ease-out'
			});

			this.animation.onfinish = () => this.onAnimationFinish(false);
			this.animation.oncancel = () => this.isClosing = false;
		}

		open() {
			this.el.style.overflow = 'hidden';
			this.el.style.height = `${this.el.offsetHeight}px`;
			this.el.open = true;
			window.requestAnimationFrame(() => this.expand());
		}

		expand() {
			this.isExpanding = true;
			const startHeight = `${this.el.offsetHeight}px`;
			const endHeight = `${this.summary.offsetHeight + this.content.offsetHeight}px`;

			if (this.animation) {
				this.animation.cancel();
			}

			this.animation = this.el.animate({
				height: [startHeight, endHeight]
			}, {
				duration: 300,
				easing: 'ease-out'
			});

			this.animation.onfinish = () => this.onAnimationFinish(true);
			this.animation.oncancel = () => this.isExpanding = false;
		}

		onAnimationFinish(open) {
			this.el.open = open;
			this.animation = null;
			this.isClosing = false;
			this.isExpanding = false;
			this.el.style.height = this.el.style.overflow = '';
		}
	}

	document.querySelectorAll('.accordion').forEach((el) => {
		new Accordion(el);
	});
});