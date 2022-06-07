(function ($) {

  $(document).ready(function () {
    'use strict';
    /*-----------------------------------------------------------------------------------*/
    /*	ONEPAGE SMOOTH SCROLL
    /*-----------------------------------------------------------------------------------*/
    $(function () {
      $('a[href*="#"]')
      // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function (event) {
          // On-page links
          if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
            &&
            location.hostname == this.hostname
          ) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
              // Only prevent default if animation is actually gonna happen
              event.preventDefault();
              $('html, body').animate({
                scrollTop: target.offset().top - 200
              }, 600, function () {
                // Callback after animation
                // Must change focus!
                var $target = $(target);
                $target.focus();
                if ($target.is(":focus")) { // Checking if the target was focused
                  return false;
                } else {
                  $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                  $target.focus(); // Set focus again
                }
                ;
              });
            }
          }
        });

      $(window).scroll(function () {
        setScrollMenuPosition();
      });

      function setScrollMenuPosition() {
        var scroll = $(window).scrollTop();
        const miniHeaderHeight = $('#mini-header').outerHeight();
        const headerHeight = $('#header').outerHeight();
        if (scroll > miniHeaderHeight + headerHeight) {
          $('#mini-header').addClass('scrolled-down');
          $('#header').addClass('scrolled-down');
        } else {
          $('#mini-header').removeClass('scrolled-down');
          $('#header').removeClass('scrolled-down')
        }
      }

      function disableActiveMenuLinks() {
        $('.current-menu-item > a').click(function (e) {
          e.preventDefault();
          return false;
        })
      }


      function initMobileMenu() {
        const clickx= document.getElementById('pencet');
        clickx.addEventListener('click', function(){
          clickx.classList.toggle('active');
          $('.head-main-mobile').toggleClass('active')
        });

      }

      function init() {
        setScrollMenuPosition();
        disableActiveMenuLinks();
        initMobileMenu();
      }


      init();


    });
  });
})(jQuery);

function reinitAjaxContent(){
  setTimeout(function () {
    (function ($) {
      $(document).on("click", ".member-filter-item", [], function (event) {
        /*-----------------------------------------------------------------------------------*/
        /*	Members filter
        /*-----------------------------------------------------------------------------------*/
        const $memberFilterItems = $('.member-filter-item');
        $memberFilterItems.removeClass('current-filter');
        $(this).addClass('current-filter');
        const cat = $(this).data('cat');
        if (!cat) {
          $('.list-members-section .type-member').fadeIn()
        } else {
          $('.list-members-section .type-member').filter(function () {
            return $(this).data('cat') === cat;
          }).stop().fadeIn();
          $('.list-members-section .type-member').filter(function () {
            return $(this).data('cat') !== cat;
          }).hide();
        }
      });
    })(jQuery);
    // Todo remove timeout
  }, 100);
}
