jQuery(document).ready(function ($) {
"use strict";

/////////////////////////////////////////////////////////////////////////
//        add class current cat tab
//////////////////////////////////////////////////////////////////////////  
$(".first_class_name").on("click", function (e) {
$(this).addClass("current_cat_post").siblings().removeClass("current_cat_post");
});

/////////////////////////////////////////////////////////////////////////
//        Sticky header
//////////////////////////////////////////////////////////////////////////  
  var jl_stick;
    if ($(".jl_menu_sticky").hasClass('jl_stick')) {
        var jl_stick = $(".jl_menu_sticky").offset().top;
    }
    $(window).scroll(function() {
        var jlscroll = $(window).scrollTop();
        if (jlscroll > jl_stick) {
            $(".jl_menu_sticky.jl_stick").addClass("jl_sticky");
            var nav_height = $(".jl_menu_sticky.jl_stick").outerHeight();
            $(".jl_blank_nav").css({
                "height": nav_height
            });
        } else {
            $(".jl_menu_sticky.jl_stick").removeClass("jl_sticky");
            $(".jl_blank_nav").css({
                "height": 0
            });
        }
    });

//////////////////////////////////////////////////////////////////////////
//        Sticky
//////////////////////////////////////////////////////////////////////////  
$('.jl_sidebar .panel-grid-cell, #sidebar, .jl-h-sidebar, .jl_left_main_3col, .jl_right_main_3col').theiaStickySidebar({
      additionalMarginTop: 0
    });


$('.jl_day_night .fa-moon-o').on("click", function() {
        $('.jl_day_night').addClass('jl_night_en'); 
        $('.jl_day_night').removeClass('jl_day_en');       
        $('.jl_en_day_night').addClass('options_dark_skin'); 
        $('.mobile_nav_class').addClass('wp-night-mode-on');

        $.cookie('jlendnight','no', {expires: 7, path: '/'});
        $.cookie('jlenday','no',  {expires: 7, path: '/'});
        
});

$('.jl_day_night .la-sun-o').on("click", function() {
        $('.jl_day_night').addClass('jl_day_en');  
        $('.jl_day_night').removeClass('jl_night_en');
        $('.jl_en_day_night').removeClass('options_dark_skin'); 
        $('.mobile_nav_class').removeClass('wp-night-mode-on');            

        $.cookie('jlenday','no', {expires: 7, path: '/'});
        $.cookie('jlendnight','no',  {expires: 7, path: '/'});
        
});

//////////////////////////////////////////////////////////////////////////
//        Menu
//////////////////////////////////////////////////////////////////////////  

$('.menu_mobile_icons, .mobile_menu_overlay').on("click", function() {
        $('#content_nav').toggleClass('jl_mobile_nav_open');
        $('.mobile_menu_overlay').toggleClass('mobile_menu_active');
        $('.mobile_nav_class').toggleClass('active_mobile_nav_class');
});

$("#mobile_menu_slide .menu-item-has-children > a").append($("<span/>",{class:'arrow_down'}).html('<i class="la la-angle-down" aria-hidden="true"></i>')); 
$('#mobile_menu_slide .arrow_down i').on("click",  function() {
            var $submenu = $(this).closest('.menu-item-has-children').find(' > .sub-menu');
            $(this).toggleClass("la la-angle-down").toggleClass("la la-angle-up");
            if ( $submenu.hasClass('menu-active-class') ) {
                $submenu.removeClass('menu-active-class');
            } else {
                $submenu.addClass('menu-active-class');
            }
            return false;
        });


$('.search_form_menu_personal_click').on("click", function() {
      $('.search_form_menu_personal').toggleClass('search_form_menu_personal_active');
      $('.mobile_nav_class').toggleClass('active_mobile_nav_class');
      
});

$('.single_post_share_icons').on("click", function() {
      $('.single_post_share_wrapper').toggleClass('share_single_active');
      $('.mobile_nav_class').toggleClass('active_mobile_nav_class');
});


$('.search_form_menu_click').on('click', function ( e ) {
    e.preventDefault();
      $('.search_form_menu').toggle();
    $(this) .toggleClass('active');
    });


 if ( $('.sb-toggle-left').length ) {
            $('.sb-toggle-left').on("click",  function(){
                $('#nav-wrapper').toggle(100);
            } ); 
            $("#menu-main-menu .menu-item-has-children > a").append($("<span/>",{class:'arrow_down'}).html('<i class="la la-angle-down"></i>'));     
        }
        
        $('#nav-wrapper .menu .arrow_down').on("click",  function() {
            var $submenu = $(this).closest('.menu-item-has-children').find(' > .sub-menu');
            
            if ( $submenu.hasClass('menu-active-class') ) {
                $submenu.removeClass('menu-active-class');
            } else {
                $submenu.addClass('menu-active-class');
            }
            
            return false;
        });


    $('#menu_wrapper li').hover(function(){
    var marginAdjust = 100;
    var parentElement = $(this).parent();
    
    var navPosition = $(parentElement).position();
    var navWidth = $(parentElement).width();
    var navRight = navPosition.left+navWidth;
    
    var position = $(this).position();
    var thisWidth = $(this).children('ul').width();
    var thisRight = position.left+thisWidth-marginAdjust;
    
    if (thisRight > navWidth) $(this).children('ul').addClass('jl_menu_tls');
    });

 
//////////////////////////////////////////////////////////////////////////
//        Grid images
//////////////////////////////////////////////////////////////////////////  

$(".justified-gallery-post").justifiedGallery({
    rowHeight: 200,
    captions: false,
    margins : 1,
    lastRow : 'justify',
    fixedHeight : false
  });

 $('.justified-gallery-post, .woocommerce-product-gallery__image, .wp-caption, .wp-block-gallery, .gallery-icon').magnificPopup({
  type:'image', 
  delegate: 'a',
  closeOnContentClick: false,
  closeBtnInside: false,
  mainClass: 'mfp-with-zoom mfp-img-mobile',
  image: {
            verticalFit: true,
            titleSrc: function(item) {
              return item.el.attr('title');
            }
  },
  gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1]
    },
  zoom: {
            enabled: true,
            duration: 300,
            opener: function(element) {
              return element.find('img');
  }}
    

});

 //////////////////////////////////////////////////////////////////////////
