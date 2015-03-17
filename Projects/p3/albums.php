<!DOCTYPE html>
<head>

	<!--Gets static head and required assets-->
	<?php require 'static/head.php';?>

</head>

<body>

	<!--Gets static navigation bar-->
	<?php require 'static/navigation.php';?>

	<!--Gets static PHP functions-->
	<?php require 'static/main.php';?>

	<div class="main">


				<?php

require_once 'static/config.php';
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$albums = $mysqli->query('SELECT * FROM albums');

while ($album = $albums->fetch_assoc()) {

	$urls = $mysqli->query('SELECT URL FROM images INNER JOIN groups ON images.imgID = groups.imgID INNER JOIN albums ON groups.albumID = albums.albumID WHERE albumTitle = "' . $album['albumTitle'] . '"');
	$images = $urls->fetch_row();
	$image = $images[0];

	echo ('<div class="entry"><a href="index.php?albumTitle=' . $album['albumTitle'] . '"><div class="title data">' . $album['albumTitle'] . '</div><div class="image"><img alt="" src="' . $image . '" /></div></a></div>');

}

?>

	</div>

</body>

</html>



