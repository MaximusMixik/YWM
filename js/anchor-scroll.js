jQuery(document).ready(function ($) {
  class AnchorScroll {
    constructor() {
      this.query();
      this.events();
      this.onLoadScroll(); // on window load
    }

    query() {
      this.hashLinks = $('a[href*="#"]:not([href="#"])');
    }

    events() {
      this.hashLinks.on("click", this.onClickScroll.bind(this)); // on link click
    }

    onLoadScroll() {
      this.windowHash = window.location.hash;

      if (!this.windowHash) {
        return;
      }

      this.animate(this.windowHash);
    }

    onClickScroll(event) {
      this.windowHash = window.location.hash;
      this.linkUrl = new URL(event.target.href);
      this.linkHash = this.linkUrl.hash;

      if (!this.windowHash && !this.linkHash) {
        return;
      }

      if (this.isCurrentPage()) {
        e.preventDefault();
      }

      this.animate(this.linkHash);
    }

    isCurrentPage() {
      return this.href == this.windowHash;
    }

    animate(hash) {
      if (window.lenis) {
        window.lenis.scrollTo(hash);
      } else {
        $('html, body').animate({scrollTop: $(hash).offset().top}, 300);
      }
    }
  }

  new AnchorScroll();
});
