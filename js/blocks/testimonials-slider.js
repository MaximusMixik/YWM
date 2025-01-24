jQuery(document).ready(function ($) {

	if (window.innerWidth < 480) {

		const testimonialsSliders = [...document.querySelectorAll(".js-testimonials-swiper")];

		if (!testimonialsSliders.length) return

		new Swiper(".js-testimonials-swiper", {
			loop: true,
			speed: 1200,
			slidesPerView: 1,
			autoHeight: true,
			spaceBetween: 30,
			pagination: {
				el: ".js-testimonials-swiper .navigation__pagination",
				clickable: true,
			},
			// autoplay: {
			// 	enabled: true,
			// 	delay: 0,
			// },
		});
	}

});
