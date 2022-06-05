// Hmmm It's interesting way to use jQuery... 
// In Wordpress, you cannot use $ as a shorthand for "jQuery".
// To mitigate that, you can call an anonymous function which takes jQuery as the only 
// parameter. The simplest form is look like this:
/*
	(function($){// use $ here!})(jQuery);
*/

(function($){

	wp.customize("header_image", function(value){
		value.bind(function(newval){
			$("header").css("background-image", newval);
		});
	});
	
	wp.customize("blogname", function(value){
		value.bind(function(newval){
				$(".rin-blogname").each(function(){
					$(this).html(newval);
			})
		})
	});
	
	wp.customize("blogdescription", function(value){
		value.bind(function(newval){
				$(".rin-blogdescription").each(function(){
					$(this).html(newval);
			})
		});
	});

})(jQuery);
