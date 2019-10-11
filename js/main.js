$("#btnMenu").click(function() {
    $('.menu').toggle();
});

$('.fade-slider').jdSlider({

    isSliding: false,
    isAuto: true,
    isLoop: true,
    isDrag: false,
    interval: 7000,
    isCursor: false,
    speed: 3000

})
    

$(".eligenos .infografia div").hide();

if(window.matchMedia("(max-width:768px)").matches){

	$(".eligenos .infograma").click(function(){	

		$(".eligenos .bloqueRestaurante").slideToggle("fast")

		$(".eligenos .infografia div").slideToggle("fast");	

		$(".eligenos .infografia div").css({"background":"rgba(0,0,0,0.7)"})

		$(".eligenos").css({"margin-top":"0px"})
	})

	$(".eligenos .volverCarta").click(function(){	

		$(".eligenos .bloqueRestaurante").slideToggle("fast")

		$(".eligenos .infografia div").slideToggle("fast");	

		$(".eligenos").css({"margin-top":"-80px"})
	})

}else{

	$(".eligenos .infograma").click(function(){	

		$(".eligenos .bloqueRestaurante").slideToggle("fast")
		
		$(".eligenos").css({"margin-top":"0px"})

		$(".eligenos .infografia div").slideToggle("fast")

		$(".eligenos .infografia div").css({"background":"rgba(0,0,0,0.7)"})
		


		
	});
	$(".eligenos .volverCarta").click(function(){	

		$(".eligenos .bloqueRestaurante").slideToggle("fast")

		$(".eligenos .infografia div").slideToggle("fast");	

		$(".eligenos").css({"margin-top":"-80px"})
	})



}

// === Iteracion Nostros ====


$(".infoEmpresa .grid-item").mouseover(function() {

	$(this).children("figure").css({"height":"25%", "transition":".5s all"})

	$(".itemEmpresa").html($(this).children("figure").children("h1").html());

	$(".descripcionitem").html($(this).children("figure").children("h1").attr("descripcion"));

})


$(".infoEmpresa .grid-item").mouseout(function() {

	$(this).children("figure").css({"height":"100%", "transition":".5s all"})

	$(".itemEmpresa").html($(".itemEmpresa").attr("itemEmpresa"));

	$(".descripcionitem").html($(".descripcionitem").attr("descripcionitem"));

})

/*=============================================
BOTÓN MENÚ
=============================================*/

if(window.matchMedia("(max-width:768px)").matches){

	$(".botonMenu").click(function(){
// manu movil
		$(".menu").slideToggle('fast');
		$(".menu").css({"top":$("header").height()})

	})	

	// menu movil
// 	$(".menu ul li a").click(function(e){

// 		$(".menu").slideToggle('fast');

// 		e.preventDefault();

// 		var vinculo = $(this).attr("href");
		
// 		$("html, body").animate({

// 			scrollTop: $(vinculo).offset().top - 55

// 		}, 1000, "easeInOutBack")

// 	})


// }else{

// 	$(".botonMenu").click(function(){

// 		$(".menu").slideToggle('fast');

// 		$(".formReservas").slideUp('fast');

// 	})

// 	$(".menu ul li a").click(function(e){

// 		$(".menu").slideToggle('fast');

// 		e.preventDefault();

// 		var vinculo = $(this).attr("href");
		
// 		$("html, body").animate({

// 			scrollTop: $(vinculo).offset().top - 74
			

// 		}, 1000, "easeInOutBack")

// 	})

}

/*=============================================
BOTONES IDIOMAS
=============================================*/

$(".idiomaEn").click(function(){

	// $(this).removeClass("bg-white")
	// $(this).removeClass("text-dark")

	// $(this).addClass("selected")
	// $(this).addClass("text-white")

	// $(".idiomaEs").removeClass("selected")
	// $(".idiomaEs").removeClass("text-white")

	// $(".idiomaEs").addClass("bg-white")
	// $(".idiomaEs").addClass("text-dark")
	window.location.href = "https://bartertechnology.com/en";

})

$(".idiomaEs").click(function(){

	// $(this).removeClass("bg-white")
	// $(this).removeClass("text-dark")

	// $(this).addClass("selected")
	// $(this).addClass("text-white")

	// $(".idiomaEn").removeClass("selected")
	// $(".idiomaEn").removeClass("text-white")

	// $(".idiomaEn").addClass("bg-white")
	// $(".idiomaEn").addClass("text-dark")

	window.location.href = "https://bartertechnology.com";

})

$("#redsocials").load("redsocials.html");
$("#menu").load("menu.html");


// var ancho = $(window).width();

// if(ancho > 900){
// 	$('.slide-area').find('.pc').addClass('active1').siblings().removeClass('active1');

// }else if(ancho > 600 ){
// 	$('.slide-area').find('.tablet').addClass('active1').siblings().removeClass('active1');

// }else if(ancho > 450  ){
// 	$('.slide-area').find('.phone').addClass('active1').siblings().removeClass('active1');
// }


// console.log($( '.slide-area' ).width())
// let cTama
// if() 

