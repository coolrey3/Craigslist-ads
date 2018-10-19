
jQuery(function($){
	$(".athlete_footer_customer_service").click(function() {
		alert("Thanks for clicking on the footer!");
	})
})


//jQuery(function($){
	//$(".logo").mouseover(function() {
		//$('.logo-container').css('backgroundColor','rgb(75, 75, 75)')
		
		//$(".logo").mouseout(function() {
		//$('.logo-container').css('backgroundColor','rgba(0, 0, 0, 0)')
//		alert("Thanks for hovering over the logo! ~RAY:JS Test");
	//})
	//})
//})

jQuery(function($){

	 $(".slider-container").mouseover(function() {
	// $('.scrollshop').click(function() {
        $(this).animate({
            left: '520px'
       }, 400);
    
    $('.slider-container').animate({
    left: '285px'
    }, 400);
    
	});
	//$(this).css('visibility', 'hidden');
		
//	});
	
	 $(".slider-container").mouseout(function() {
	 		$('.slider-container').css('visibility', 'visible');
		})
});


jQuery(function($) {
	$(".footer-subscribe").click(function() {
		$('.slider-container').css('visibility', 'visible');
		
//		alert("you just clicked on the newsletter")
		
		});
	});
	
	
	
	
	
	
	
	
var main = function() {
//	alert("this is a test alert to run on page load")
	};

	
	
	
jQuery(document).ready();




