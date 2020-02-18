( function() {
	
	// Look for .hamburger
	var hamburger = document.querySelector(".hamburger");
	var mainMenu = document.querySelector("#main-nav");
	var wrapperHamburger = document.querySelector(".wrapper-hamburger");
	var body = document.getElementsByTagName("BODY")[0];
	// On click
	hamburger.addEventListener("click", function() {
		hamburger.classList.toggle("is-active");
		mainMenu.classList.toggle("is-active");
		wrapperHamburger.classList.toggle("is-active");
		body.classList.toggle("menu-active");
		
		jQuery('#search-icon').removeClass("open");
		jQuery('#wrapper-searchform').removeClass("open");			
	});
	
} )();