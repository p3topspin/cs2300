<?php 
function printImage($row)
{
	print( '<div class="entry">');
	//title
	if (! ($row['title'] === NULL)) {
		print( '<div class="title data">' . $row['title'] . '</div>');
	}
	//author
	if (! ($row['author'] === NULL)) {
		print( '<div class="author data">by ' . $row['author'] . '</div>');
	}
	//date
	if (! ($row['dupload'] === NULL)) {
		print( '<div class="date data">' . $row['dupload'] . '</div>');
	}
	//image URL
	if (! ($row['URL'] === NULL)) {
		print( '<div class="image"><img src="' . $row['URL'] . '"></div>');
	}
	//exif data	
	print ('<div class="settings data">');
	//aperture
	if (! ($row['fstop'] === NULL)) {
		print( '<div class="exif">f/' . $row['fstop'] . '</div>');
	}
	//shutter
	if (! ($row['shutter'] === NULL)) {
		print( '<div class="exif">' . $row['shutter'] . '</div>');
	}
	//ISO
	if (! ($row['ISO'] === NULL)) {
		print( '<div class="exif">ISO ' . $row['ISO'] . '</div>');
	}
	//focal length
	if (! ($row['focal'] === NULL)) {
		print( '<div class="exif">' . $row['focal'] . 'mm</div>');
	}
	//camera
	if (! ($row['camera'] === NULL)) {
		print( '<div class="exif">' . $row['camera'] . '</div>');
	}	
	//lens
	if (! ($row['lens'] === NULL)) {
		print( '<div class="exif">' . $row['lens'] . '</div>');
	}	
	print( '</div>');
	//caption
	if (! ($row['caption'] === NULL)) {
		print( '<div class="caption data">' . $row['caption'] . '</div>');
	}
	//likes
	if (! ($row['likes'] === NULL)) {
		print( '<div class="likes data">' . $row['likes'] . ' People Like This</div>');
	}
	else {
		print( '<div class="likes data">0 People Like This</div>');
	}
	print( '</div>');
}
?>