(function($){    
  var stickyMenu = function (arg) {
      this.navWrapper = arg.navWrapper;
      this.navMenu = arg.navMenu;
      this.init();
      var that = this;
      $(window).resize(function () {
          that.init();
      });
  };

  stickyMenu.prototype.init = function(){
    var navSelector = this.navMenu;
    var navWrapperSelector = this.navWrapper;
    var navHeight = $(navSelector).outerHeight();
    $(navWrapperSelector).css('height', navHeight+'px');
  }    
  //creating object
  var stickyMenuObj = new stickyMenu ({"navWrapper":".navigation-wrap", "navMenu": ".nav-search-outer"});
    
}(jQuery));
 
jQuery(document).ready(function($) { "use strict";

    /**
     * PRE LOADER 
    */
    $(window).load(function() {
       $('.spidermag-preloader').delay(300).fadeOut('slow');
    })

    /**
      * ScrollUp
    */
    jQuery(window).scroll(function() {
       if (jQuery(this).scrollTop() > 1000) {
           jQuery('.scrollup').fadeIn();
       } else {
           jQuery('.scrollup').fadeOut();
       }
    });

    jQuery('.scrollup').click(function() {
       jQuery("html, body").animate({
           scrollTop: 0
       }, 2000);
       return false;
    });    

    /**
      * MASONRY
    */
    $('.grid').masonry({
      itemSelector: '.masonry-item',
    });
    setTimeout(function(){
        $('.grid').masonry({
        itemSelector: '.masonry-item',
      });
    },5000)

    /**
     * MASONRY BLOG LINK NUDGING
    */
    $('.masonry-item a.more').hover(function() { //mouse in
      $(this).animate({
        paddingLeft: '30px'
      }, 400);
      }, function() { //mouse out
        $(this).animate({
        paddingLeft: 15
      }, 400);
    });


    /**
     * WOW ANIMATION
    */
    new WOW().init();

    /**
    * MODAL BOXES & POP UP WINDOWS OR IMAGES
    */
    $('.open-popup-link').magnificPopup({
      removalDelay: 500, //delay removal by X to allow out-animation
      callbacks: {
        beforeOpen: function() {
          this.st.mainClass = this.st.el.attr('data-effect');
        }
      },
      midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
    });

    $('.popup-img').magnificPopup({
      type: 'image'
    }); 
   

    /**
     * SEARCH BAR
    */
    $(".search-container").hide();
      $(".toggle-search").on("click", function(e) {
      e.preventDefault();
      e.stopPropagation();
      $(".search-container").slideToggle(500, function() {
        $("#search-bar").focus();
      });
    });

    /**
     * Close the search bar if user clicks anywhere
    */
    $(document).click(function(e) {
      var searchWrap = $(".search-container");
      if (!searchWrap.is(e.target) && searchWrap.has(e.target).length === 0 ) {
        searchWrap.slideUp(500);
      }
    });

    /**
     * ADDING SLIDE UP AND ANIMATION TO DROPDOWN
    */
    enquire.register("screen and (min-width:767px)", { match: function() {
      $(".dropdown").hover(function() {
          $('.dropdown-menu', this).stop().fadeIn("slow");
        }, function() {
          $('.dropdown-menu', this).stop().fadeOut("slow");
        });
      },
    });


    /**
     * SpiderMag Sub Menu
    */
    $('.navbar .menu-item-has-children').append('<span class="sub-toggle"> <i class="fa fa-plus"></i> </span>');
    $('.navbar .page_item_has_children').append('<span class="sub-toggle-children"> <i class="fa fa-plus"></i> </span>');

    $('.navbar .sub-toggle').click(function() {
        $(this).parent('.menu-item-has-children').children('ul.dropdown-menu').first().slideToggle('1000');
        $(this).children('.fa-plus').first().toggleClass('fa-minus');
    });

    $('.navbar .sub-toggle-children').click(function() {
        $(this).parent('.page_item_has_children').children('ul.children').first().slideToggle('1000');
        $(this).children('.fa-plus').first().toggleClass('fa-minus');
    });

    /**
     * STICKY NAVIGATION
    */
    try {
        $(window).scroll(function() {
          var menuOffset = $('.nav-search-outer').offset().top;
            if ($(window).scrollTop() >= menuOffset) {
            $('.nav-search-outer').addClass('navbar-fixed-top');
          }
          if ($(window).scrollTop() >= 100) {
            $('.nav-search-outer').addClass('show');
            } else {
            $('.nav-search-outer').removeClass('show navbar-fixed-top');
          }
        });
    } catch(err) {

    }
    
    /**
     * HOT NEWS
    */
    try{
        $('#js-news').ticker();
    }catch(e){
        //console.log( e );
    }    

    /**
     * OWL CAROUSEL SCRIPTS SETTINGS AREA
    */
    $("#owl-demo").owlCarousel({ 
      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true 
    });

    $("#banner-thumbs").owlCarousel({
      autoPlay: true, //Set AutoPlay to 3 seconds
      navigation: false,
      stopOnHover: true,
      pagination: false,
      items: 4,
      itemsDesktop: [1199,3],
      itemsDesktopSmall: [979, 2],
      itemsTablet: [768, 2],
      itemsMobile: [479, 1],
    });

    $("#vid-thumbs").owlCarousel({
      navigation: false,
      pagination: true,
      slideSpeed: 300,
      paginationSpeed: 400,
      singleItem: true,
    });

    $("#owl-lifestyle").owlCarousel({
      autoPlay: false, //Set AutoPlay to 3 seconds
      navigation: true,
      pagination: false,
      items: 3,
      itemsDesktop: [1199,3],
      itemsDesktopSmall: [979, 2],
      itemsTablet: [768, 2],
      itemsMobile: [479, 1],
    });

    var time = 8; // time in seconds
    var $progressBar,
    $bar,
    $elem,
    isPause,
    tick,
    percentTime;
    var sync1 = $(".spider_slider");
    var sync2 = $("#sync2");
   
    sync1.owlCarousel({
      singleItem: true,
      slideSpeed: 1000,
      navigation: true,
      pagination: false,
      transitionStyle: "fadeUp",
      afterAction: syncPosition,
      responsiveRefreshRate: 200,
      afterInit: progressBar,
      afterMove: moved,
      startDragging: pauseOnDragging
    });
   
    sync2.owlCarousel({
      items: 4,
      itemsDesktop: [1199,4],
      itemsDesktopSmall: [979, 3],
      itemsTablet: [768, 3],
      itemsMobile: [479, 3],
      pagination: false,
      responsiveRefreshRate: 100,
      afterInit: function(el) {
        el.find(".owl-item").eq(0).addClass("synced");
      }
    });

    function syncPosition(el) {
      var current = this.currentItem;
      $("#sync2").find(".owl-item").removeClass("synced").eq(current).addClass("synced")
      if ($("#sync2").data("owlCarousel") !== undefined) {
        center(current)
      }
    }

    $("#sync2").on("click", ".owl-item", function(e) {
      e.preventDefault();
      var number = $(this).data("owlItem");
      sync1.trigger("owl.goTo", number);
    });

    function center(number) {
      var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
      var num = number;
      var found = false;
      for (var i in sync2visible) {
        if (num === sync2visible[i]) {
          var found = true;
        }
      }
      if (found === false) {
        if (num > sync2visible[sync2visible.length - 1]) {
          sync2.trigger("owl.goTo", num - sync2visible.length + 2)
        } else {
        if (num - 1 === -1) {
          num = 0;
        }
          sync2.trigger("owl.goTo", num);
        }
      } else if (num === sync2visible[sync2visible.length - 1]) {
          sync2.trigger("owl.goTo", sync2visible[1])
      } else if (num === sync2visible[0]) {
        sync2.trigger("owl.goTo", num - 1)
      }
    }

    //Init progressBar where elem is $("#owl-demo")
    function progressBar(elem) {
      $elem = elem;
      //build progress bar elements
      buildProgressBar();
      //start counting
      start();
    }
    //create div#progressBar and div#bar then prepend to $("#owl-demo")
    function buildProgressBar() {
      $progressBar = $("<div>", {
        id: "progressBar"
      });
      $bar = $("<div>", {
        id: "bar"
      });
      $progressBar.append($bar).prependTo($elem);
    }

    function start() {
      //reset timer
      percentTime = 0;
      isPause = false;
      //run interval every 0.01 second
      tick = setInterval(interval, 10);
    };

    function interval() {
       if (isPause === false) {
         percentTime += 1 / time;
         $bar.css({
           width: percentTime + "%"
         });
         //if percentTime is equal or greater than 100
         if (percentTime >= 100) {
           //slide to next item
           $elem.trigger('owl.next')
         }
       }
    }
    //pause while dragging
    function pauseOnDragging() {
      isPause = true;
    }
    //moved callback
    function moved() {
       //clear interval
       clearTimeout(tick);
       //start again
       start();
    }

});