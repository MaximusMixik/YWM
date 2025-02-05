jQuery(document).ready(function ($) {

	const testimonialsSliders = [...document.querySelectorAll(".js-testimonials-swiper")];
	let swiperInstance = null;

	function createSwiper() {
		if (swiperInstance) {
			swiperInstance.destroy();
		}

		swiperInstance = new Swiper(".js-testimonials-swiper", {
			loop: true,
			speed: 1200,
			slidesPerView: 1,
			autoHeight: true,
			spaceBetween: 30,
			pagination: {
				el: ".js-testimonials-swiper .navigation__pagination",
				clickable: true,
			},
		});
	}

	function handleResize() {
		if (window.innerWidth < 480) {
			if (!testimonialsSliders.length) return;
			createSwiper();
		} else if (swiperInstance) {
			swiperInstance.destroy();
			swiperInstance = null;
		}
	}

	// Initial check
	handleResize();

	// Add resize listener
	window.addEventListener('resize', handleResize);
});
