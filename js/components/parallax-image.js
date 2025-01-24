jQuery(document).ready(function ($) {
  // disable parallax for smaller screens
  if (window.innerWidth < 991) return;

  gsap.registerPlugin(ScrollTrigger);

  gsap.utils.toArray(".js-parallax-image").forEach(function (container) {
    let image = container.querySelector("img");

    let tl = gsap.timeline({
      scrollTrigger: {
        trigger: container,
        scrub: true,
        pin: false,
      },
    });

    tl.from(image, {
      yPercent: -10,
    }).to(image, {
      yPercent: 10,
    });
  });
});
