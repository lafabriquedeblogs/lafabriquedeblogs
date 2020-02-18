( function( $ , d ) {

	$(d).ready( function(){
		$('#gform_wrapper_2').on('click','#field_2_4 label[id*="label_2_4_"], #field_2_13 label[id*="label_2_13_"]', function(){
			
			$(this).toggleClass("selected");
		});
	});
	
} )(jQuery, document);