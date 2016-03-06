$(document).ready(function() {

	var windowHeight = $(window).height();
	$(".contentContainer").css("min-height", windowHeight);
	$("textarea").css("height", windowHeight-110);

	$("textarea").keyup(function() {
		
		$.post("updatediary.php", { diary: $("textarea").val() } );

	});

});