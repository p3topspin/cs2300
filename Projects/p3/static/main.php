<?php 
function printImage($row)
{
	print( '<div class="entry">');
	//title
	if (! ($row[2] === NULL)) {
		print( '<div class="title data">' . $row[2] . '</div>');
	}
	//author
	if (! ($row[3] === NULL)) {
		print( '<div class="author data">by ' . $row[3] . '</div>');
	}
	//date
	if (! ($row[12] === NULL)) {
		print( '<div class="date data">' . $row[12] . '</div>');
	}
	//image
	if (! ($row[1] === NULL)) {
		print( '<div class="image"><img src="' . $row[1] . '"></div>');
	}
	//exif data	
	print ('<div class="settings data">');
	//aperture
	if (! ($row[6] === NULL)) {
		print( '<div class="exif">f/' . $row[6] . '</div>');
	}
	if (! ($row[7] === NULL)) {
		print( '<div class="exif">' . $row[7] . '</div>');
	}
	//ISO
	if (! ($row[8] === NULL)) {
		print( '<div class="exif">ISO ' . $row[8] . '</div>');
	}
	//focal length
	if (! ($row[9] === NULL)) {
		print( '<div class="exif">' . $row[9] . 'mm</div>');
	}
	if (! ($row[10] === NULL)) {
		print( '<div class="exif">' . $row[10] . '</div>');
	}	
	if (! ($row[11] === NULL)) {
		print( '<div class="exif">' . $row[11] . '</div>');
	}	
	print( '</div>');
	//caption
	if (! ($row[4] === NULL)) {
		print( '<div class="caption data">' . $row[4] . '</div>');
	}
	//likes
	if (! ($row[5] === NULL)) {
		print( '<div class="likes data">' . $row[5] . ' People Like This</div>');
	}
	else {
		print( '<div class="likes data">0 People Like This</div>');
	}
	print( '</div>');
}
?>