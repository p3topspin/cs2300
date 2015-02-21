//Wait until ready for input
jQuery(document).ready(function($) {
    //Show hidden menu items on #menu click
    $("#menu").click(function(event) {
    	$(".hidden").fadeIn('slow');
    });
    //Hide hidden menu items on #close click
    $("#close").click(function(event) {
    	$(".hidden").fadeOut('slow');
    });

    //If user is not on a mobile device, increase the size of the headshot on about.php
    //Using Javascript media queries by user sweets-BlingBling on StackOverflow
    //http://stackoverflow.com/questions/3514784/what-is-the-best-way-to-detect-a-mobile-device-in-jquery
    if (!(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))) {
        // On mouse hover, increase size to 20%
        $('.headshot').mouseenter(function() {
          $(this).stop().animate({
             width: "20%"
         });
      });
        // On mouse leave, increase size to 20%
        $('.headshot').mouseleave(function() {
          $(this).stop().animate({
             width: "10%"
         });
      });
    };
});