//        Tab
//////////////////////////////////////////////////////////////////////////  
  
    var $tabsNav = $('.tabs-product'),
        $tabsNavLis = $tabsNav.children('li');
    $tabsNav.each(function () {
        var $this = $(this);
        $this.next().children('.tab-content').stop(true, true).hide()
            .first().show();
       $this.children('li').first().addClass('active').stop(true, true).show();
    });
    $tabsNavLis.on('click', function (e) {
        var $this = $(this);
        $this.siblings().removeClass('active').end()
            .addClass('active');
        $this.parent().next().children('.tab-content').stop(true, true).hide()
            .siblings($this.find('a').attr('href')).fadeIn();
        e.preventDefault();
    });
  

//////////////////////////////////////////////////////////////////////////
//        Go to top
//////////////////////////////////////////////////////////////////////////

  jQuery(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
        $(".jl_large_menu_logo").addClass("jl_custom_height_small");
        $(".options_dark_header").addClass("dark_header_menu");
    } else {
        $(".jl_large_menu_logo").removeClass("jl_custom_height_small");
        $(".options_dark_header").removeClass("dark_header_menu");
    }


    if (jQuery(this).scrollTop() > 500) {
      jQuery("#go-top").fadeIn();
    } else {
      jQuery("#go-top").fadeOut();
    }
  });
  
  $("#go-top").on("click", function () {
    jQuery("body,html").animate({ scrollTop: 0 }, 800 );
    return false;
  }); 

//////////////////////////////////////////////////////////////////////////
//        Video responsive
//////////////////////////////////////////////////////////////////////////

fluidvids.init({
      selector: 'iframe',
      players: ['www.youtube.com', 'player.vimeo.com', 'www.facebook.com']
    }); 



