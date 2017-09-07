/* site functions*/

/* change site to tablet/mobile when a window is/resized below 990px */
$(document).ready(function() {
	if($(window).width() <= 990) {
		$("#mobileMenu").removeClass("hide");
		$("#menu").addClass("hide");
	};
	
	$(window).resize(function() {
		if($(window).width() <= 990) {
			$("#mobileMenu").removeClass("hide");
			$("#menu").addClass("hide");
		} else {
			$("#mobileMenu").addClass("hide");
			$("#menu").removeClass("hide");
		};
	})
	
/* drop down mobile menu*/	
	
	$("#dropButton").click(function() {
		if($("#dropdownMenu").hasClass("hide")) {
			$("#dropdownMenu").removeClass("hide");
			$("#dropdownMenu").addClass("show");
		} else {
			$("#dropdownMenu").addClass("hide");
			$("#dropdownMenu").removeClass("show");
		}
	})
	
/* if user clicks outside the menu, will close the menu */
	$(document).on('click', function(event) {
		if(!$(event.target).closest('#mmBar').length) {
			$("#dropdownMenu").addClass("hide");
			$("#dropdownMenu").removeClass("show");
		}
	});
})