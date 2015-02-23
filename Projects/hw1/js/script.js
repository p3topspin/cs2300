$(document).ready(function(){

	// Font color change

	$("#red").on('click', function() {
		$("#text").css('color', 'red');
	});
	$("#green").on('click', function() {
		$("#text").css('color', 'green');
	});
	$("#blue").on('click', function() {
		$("#text").css('color', 'blue');
	});

	// Text Display

	$("input[name=hideAll]").on('click', function() {
		$('p').hide();
	});
	$("input[name=showAll]").on('click', function() {
		$('p').show();
	});

	// Font size change
	
	$("input[name=font]").on('keyup', function() {
		$size = $(this).val();
		if($size < 8) {
			$('#sizeWarning').html("That font size is too small!");
		}
		else if($size > 80) {
			$('#sizeWarning').html("That font size is too big!");
		}
		else {
			$('#sizeWarning').html("");
			$('#text').css('font-size', $size + "px");
		}
	});

	// Image Altering

	$("input[name=pokemonReturn]").on('click', function() {
		$(".pokedex-icon").attr("src", "img/pokeball.jpg")
	});
	$("input[name=pokemonGo]").on('click', function() {
		$(".pokedex-icon").each(function() {
			$id = $(this).parent().attr('id');
			$(this).attr("src", "img/" + $id + ".jpg");
		});
	});
	

	// search functionality
	$("#search").bind('keyup', function(){

		// for each of the paragraphs in main text
		$("#text").find("p").each(function(){
			//retrieve the current HTML
			var currentString = $(this).html();

			//Remove existing highlights
			currentString = replaceAll(currentString, "<span class=\"matched\">","");
			currentString = replaceAll(currentString, "</span>","");

			// add in new highlights
			currentString = replaceAll(currentString, $("#search").val(), "<span class=\"matched\">$&</span>");

			// replace the current HTML with highlighted HTML
			$(this).html(currentString);
		});
	});

	// TODO: replace functionality
	$('#replace').on('click', function(){
		var old = $("#original").val();
		var replace = $("#newtext").val();

		$("#text").children().each(function(){
			//retrieve the current HTML
			var currentString = $(this).html();

			currentString = replaceAll(currentString, old, replace);

			// replace the current HTML with highlighted HTML
			$(this).html(currentString);
		});
	})
	// EXTRA CREDIT: form submission
	// hint: set values for both hidden fields, so that those values can be used later
	
	
	// EXTRA CREDIT: apply previous formatting settings
	// hint: readCookie might be useful
	// readCookie taken from http://www.quirksmode.org/js/cookies.html
	// readCookie returns value, or null if cookie has not been set
	function readCookie(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for(var i=0;i < ca.length;i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1,c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		}
		return null;
	}
	
	
});

/* Replaces all instances of "replace" with "with_this" in the string "txt"
using regular expressions -- SEE BELOW */
function replaceAll(txt, replace, with_this) {
	return txt.replace(new RegExp(replace, 'g'),with_this);
}

// taken from Yahoo UI
function isNumber(o) {
	return typeof o === 'number' && isFinite(o);
}