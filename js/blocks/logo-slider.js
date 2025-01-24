jQuery(document).ready(function ($) {
  const sliders = [...document.querySelectorAll(".js-logo-slider")];

  if (!sliders.length) {
    return;
  }

  new Swiper(".js-logo-slider", {
    slidesPerView: "auto",
    loop: true,
    speed: 3000,
    slidesPerView: "1",
    spaceBetween: 30,
    autoplay: {
      enabled: true,
      delay: 0,
    },
    breakpoints: {
      576: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
    },
  });
});
