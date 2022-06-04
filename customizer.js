( function($){
    wp.customize("header_image", function(value){
	value.bind(function(newval){
	    console.log("OPPAI");
	    $("header").css("background-color", newval);
	});
    });
})(jQuery);
