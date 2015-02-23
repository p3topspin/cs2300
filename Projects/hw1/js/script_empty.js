$(document).ready(function(){

	// Font color change
	

	// Font family change
	

	// Font size change
	


	// TODO: font bold change
	


	// TODO: font italic change
	

	// search functionality
	$("#search").bind('keyup', function(){

		// for each of the paragraphs in main text
		$("#text").children().each(function(){
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