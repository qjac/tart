$(document).ready(function(){

	$(function(){
		$('#menu').slicknav({
			prependTo:'#mobile-nav'
		});
	});

// equalize heights of product listings
(function($){
	function equalizeHeights(selector) {
		var heights = new Array();

		// Loop to get all element heights
		$(selector).each(function() {

			// Need to let sizes be whatever they want so no overflow on resize
			$(this).css('min-height', '0');
			$(this).css('max-height', 'none');
			$(this).css('height', 'auto');

			// Then add size (no units) to array
	 		heights.push($(this).outerHeight());
		});

		// Find max height of all elements
		var max = Math.max.apply( Math, heights );

		// Set all heights to max height
		$(selector).each(function() {
			$(this).css('height', max + 'px');
		});	
	}

	$(window).load(function() {
		// Fix heights on page load
		equalizeHeights('.equalhi');

		// Fix heights on window resize
		$(window).resize(function() {

			// Needs to be a timeout function so it doesn't fire every ms of resize
			setTimeout(function() {
	      		equalizeHeights('.equalhi');
			}, 120);
		});
	});
})(jQuery);



		// var frmvalidator  = new Validator("contactform");
		// frmvalidator.addValidation("name","req","Please provide your name");
		// frmvalidator.addValidation("email","req","Please provide your email");
		// frmvalidator.addValidation("email","email",
		//   "Please enter a valid email address");
	

// if ($('#contactForm').length) {
// 	$('#contactForm input:text, #contactForm textarea').first().focus();
// 	$('#contactForm').validate({
// 	   rules: {
// 	     email: {
// 	        required: true,
// 	        email: true
// 	     },
// 	   }, //end rules
// 	   messages: {
// 	      name: {
// 	         required: "Please tell us your name.",
// 	       },
// 	       email: {
// 	         required: "Please supply an e-mail address.",
// 	         email: "This is not a valid email address."
// 	       },
// 	       message: {
// 	         required: "Please leave a message.",
// 	       },
// 	   },
// 	   errorPlacement: function(error, element) { 
// 	       if ( element.is(":radio") || element.is(":checkbox")) {
// 	          error.appendTo( element.parent());  
// 	          /*
// 				CN - appendTo() adds HTML as the last child element of the selected element.
// 				Here the element.parent() is the div where the radios and checkboxes are nested,
// 				so the error is addes just before the </div>.
// 	          */
// 	        } else {
// 	          error.insertAfter(element);
// 	        } 
// 	    } 

// 	  }); // end validate 
// 	}
}); //end ready

