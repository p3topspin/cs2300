<!DOCTYPE html>
<head>

	<!--Gets static head and required assets-->
	<?php require 'static/head.php';?>

</head>

<body>

	<!--Gets static navigation bar-->
	<?php require 'static/navigation.php';?>

	<div class="main">

		<?php 

		require_once 'static/config.php';
		$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );

		$result = $mysqli->query("SELECT * FROM images INNER JOIN groups ON images.imgID = groups.imgID INNER JOIN albums ON groups.albumID = albums.albumID");
		while ( $row = $result->fetch_row() ) {
			print( '<div class="title">' . $row[2] . '</div>');
			print( '<div class="image"><img src="' . $row[1] . '"></div>');
			for ($i=3; $i < 11; $i++) {
				if (! ($row[$i] === NULL)) {
					print( '<div class="ditem">' . $row[$i] . '</div>');
				}
			}
		}

		?>
		TESTINGNGGGG

	</div>

</body>

</html>