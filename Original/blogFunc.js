/* blog site style functions*/

$(document).ready(function() {
	/*
	if($(window).width() <= 990) {
		$("#mobileMenuBlog").removeClass("hide");
		//$("#blogBar").addClass("hide");
	};
	
	$(window).resize(function() {
		if($(window).width() <= 990) {
			$("#mobileMenuBlog").removeClass("hide");
			//$("#blogBar").addClass("hide");
		} else {
			$("#mobileMenuBlog").addClass("hide");
			//$("#blogBar").removeClass("hide");
		};
	})
	*/
	/* drop down mobile menu*/
	
	$("#mobileMenuBlog").mouseenter(function() {
		$("#dropdownMenuBlog").removeClass("hide");
	}
	$("#dropdownMenuBlog").mouseleave(function() {
		$("#dropdownMenuBlog").addClass("hide");
	}
	
	/*	
	dropButtonBlog
	mobileMenuBlog
	blogBar
	dropdownMenuBlog
	
	$("#dropdownMenuBlog").hover(function() {
		if($("#dropdownMenuBlog").hasClass("hide")) {
			$("#dropdownMenuBlog").removeClass("hide");
		} else {
			$("#dropdownMenuBlog").addClass("hide");
		}
	}) 
	*/
})