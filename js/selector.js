( function( $ , d ) {

	$(d).ready( function(){
		$('#gform_wrapper_2').on('click','#field_2_4 label[id*="label_2_4_"], #field_2_13 label[id*="label_2_13_"]', function(){
			
			$(this).toggleClass("selected");
		});
		$('#gform_wrapper_3').on('click','#field_3_4 label[id*="label_3_4_"], #field_3_9 label[id*="label_3_9_"], #field_3_21 label[id*="label_3_21_"],#field_3_23 label[id*="label_3_23_"]', function(e){
			e.preventDefault();
			$(this).toggleClass("selected");
		});

	});
	
} )(jQuery, document);