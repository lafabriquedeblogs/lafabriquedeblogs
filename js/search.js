( function( $ , d ) {

	$(d).ready( function(){
		$('#search-icon').on('click', function(e){
			e.preventDefault();
			$(this).toggleClass("open");
			$('#wrapper-searchform').toggleClass("open");
		});
	});
	
} )(jQuery, document);