//////////////////////////////////////////////////////////////////////////
//        Slider and carousel
//////////////////////////////////////////////////////////////////////////
var tagrtl = $("html").attr("dir");
if(tagrtl){var rtl_options = true;}else{var rtl_options = false;}
//Newsticker
    $('.home_newsticker').slick({
    rtl: rtl_options,
    dots: false,
    speed: 600,
    arrows: true,
    autoplaySpeed: 6000,
    autoplay: false,
    pauseOnHover: true,
    adaptiveHeight: true,
    fade: true,
    prevArrow:'<div class="jelly_pro_post_arrow_left"><i class="la la-angle-left"></i></div>',
    nextArrow:'<div class="jelly_pro_post_arrow_right"><i class="la la-angle-right"></i></div>',
    slidesToShow: 1,
    slidesToScroll: 1
  });

 
  $('.home_slider_post_tab_nav').slick({
  rtl: rtl_options,
  slidesToShow: 6,
  slidesToScroll: 1,
  centerPadding: '0px',
  asNavFor: '.home_slider_post_tab',
  focusOnSelect: true,
  responsive: [
    {
      breakpoint: 1196,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1
      }
    }
  ]
});  



//Carousel 1 post
$('.jl_builder_1carousel').slick({
    rtl: rtl_options,
    dots: true,
    speed: 800,
    autoplaySpeed: 8000,
    autoplay: true,
    pauseOnHover: true,
    adaptiveHeight: true,
    prevArrow:'<div class="jelly_pro_post_arrow_left"><i class="la la-angle-left"></i></div>',
    nextArrow:'<div class="jelly_pro_post_arrow_right"><i class="la la-angle-right"></i></div>',
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]

  });
  //Carousel 2 post
$('.jl_builder_2carousel').slick({
    rtl: rtl_options,
    dots: true,
    speed: 800,
    autoplaySpeed: 8000,
    autoplay: true,
    pauseOnHover: true,
    adaptiveHeight: true,
    prevArrow:'<div class="jelly_pro_post_arrow_left"><i class="la la-angle-left"></i></div>',
    nextArrow:'<div class="jelly_pro_post_arrow_right"><i class="la la-angle-right"></i></div>',
    slidesToShow: 2,
    slidesToScroll: 1,
    responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]

  });

//Carousel 3 post
$('.jl_builder_3carousel').slick({
    rtl: rtl_options,
    dots: true,
    speed: 800,
    autoplaySpeed: 8000,
    autoplay: true,
    pauseOnHover: true,
    adaptiveHeight: true,
    prevArrow:'<div class="jelly_pro_post_arrow_left"><i class="la la-angle-left"></i></div>',
    nextArrow:'<div class="jelly_pro_post_arrow_right"><i class="la la-angle-right"></i></div>',
    slidesToShow: 3,
    slidesToScroll: 2,
    responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]

  });

//Carousel 4 post
$('.jl_builder_4carousel').slick({
    rtl: rtl_options,
    dots: true,
    speed: 800,
    autoplaySpeed: 8000,
    autoplay: true,
    pauseOnHover: true,
    adaptiveHeight: true,
    prevArrow:'<div class="jelly_pro_post_arrow_left"><i class="la la-angle-left"></i></div>',
    nextArrow:'<div class="jelly_pro_post_arrow_right"><i class="la la-angle-right"></i></div>',
    slidesToShow: 4,
    slidesToScroll: 2,
    responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]

  });

//Carousel 5 post
$('.jl_builder_5carousel').slick({
    rtl: rtl_options,
    dots: true,
    speed: 800,
    autoplaySpeed: 8000,
    autoplay: true,
    pauseOnHover: true,
    adaptiveHeight: true,
    prevArrow:'<div class="jelly_pro_post_arrow_left"><i class="la la-angle-left"></i></div>',
    nextArrow:'<div class="jelly_pro_post_arrow_right"><i class="la la-angle-right"></i></div>',
    slidesToShow: 5,
    slidesToScroll: 2,
    responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]

  });

