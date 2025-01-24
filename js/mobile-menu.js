jQuery(document).ready(function($){

  class Menu {
    constructor(){
      this.state();
      this.query();
      this.events();
    }

    state(){
      this.isOpen = false;
    }

    query(){
      this.menu = $('.js-mobile-menu');
      this.toggleButton = $('.js-mobile-menu-button');
      this.openIcon = $('.js-mobile-open-icon');
      this.closeIcon = $('.js-mobile-close-icon');
    }

    events(){
      this.toggleButton.click(() => this.toggleMenu());
      this.menu.find('a').click(() => this.closeMenu()); // if you want menu close on menu-item click
    }

    toggleMenu(){
      this.isOpen 
      ? this.closeMenu()
      : this.openMenu();
    }

    openMenu(){
      this.isOpen = true;
      this.updateView();
    }

    closeMenu(){
      this.isOpen = false;
      this.updateView();
    }

    updateView(){
      // set mobile menu top offset
      const headerHeight = $('.header').outerHeight() + 'px'
      this.menu.css('--top', headerHeight);
      this.menu.css('height', `calc(100vh - ${headerHeight})`);

      // show/hide menu dropdown
      this.isOpen
        ? this.menu.slideDown()
        : this.menu.slideUp();

      // show/hide button
      if(this.isOpen) {
        this.closeIcon.show();
        this.openIcon.hide();
      } else {
        this.closeIcon.hide();
        this.openIcon.show();
      }
    }
  }

  new Menu();
  
});
