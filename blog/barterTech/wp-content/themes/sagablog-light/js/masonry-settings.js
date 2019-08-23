// Masonry settings to organize front page type 'Boxed' and footer widgets
var enquire;
    
( function($) { 
    
    "use strict"; 

$(window).load(function() {  

    var container = $('.footer-widgets');
    enquire.register("screen and (min-width:715px)", {

        // Triggered when a media query matches.
        match : function() {
            container.masonry({
                columnWidth: '.widget',
                itemSelector: '.widget',
                singleMode:true,
                isFitWidth: true,
                isAnimated: true
            }).imagesLoaded(function() {
		container.masonry('reloadItems');
	});
        },      

        // Triggered when the media query transitions 
        // *from a matched state to an unmatched state*.
        unmatch : function() {
            container.masonry('destroy');
        }   
        
    });
    
       var indexcontainer1 = $('.masonry-container1');
       
        enquire.register("screen and (min-width:600px)", {

        // Triggered when a media query matches.
        match : function() {
            indexcontainer1.masonry({
                columnWidth: 280,
                itemSelector: 'article',
                singleMode:true,
                isFitWidth: true,
                isAnimated: true
            }).imagesLoaded(function() {
		indexcontainer1.masonry('reloadItems');
	});
        },      

        // Triggered when the media query transitions 
        // *from a matched state to an unmatched state*.
        unmatch : function() {
            indexcontainer1.masonry('destroy');
        }   
        
    });

    
       var indexcontainer3 = $('.no-sidebar .masonry-container1');
        enquire.register("screen and (min-width:600px)", {

        // Triggered when a media query matches.
        match : function() {
            indexcontainer3.masonry({
                columnWidth: 280,
                itemSelector: 'article',
                singleMode:true,
                isFitWidth: true,
                isAnimated: true
            }).imagesLoaded(function() {
		indexcontainer3.masonry('reloadItems');
	});
        },      

        // Triggered when the media query transitions 
        // *from a matched state to an unmatched state*.
        unmatch : function() {
            indexcontainer3.masonry('destroy');
        }          
    });    
        
});  

} )( jQuery );