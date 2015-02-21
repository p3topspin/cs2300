//Wait until ready for input
jQuery(document).ready(function($) {
    
    //Show general search box on #search click and give focus
    $("#search").click(function(event) {
    	$(".hidden").slideToggle('fast');
    	$(".hidden .search .focus").focus();
    });    

    //Toggle between advanced and general search and give focus on .option click
    $(".option").click(function(event) {
    	$(".advanced").slideToggle('fast');
    	$(".general").slideToggle('fast');
    	$(".hidden .search .focus").focus();
    });

});