//Carousel 6 post
$('.jl_builder_6carousel').slick({
    rtl: rtl_options,
    dots: true,
    speed: 800,
    autoplaySpeed: 8000,
    autoplay: true,
    pauseOnHover: true,
    adaptiveHeight: true,
    prevArrow:'<div class="jelly_pro_post_arrow_left"><i class="la la-angle-left"></i></div>',
    nextArrow:'<div class="jelly_pro_post_arrow_right"><i class="la la-angle-right"></i></div>',
    slidesToShow: 6,
    slidesToScroll: 3,
    responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]

  });


       
//Slider large
$('.single-item-slider, .full-slider-main-home, .slider_widget_post').slick({
    rtl: rtl_options,
    dots: false,
    speed: 900,
    autoplaySpeed: 6000,
    autoplay: true,
    pauseOnHover: true,
    adaptiveHeight: true,
    prevArrow:'<div class="jelly_pro_post_arrow_left"><i class="la la-angle-left"></i></div>',
    nextArrow:'<div class="jelly_pro_post_arrow_right"><i class="la la-angle-right"></i></div>',
    slidesToShow: 1,
    slidesToScroll: 1
  });

//Slider large tab header
$('.home_slider_header_tab').slick({
    rtl: rtl_options,
    dots: false,
    speed: 600,
    autoplaySpeed: 6000,
    autoplay: true,
    pauseOnHover: true,
    adaptiveHeight: true,
    fade: true,
    prevArrow:'',
    nextArrow:'',
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.home_slider_header_tab_nav'
    
  });
  
$('.home_slider_header_tab_nav').slick({
  rtl: rtl_options,
  slidesToShow: 4,
  slidesToScroll: 4,
  asNavFor: '.home_slider_header_tab',
  focusOnSelect: true,
  responsive: [
    {
      breakpoint: 1196,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4,
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4
      }
    }
  ]
});


 var $status = $('.pagingInfo');
    var $slickElement = $('.large_center_slider_text');

    $slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
        //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
        var i = (currentSlide ? currentSlide : 0) + 1;
        $status.text(i + '/' + slick.slideCount);
    });

//Large full slider
 $('.large_center_slider_text').slick({
    rtl: rtl_options,
    dots: true,
    speed: 600,
    autoplaySpeed: 6000,
    autoplay: true,
    pauseOnHover: false,
    adaptiveHeight: true,
    prevArrow:'<div class="jelly_pro_post_arrow_left"><i class="la la-angle-left"></i>Prev</div>',
    nextArrow:'<div class="jelly_pro_post_arrow_right">Next<i class="la la-angle-right"></i></div>',
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: true,
    cssEase: 'linear'
  });

//Large full slider
 $('.large_center_slider').slick({
    rtl: rtl_options,
    dots: true,
    speed: 600,
    autoplaySpeed: 6000,
    autoplay: true,
    pauseOnHover: false,
    adaptiveHeight: true,
    prevArrow:'<div class="jelly_pro_post_arrow_left"><i class="la la-angle-left"></i></div>',
    nextArrow:'<div class="jelly_pro_post_arrow_right"><i class="la la-angle-right"></i></div>',
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: true,
    cssEase: 'linear'
  });


$('.large_center_mode_slider').slick({
  rtl: rtl_options,
  centerMode: true,
  speed: 800,
  autoplaySpeed: 8000,
  autoplay: false,
  centerPadding: '250px',
  pauseOnHover: false,
  adaptiveHeight: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  prevArrow:'<div class="jelly_pro_post_arrow_left"><i class="la la-angle-left"></i></div>',
  nextArrow:'<div class="jelly_pro_post_arrow_right"><i class="la la-angle-right"></i></div>',
  responsive: [
  {
      breakpoint: 1300,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '150px',
        slidesToShow: 1
      }
    },
    {
      breakpoint: 900,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 1
      }
    },
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 1
      }
    }
  ]
});

