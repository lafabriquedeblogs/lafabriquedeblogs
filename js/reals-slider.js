( function( $ ) {

	$(document).ready( function(){
		
		if( slick_lafab ){
		
			var timerSlider;
			var timerOn = false;
			var timerPaused = false;
			
			var slider1 = $('#slider-1').slick({ fade: true, arrows: false });
			var slider2 = $('#slider-2').slick({ fade: true, arrows: false });
			
			var slider_desc_1 = $("#reals-slideshow-1 .slider-content ul");
			var slider_desc_2 = $("#reals-slideshow-2 .slider-content ul");
			
			slider1.on('beforeChange', function(event, slick, currentSlide, nextSlide){
			
				slider_desc_1.find('[data-key="' + currentSlide + '"]').fadeOut();
				slider_desc_1.find('[data-key="' + nextSlide + '"]').fadeIn();
				
				if( $(window).innerWidth() < 1130 ){
					//console.log( $(window).innerWidth() );
					var hh = slider_desc_1.find('[data-key="' + nextSlide + '"]').height();
					$("#reals-slideshow-1 .slider-content").css("margin-bottom",hh + "px");	
				}
			
			});
			
			slider2.on('beforeChange', function(event, slick, currentSlide, nextSlide){
				slider_desc_2.find('[data-key="' + currentSlide + '"]').fadeOut();
				slider_desc_2.find('[data-key="' + nextSlide + '"]').fadeIn();
			});		
			
			slider1.on('swipe', function(event, slick, direction){
				stopSlider();
			});
			slider2.on('swipe', function(event, slick, direction){
				stopSlider();
			});
			
			function startSLider(){
				if(timerPaused){
					nextSlides();
				}
				timerSlider = setInterval( nextSlides , 6000);
				$("#timer-slider").addClass("active");
			}
			
			function stopSlider(){
				clearInterval( timerSlider );
				$("#timer-slider").removeClass("active");
			}
			
			function nextSlides(){
				slider1.slick('slickNext');
				setTimeout(function(){slider2.slick('slickNext');}, 300);
			}
			
			function timerSliderfunc(){
				
				if( !timerOn ){
					stopSlider();
					
					timerOn = true;
				} else {
					startSLider();
					
					timerOn = false;
				}
			}
			
			if( $("#timer-slider").length > 0 ){
				startSLider();
			}
			
			$("#timer-slider").on("click", function(e){
				e.preventDefault();
				timerSliderfunc();
				timerPaused = true;
			});	
		
		}
			
	});
	
} )(jQuery);