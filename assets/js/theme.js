jQuery(document).ready(function() {


    // WOW
    var wow = new WOW({offset: 40});
    wow.init();


    // Parallax
    jQuery(window).scroll(function() {
        if(jQuery(window).width() > 991) {
            var window_top = jQuery(document).scrollTop();

            jQuery(".parallax").each(function() {
                var speed = jQuery(this).data("speed");
                var pos   = ((window_top * speed) / 100) * -1;

                jQuery(this).css("transform", 'translate3d(0px, ' + pos + 'px, 0px)');
            });
        }
    });


    // Moving circles
    jQuery(window).scroll(function() {
        var window_top = jQuery(document).scrollTop();

        jQuery(".moving-circle").each(function() {
            var speed = jQuery(this).data("speed");
            var pos   = ((window_top * speed) / 100);

            jQuery(this).find(".circle-dot").css("transform", 'rotate(' + pos + 'rad)');
        });

        jQuery(".rotate-this").each(function() {
            var speed = jQuery(this).data("speed");
            var pos   = ((window_top * speed) / 100);

            jQuery(this).css("transform", 'rotate(' + pos + 'rad)');
        });
    });


    // Draw SVG
    jQuery(".button.icon").hover(function() {
        var svg = jQuery(this).find('svg').drawsvg();

        svg.drawsvg('animate');
    }, function() {});


    // Services sections
    jQuery(".service-bullet").click(function() {
        if(jQuery(this).hasClass("active")) {
            return;
        }

        var panel    = jQuery(this).data("panel");
        var panel_id = "service-panel-" + panel;

        jQuery(".service-bullet").removeClass("active");
        jQuery(this).addClass("active");

        jQuery(".service-panel").animate({opacity: "0"}, 500, function() {
            jQuery(".service-panel").hide();
            jQuery("#" + panel_id).show();
            jQuery("#" + panel_id).animate({opacity: "1"}, 500);

            var svg = jQuery("#" + panel_id + " svg").drawsvg();
            svg.drawsvg('animate');
        });

        if(jQuery("#template-service").length > 0) {
            jQuery(".how-section-icons .icon").removeClass("active");
            jQuery(".how-section-icons .icon-" + panel).addClass("active");
        }
    });

    jQuery(".services-up-arrow").click(function() {
        jQuery(".service-bullet.active").prev().trigger("click");
    });

    jQuery(".services-down-arrow").click(function() {
        jQuery(".service-bullet.active").next().trigger("click");
    });

    jQuery(".how-section-icons .icon").click(function() {
        if(!jQuery(this).hasClass("active")) {
            var panel_id = jQuery(this).data("panel");

            jQuery(".service-bullet-" + panel_id).trigger("click");
        }
    });



    const animateCSS = (element, animation, prefix = '') =>
  // We create a Promise and return it
  new Promise((resolve, reject) => {
    const animationName = `${prefix}${animation}`;
    const node = document.querySelector(element);

    node.classList.add(`${prefix}animated`, animationName);

    // When the animation ends, we clean the classes and resolve the Promise
    function handleAnimationEnd() {
      node.classList.remove(`${prefix}animated`, animationName);
      node.classList.add(`${prefix}done`);
      node.removeEventListener('animationend', handleAnimationEnd);

      resolve('Animation ended');
    }

    node.addEventListener('animationend', handleAnimationEnd);
  });



    // Slick Slider
    jQuery(".slick-slider.large").slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        fade: true,
        prevArrow: '<div class="slick-left-arrow"><img src="https://www.evolvedsearch.co.uk/wp-content/themes/ev2/assets/img/arrowleft.svg" /></div>',
        nextArrow: '<div class="slick-right-arrow"><img src="https://www.evolvedsearch.co.uk/wp-content/themes/ev2/assets/img/arrowright.svg" /></div>'
    });

    jQuery(".slick-slider.large").on('beforeChange', function(event, slick, currentSlide, nextSlide) {
        var slide_id = "slick-slide0" + nextSlide;

        animateCSS("#" + slide_id + " h1", "fadeInUp");
        animateCSS("#" + slide_id + " .content", "fadeInUp");
        animateCSS("#" + slide_id + " .button", "fadeInUp");
        animateCSS("#" + slide_id + " .home-header-image", "fadeIn");
    });

    jQuery(".slick-slider.three").slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        prevArrow: '<div class="slick-left-arrow"><img src="https://www.evolvedsearch.co.uk/wp-content/themes/ev2/assets/img/arrowleft.svg" /></div>',
        nextArrow: '<div class="slick-right-arrow"><img src="https://www.evolvedsearch.co.uk/wp-content/themes/ev2/assets/img/arrowright.svg" /></div>',
        responsive: [
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                infinite: true,
                dots: true
            }
        }
        ]
    });

    jQuery(".slick-slider.four").slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        infinite: true,
        prevArrow: '<div class="slick-left-arrow"><img src="https://www.evolvedsearch.co.uk/wp-content/themes/ev2/assets/img/arrowleft.svg" /></div>',
        nextArrow: '<div class="slick-right-arrow"><img src="https://www.evolvedsearch.co.uk/wp-content/themes/ev2/assets/img/arrowright.svg" /></div>'
    });

    jQuery(".slick-slider.five").slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 5,
        infinite: true,
        prevArrow: '<div class="slick-left-arrow"><img src="https://www.evolvedsearch.co.uk/wp-content/themes/ev2/assets/img/arrowleft.svg" /></div>',
        nextArrow: '<div class="slick-right-arrow"><img src="https://www.evolvedsearch.co.uk/wp-content/themes/ev2/assets/img/arrowright.svg" /></div>',
        responsive: [
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: false
            }
        }
        ]
    });

    jQuery(".slick-slider.quotes").slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        prevArrow: '<div class="slick-left-arrow"><img src="https://www.evolvedsearch.co.uk/wp-content/themes/ev2/assets/img/arrowleft.svg" /></div>',
        nextArrow: '<div class="slick-right-arrow"><img src="https://www.evolvedsearch.co.uk/wp-content/themes/ev2/assets/img/arrowright.svg" /></div>'
    });


    // Append lines to slider dots
    jQuery(".slick-dots li").each(function() {
        jQuery(this).append('<span></span>');
    });


    // Percent tickers
    jQuery(".slick-slider.cs").on('afterChange', function(event, slick, currentSlide, nextSlide) {
        var percent1 = jQuery(".slick-slider.cs .slide-" + (nextSlide + 1));
        var percent2 = jQuery(".slick-slider.cs .slide-" + (nextSlide + 2));

        percent1 = jQuery(".slick-slider.cs .slide-1.slick-active");
        percent2 = jQuery(".slick-slider.cs .slide-2.slick-active");

        jQuery(percent1).find(".num").html(0);
        jQuery(percent2).find(".num").html(0);


        jQuery(percent1).find(".num").prop("Counter", 0).animate({
            Counter: jQuery(percent1).find(".num").data("num")
        }, {
            duration: 1000,
            easing: 'swing',
            step: function (now) {
                jQuery(percent1).find(".num").text(Math.ceil(now));
            }
        });

        jQuery(percent2).find(".num").prop("Counter", 0).animate({
            Counter: jQuery(percent2).find(".num").data("num")
        }, {
            duration: 1000,
            easing: 'swing',
            step: function (now) {
                jQuery(percent2).find(".num").text(Math.ceil(now));
            }
        });
    });

    



    // Header navigation sub menus
    jQuery("nav ul li > a").each(function() {
        jQuery(this).after('<div class="line"></div>');
        jQuery(this).after('<span class="dot"></span>');
    });


    function resize_sub_menus() {
        var window_width = jQuery(window).width();

        jQuery(".sub-menu").css("width", window_width + "px");
    }

    resize_sub_menus();

    jQuery(window).resize(function() {
        resize_sub_menus();
    });

    var delay=2000, setTimeoutConst, pause=false;

    jQuery("nav ul#menu-primary-menu > li").hover(function() {
        if(jQuery(window).width() >= 991) {
        if(jQuery(this).find(".sub-menu").first().length > 0) {
            // clearTimeout(setTimeoutConst);
            delay=4000;

            pause = true;

            if(jQuery(this).find(".sub-menu").first().css("display") == "block") {
                return(false);
            }

            var this_hover = jQuery(this);

            jQuery("nav ul#menu-primary-menu li").each(function() {
                if(jQuery(this_hover).attr("id") != jQuery(this).attr("id")) {
                    jQuery(this).find(".sub-menu").hide();
                    jQuery(this).find(".dot").hide();
                    jQuery(this).find(".line").hide();
                }
            });

            var line_height = jQuery(this).find(".line").first().css("height");
            jQuery(this).find(".line").first().css("height", "0px");
            jQuery(this).find(".dot").first().css("opacity", "0");

            jQuery(this).find(".dot").first().css("display", "block");
            jQuery(this).find(".line").first().css("display", "block");

            var that = this;

            jQuery(this).find(".dot").first().animate({"opacity" : "1"}, 250, function() {
                jQuery(that).find(".line").first().animate({"height" : line_height}, 250, function() {
                    jQuery(that).find(".sub-menu").first().slideDown("250");
                });
            });
        }
        }
    }, function() {
        if(jQuery(window).width() >= 991) {
        var this_hover = jQuery(this);
        pause = false;

        setTimeoutConst = setTimeout(function() {
            if(!pause) {
                jQuery(this_hover).find(".dot").first().hide();
                jQuery(this_hover).find(".line").first().hide();
                jQuery(this_hover).find(".sub-menu").first().hide();
            }
        }, delay);
        }
    });

    jQuery("nav ul#menu-primary-menu > li").click(function() {
        if(jQuery(window).width() < 991) {
            if(jQuery(this).find(".sub-menu").length > 0) {
                jQuery(this).find(".sub-menu").show();
            }
        }
    });


    // Sector squares
    function set_squares() {
        var screen_width   = jQuery(window).width();
        var section_height = (screen_width / 3);
        var wrapper_height = section_height;

        if(jQuery(window).width() < 991) {
            section_height = screen_width;
            wrapper_height = screen_width * 3;

            jQuery("#sectors-wrapper").find(".sector-square").css("height", section_height + "px");
        }

        jQuery("#sectors-wrapper").css("height", wrapper_height + "px");
        jQuery("#sectors-wrapper").find(".dt").css("height", section_height + "px");
    }

    set_squares();

    jQuery(window).resize(function() {
        set_squares();
    });



    // Bullets points
    jQuery(".content").each(function() {
        jQuery(this).find("ul,ol").each(function() {
            jQuery(this).find("li").each(function() {
                jQuery(this).html('<span>' + jQuery(this).html() + '</span>');
            });
        });
    });


    // Timeline
    function timeline_click(that, active) {
        var large_width = "500px";
        var small_width = "230px";

        if(jQuery(window).width() <= 2000) {
            large_width = "350px";
            small_width = "160px";
        }

        if(jQuery(window).width() <= 992) {
            large_width = "200px";
            small_width = "100px";
        }

        var current_entry = jQuery(active).data("entry");
        var next_entry    = jQuery(that).data("entry");
        var entry_width   = jQuery(that).width();
        var inner_left    = jQuery("#timeline .timeline-inner").css("left");
        var upper_bound   = 6;

        if(jQuery(window).width() <= 2000) {
            upper_bound   = 5;
        }

        if(jQuery(window).width() <= 1700) {
            upper_bound   = 4;
        }

        if(jQuery(window).width() <= 992) {
            upper_bound   = 2;
        }

            if(current_entry < next_entry) {
                if(next_entry >= upper_bound) {
                inner_left = parseInt(inner_left) - entry_width;

                if(inner_left > 0) {
                    inner_left = 0;
                }

                jQuery("#timeline .timeline-inner").animate({"left" : inner_left + "px"}, 150);
                }
            }
            else {
                inner_left = parseInt(inner_left) + entry_width;

                if(inner_left > 0) {
                    inner_left = 0;
                }

                jQuery("#timeline .timeline-inner").animate({"left" : inner_left + "px"}, 150);
            }

        // this one
        jQuery(that).animate({"width" : large_width}, 150);
            
        jQuery(that).find(".circle").animate({"opacity" : "0"}, 150, function() {
            jQuery(that).find(".circle").hide();
                
            jQuery(that).find(".image").css("opacity", "0");
            jQuery(that).find(".image").show();
            jQuery(that).find(".image").animate({"opacity" : "1"}, 150);
                
            jQuery(that).find(".title").css("opacity", "0");
            jQuery(that).find(".title").show();
            jQuery(that).find(".title").animate({"opacity" : "1"}, 150);
                
            jQuery(that).find(".content").css("opacity", "0");
            jQuery(that).find(".content").show();
            jQuery(that).find(".content").animate({"opacity" : "1"}, 150);
        });
            
            
        // active one
        jQuery(active).animate({"width" : small_width}, 150);

        jQuery(active).find(".image").animate({"opacity" : "0"}, 150, function() {
            jQuery(active).find(".image").hide();
        });
            
        jQuery(active).find(".title").animate({"opacity" : "0"}, 150, function() {
            jQuery(active).find(".title").hide();
        });
            
        jQuery(active).find(".content").animate({"opacity" : "0"}, 150, function() {
            jQuery(active).find(".content").hide();
        });
            
        jQuery(active).find(".circle").css("opacity", "0");
        jQuery(active).find(".circle").css("display", "inline-block");
        jQuery(active).find(".circle").animate({"opacity" : "1"}, 150, function() {
            jQuery(active).removeClass("active");
            jQuery(that).addClass("active");
        });
    }

    function move_timeline(direction) {
        
    }

    jQuery("#timeline .entry").click(function() {
        if(!jQuery(this).hasClass("active")) {
            timeline_click(jQuery(this), jQuery("#timeline .entry.active"));
        }
    });

    jQuery("#timeline .entry .slick-right-arrow").click(function() {
        if(jQuery(this).parent().parent().next().length > 0) {
            timeline_click(jQuery(this).parent().parent().next(), jQuery(this).parent().parent());
        }
    });

    jQuery("#timeline .entry .slick-left-arrow").click(function() {
        if(jQuery(this).parent().parent().prev().length > 0) {
            timeline_click(jQuery(this).parent().parent().prev(), jQuery(this).parent().parent());
        }
    });


    function scroll_stat() {
    jQuery(".stat .num").each(function() {
        var element_top = jQuery(this).offset().top;
        var element_bottom = element_top + jQuery(this).outerHeight();

        var viewport_top    = jQuery(window).scrollTop();
        var viewport_bottom = viewport_top + jQuery(window).height();

        if(element_bottom > viewport_top && element_top < viewport_bottom) {
            if(!jQuery(this).hasClass("animated")) {
            jQuery(this).addClass("animated");
            jQuery(this).html(0);

            jQuery(this).prop("Counter", 0).animate({
                Counter: jQuery(this).data("num")
            }, {
                duration: 1000,
                easing: 'swing',
                step: function (now) {
                    jQuery(this).text(Math.ceil(now));
                }
            });
            }
        }
    });
    }

    scroll_stat();

    jQuery(window).on("resize scroll", function() {
        scroll_stat();
    });


    jQuery("header .fa-bars").click(function() {
        if(jQuery(".menu-primary-menu-container").css("display") == "none") {
            jQuery(".menu-primary-menu-container").show();
        }
        else {
            jQuery(".menu-primary-menu-container").hide();
        }
    });


    if(jQuery("#template-services").length > 0) {
        var hash = window.location.hash;
        hash = hash.replace('#', '');

        if(hash.length > 0) {
            var bullet = jQuery("#anchor-" + hash).data("bullet");
            var panel  = jQuery("#anchor-" + hash).data("panel");

            jQuery("." + bullet).trigger("click");
            jQuery("html, body").animate({scrollTop: (jQuery("#services-panel-wrapper").offset().top - jQuery("header").outerHeight()) }, 1000);
        }
    }


    jQuery(".benefit-line p i").click(function() {
        if(jQuery(this).hasClass("fa-plus")) {
            jQuery(".benefit-line p i").each(function() {
                if(jQuery(this).hasClass("fa-minus")) {
                    jQuery(this).parent().find(".desc").slideUp();
                    jQuery(this).removeClass("fa-minus");
                    jQuery(this).addClass("fa-plus");
                }
            });

            jQuery(this).parent().find(".desc").slideDown();
            jQuery(this).removeClass("fa-plus");
            jQuery(this).addClass("fa-minus");
        }
        else {
            jQuery(this).parent().find(".desc").slideUp();
            jQuery(this).removeClass("fa-minus");
            jQuery(this).addClass("fa-plus");
        }
    });


    if(jQuery("#template-insights").length > 0) {
        var mixer = mixitup("#grid", {
            selectors: {
                target: '.mix'
            },
            animation: {
                duration: 300
            }
        });
    }

    if(jQuery("#template-casestudies").length > 0) {
        var mixer = mixitup("#grid", {
            selectors: {
                target: '.mix2'
            },
            animation: {
                duration: 300
            }
        });
    }

    jQuery(".next-post").hover(function() {
        jQuery(this).find(".next-dets").show();
    }, function() {
        jQuery(this).find(".next-dets").hide();
    });

    jQuery(".prev-post").hover(function() {
        jQuery(this).find(".prev-dets").show();
    }, function() {
        jQuery(this).find(".prev-dets").hide();
    });



    jQuery('input[type="file"]').each(function() {
        jQuery(this).on("change", function() {
            jQuery(this).addClass("has-file");
        });
    });


    jQuery("blockquote").each(function() {
        jQuery(this).prepend('<div class="quote-mark">&ldquo;</div>');
    });


    jQuery("#cv").change(function() {
        filename = this.files[0].name;

        jQuery("#cv + label span").html(filename);
        jQuery("#cv + label span").addClass("added");
    });

    jQuery("#cl").change(function() {
        filename = this.files[0].name;

        jQuery("#cl + label span").html(filename);
        jQuery("#cl + label span").addClass("added");
    });


    jQuery(".show-more-wrapper .button").click(function() {
        jQuery(".old-archive").slideDown({
            start: function () {
                jQuery(this).css({
                    display: "flex"
                })
            }
        });

        jQuery(".show-more-wrapper").hide();
    });


    // Careers contact form
    jQuery("#template-career .apply-box form .button").click(function() {
        // text input fields
        jQuery("#template-career .apply-box form input[type='text'], #template-career .apply-box form input[type='email']").each(function() {
            var input_value = jQuery.trim(jQuery(this).val());

            if(input_value == '') {
                jQuery(this).addClass("error");
            }
            else {
                jQuery(this).removeClass("error");
            }
        });

        var cv_input = jQuery.trim(jQuery("#cv").val());

        if(cv_input == '') {
            jQuery("#cv").addClass("error");
        }
        else {
            jQuery("#cv").removeClass("error");
        }

        if(jQuery("#template-career .apply-box form input[type='checkbox']").is(":checked")) {
            jQuery("#template-career .apply-box form input[type='checkbox']").removeClass("error");
        }
        else {
            jQuery("#template-career .apply-box form input[type='checkbox']").addClass("error");
        }
    });
    

});