AOS.init({
    once: true
  });

//////////////////////////////////////////////////////////////////////////
//        load more
//////////////////////////////////////////////////////////////////////////

  $('#content_masonry').infinitescroll({
    navSelector  : "div.pagination-more",            
    nextSelector : "div.more-previous a",               
    itemSelector : "#content_masonry div.box",
   loading: {
          msgText: "",
          finishedMsg: '<span></span> <style type="text/css">#infscr-loading, .pagination-more{ display:none !important;}</style>'
        } 
  },
      function( newElements ) {
  });

jQuery(window).unbind('.infscr');
  jQuery('div.more-previous a').on("click", function(){jQuery('#content_masonry').infinitescroll('retrieve');
  return false;
  });

//////////////////////////////////////////////////////////////////////////
//        Infinite scroll
//////////////////////////////////////////////////////////////////////////

  $('.scroll_more_main_wrapper').infinitescroll({
    navSelector  : ".jelly-infinite-load",            
    nextSelector : ".jelly-infinite-load a",               
    itemSelector : ".scroll_more_main_wrapper div.box",
   loading: {
          msgText: "",
          finishedMsg: '<span></span><style type="text/css">.jelly-infinite-load{ display:none !important;}</style>'
        } 
  },
      function( newElements ) {      
  });  
});


(function ($) {
    'use strict';
    // Variables

    var jlCookies = {
        setCookie: function setCookie(key, value, time, path) {
            var expires = new Date();
            expires.setTime(expires.getTime() + time);
            var pathValue = '';

            if (typeof path !== 'undefined') {
                pathValue = 'path=' + path + ';';
            }

            document.cookie = key + '=' + value + ';' + pathValue + 'expires=' + expires.toUTCString();
        },
        getCookie: function getCookie(key) {
            var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
            return keyValue ? keyValue[2] : null;
        }
    };

    // Call Functions
    document.addEventListener("DOMContentLoaded", function(event) {
        jl_night_mode_button_click();
        jl_night_mode_load_cookie();
    });

    // Functions
    function jl_night_mode_turn_on_time() {
        var server_time = wpnmObject.server_time;
        var turn_on_time = wpnmObject.turn_on_time;
        var turn_off_time = wpnmObject.turn_off_time;        
        if ( server_time >= turn_on_time && server_time <= turn_off_time ) {
            jlCookies.setCookie('jlNightMode', 'true', 2628000000, '/');
        }
    }
    function jl_night_mode_button_click() {
        var nightModeButton = document.querySelectorAll('.wpnm-button, .jl-night-toggle-icon');

        for (var i = 0; i < nightModeButton.length; i++) {
            nightModeButton.item(i).onclick = function (event) {
                event.preventDefault();
                
                for (var i = 0; i < nightModeButton.length; i++) {
                    nightModeButton[i].classList.toggle('active');
                }

                if (this.classList.contains('active')) {
                    jlCookies.setCookie('jlNightMode', 'true', 2628000000, '/');
                } else {
                    jlCookies.setCookie('jlNightMode', 'false', 2628000000, '/');
                }
            };
        }
    }

    function jl_night_mode_load_cookie() {
        var nightModeButton = document.querySelectorAll('.wpnm-button, .jl-night-toggle-icon');

        if ('true' === jlCookies.getCookie('jlNightMode')) {
            document.body.classList.add('wp-night-mode-on');
            $('.jl_en_day_night').addClass('options_dark_skin');
            $('.jl_day_night').addClass('jl_night_en');
            $('.jl_day_night').removeClass('jl_day_en');
            for (var i = 0; i < nightModeButton.length; i++) {
                nightModeButton[i].classList.add('active');
            }
        } else {
            document.body.classList.remove('wp-night-mode-on');
            $('.jl_en_day_night').removeClass('options_dark_skin');
            $('.jl_day_night').removeClass('jl_night_en');
            for (var i = 0; i < nightModeButton.length; i++) {
                nightModeButton[i].classList.remove('active');
            }
        }
    }
})(jQuery);



