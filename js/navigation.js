( function( $ ) {

	$(document).ready( function(){
		//var openedSubMenu;
				
		$("#main-nav").on("click",".has-children > a", function(e){
			e.preventDefault();
			var el = $(this).parent().children("ul");
			
			if( el.hasClass("open") ){
				el.removeClass("open").hide();
				return;
			}
			$("#main-nav .has-children > ul.sub-menu").hide();
			el.addClass("open").show();
			
			
			
		});
		
		$("#under-menu-active").on( 'click', function(e){
			e.preventDefault();
			//alert("body clicked");
			$(".hamburger").trigger("click");
		});	

		
		/*
			$(window).on("resize", function(){
				if( $(window).innerWidth() < 740 ){
					$(".comment-list").hide();
					$(".comments-title").on("click", function(){
						$(".comment-list").toggle();
					})
				} else {
					$(".comment-list").show();
					$(".comments-title").on("click", function(e){
						e.preventDefault();
					})
				}
				
			});
		*/
	});
} )(jQuery);