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

if (isset($_GET['albumTitle'])) {
	$result = $mysqli->query('SELECT * FROM images INNER JOIN groups ON images.imgID = groups.imgID INNER JOIN albums ON groups.albumID = albums.albumID WHERE albumTitle = "' . $_GET['albumTitle'] . '"');
} else {
	$result = $mysqli->query("SELECT * FROM images");
}
while ($row = $result->fetch_assoc()) {
	printImage($row);
}

?>

	</div>

</body>

</html>