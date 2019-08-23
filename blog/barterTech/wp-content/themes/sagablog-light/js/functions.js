/* 
 * Theme functions js file.
 * 
 * @package sagablog
 */

( function($) {
    
    "use strict";
   
    $(document).ready(function(){     

        /*Owl Carousel*/     

        //****************************************************************************
        //Main slider type1 - in header
        //****************************************************************************
         $(".site header .mainslider-type1").owlCarousel({
                        margin:5,
                        loop: true,
                        autoplay: false,
                        dots: false,
                        nav:true,
                        navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
                        responsiveClass:true,
                        responsive:{ //Adaption based on screen resolution
                                0:{
                                        items:1
                                },
                                600:{
                                        items:2
                                },
                                1000:{
                                        items:3
                                }
                        }
         });
        //****************************************************************************
        //Main slider type1 - in content area
        //****************************************************************************
         $(".site-main .mainslider-type11").owlCarousel({
                        margin:5,
                        loop: true,
                        autoplay: false,
                        dots: false,
                        nav:true,
                        navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
                        responsiveClass:true,
                        responsive:{ //Adaption based on screen resolution
                                0:{
                                        items:1
                                },
                                600:{
                                        items:2
                                }
                        }
         });         

        //****************************************************************************
        //Main slider type2 - in header
        //****************************************************************************
         $(".site-header .mainslider-type2").owlCarousel({
                        margin:5, 
                        loop: true,
                        autoplay: false,
                        dots: false,
                        animateOut: 'fadeOut',
                        nav:true,
                        navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
                        responsiveClass:true,
                        responsive:{ //Adaption based on screen resolution
                                0:{
                                        items:1
                                },
                                600:{
                                        items:1
                                },
                                1000:{
                                        items:1
                                }
                        }
         });
        //****************************************************************************
        //Main slider type2 - in content area
        //****************************************************************************
         $(".content-area .mainslider-type22").owlCarousel({
                        margin:5, 
                        loop: true,
                        autoplay: false,
                        dots: false,
                        animateOut: 'fadeOut',
                        nav:true,
                        navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
                        responsiveClass:true,
                        responsive:{ //Adaption based on screen resolution
                                0:{
                                        items:1
                                },
                                600:{
                                        items:1
                                },
                                1000:{
                                        items:1
                                }
                        }
         });         

        //**************************************************************************** 
        //Modal window for search
        //****************************************************************************
	$('.popup-with-form').magnificPopup({
		type: 'inline',
		preloader: false,
		focus: '.search-field',

		// When elemened is focused, some mobile browsers in some cases zoom in
		// It looks not nice, so we disable it:
		callbacks: {
			beforeOpen: function() {
				if($(window).width() < 700) {
					this.st.focus = false;
				} else {
					this.st.focus = '.search-field';
				}
			}
		}
	});

        //**************************************************************************** 
        //Go to top
        //****************************************************************************
        $(window).scroll(function() {
 
            if($(this).scrollTop() > 100) {
                $('#gototop').fadeIn('slow');
                    $("#gototop").show();

            } else {
                    $('#gototop').fadeOut('slow');
                    $("#gototop").hide();
            }
        });

        $('#gototop').click(function() {

            $('body,html').animate({ scrollTop: 0 }, 800);
            return false;

        });

       //****************************************************************************
        //Hide search form if menu is open (for menu-toggle )
        //****************************************************************************   
        var expand=$('.menu-toggle').attr('aria-expanded');
        var container= $('.menu-container');
        var win_w = $(window).width();     
        if (win_w<801 && expand==='true'){  
            container.css('display','none');
        }
        if (win_w<801 && expand==='false'){  
            container.css('display','block');
        }

        var btn= $('.menu-toggle');
            btn.click(function() {
                    if (container.css('display') !== "block") { 
                        container.css('display',"block"); //Show container
                    }
                    else container.css('display',"none"); //Hide container
                }
        );


        $(window).resize(function(){
        //Hide search form if menu is open (for menu-toggle )
        var page_w = $("html").width(); 
        var expandresize=$('.menu-toggle').attr('aria-expanded');
        if (page_w>=801){
            container.css('display','block');
        } else {
                
            if (expandresize==='true'){  
                 container.css('display','none');
             }
             if (expandresize==='false'){  
                 container.css('display','block');
             }                
        }       
        
        });


    });
} )( jQuery );