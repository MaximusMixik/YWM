jQuery(document).ready(function ($) {
	gsap.registerPlugin(ScrollTrigger);

	$(".animate").each(function () {
		let el = $(this);
		let disabled = false;
		gsap.from(el, {
			scrollTrigger: {
				markers: false,
				trigger: el,
				pin: false,
				start: "top 82%",
				end: "bottom top",
				scrub: 1,
				onToggle: function (self) {
					if (self.isActive && !disabled) {
						el.addClass("in");
						self.disable();
						disabled = true;
						//ScrollTrigger.refresh(); it can cause bug for jquery.animate()
						el.trigger("gsap-in");
					} else {
						self.disable();
					}
				},
			},
		});
	});

	$(".animate-in-out").each(function () {
		let el = $(this);
		let disabled = false;
		gsap.from(el, {
			scrollTrigger: {
				trigger: el,
				pin: false,
				start: "top 80%",
				end: "bottom bottom",
				scrub: 1,
				markers: false,
				toggleClass: "active",
				// onToggle: function(self){
				//     if(self.isActive && !disabled){

				//         el.addClass('in');

				//         // self.disable();
				//         // disabled = true;
				//     } else{
				//         // self.disable();
				//         el.addClass('in');
				//         el.addClass('out');
				//     }
				// },
			},
			bottom: 0,
		});
	});

	$(".animate-now").each(function () {
		let el = $(this);
		let disabled = false;
		gsap.from(el, {
			scrollTrigger: {
				trigger: el,
				pin: false,
				start: "top bottom",
				end: "bottom top",
				scrub: 1,
				markers: false,
				onToggle: function (self) {
					if (self.isActive && !disabled) {
						el.addClass("in");

						self.disable();
						disabled = true;
					} else {
						self.disable();
					}
				},
			},
		});
	});
});
