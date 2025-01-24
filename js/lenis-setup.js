jQuery(function ($) {
	window.lenis = new Lenis({
		smooth: true,
		direction: "vertical",
		gestureDirection: "vertical",
		mouseMultiplier: 1.5,
		smoothTouch: true,
		touchMultiplier: 1.5,
		infinite: false,
	});

	const raf = (time) => {
		window.lenis.raf(time);
		requestAnimationFrame(raf);
	};

	requestAnimationFrame(raf);
});
