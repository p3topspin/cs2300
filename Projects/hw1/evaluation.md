% Evaluation - HW1
% Kevin Schaich (krs252)
% 24 February 2015

I had a bit of experience with jQuery and JavaScript before this class so the three initial functions were relatively simple for me. Font color, text display, and font size were just a matter of figuring out how to select each property I needed to modify.


Image altering was a bit harder. My initial attempt at this problem was to create a .ball CSS rule and when the pokemon Return! button was clicked I would add this class to all the images. I had some difficulty getting this implementation to work and decided instead to loop through each of the .pokedex-icon div's and use their ID's to compute the respective image src attribute.


Replace seemed challenging at first but then I realized the bulk of the functionality was already implemented and we only needed to add a few lines to create the required variables.


As for the advanced functions, I chose the "save text" option. After a lot of thinking and examining of pokedex.txt, I originally started with an AJAX call.
I had a lot of trouble getting this to work. But I eventually decided to save all the text in the #text div (excluding the first h3 div) and then write this to hiddentext. This output produced the same formatting in pokedex.txt. I bound this to the click event for savebutton, and these contents are read in saveFile.php and then updated in pokedex.txt.


This assignment was fun for me and a bit more difficult than I originally gave it credit for. I think the best way of learning new skills (at least for me) is by practicing, so this was a great opportunity to practice some of the more abstract jQuery/Javascript concepts that have been introduced in lecture.
