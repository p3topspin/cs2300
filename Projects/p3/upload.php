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

	<?php require_once 'static/config.php';
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>

	<div class="main upload">
		<form action="upload.php" method="post" enctype="multipart/form-data">
			<input type="file" name="newphoto" />
			Title
			<input type="text" name="title" placeholder="Title"/>
			Author
			<input type="text" name="author" placeholder="Author"/>
			Album<br>(if it does not exist it will be created)
			<input type="text" name="album" placeholder="Album"/>
			<input type="submit" name="submit" value="Upload" />
		</form>


		<?php

//check if form is submitted
if (isset($_POST['submit'])) {

	//check if a file has been selected
	if (!empty($_FILES['newphoto'])) {

		$newPhoto = $_FILES['newphoto'];

		//sanitize filename for URL
		$fileName = $newPhoto['name'];
		$fileName = filter_var($fileName, FILTER_SANITIZE_URL);

		//check that there are no errors
		if ($newPhoto['error'] == 0) {

			//upload selected file
			$tempName = $newPhoto['tmp_name'];
			move_uploaded_file($tempName, "img/$fileName");

			$metadata = array("title" => "Untitled", "URL" => "img/$fileName", "author" => "Anonymous");

			if (!empty($_POST['title'])) {
				$title = $_POST['title'];
				$metadata["title"] = $title;
			}

			if (!empty($_POST['author'])) {
				$author = $_POST['author'];
				$metadata["author"] = $author;
			}

			//print_r($metadata);

			$imgquery = "INSERT INTO images (";

			$size = count($metadata);

			foreach ($metadata as $key => $value) {
				$imgquery .= $key;
				$size = $size - 1;

				if ($size > 0) {
					$imgquery .= ", ";
				}
			}

			$imgquery .= ") VALUES (";

			$size = count($metadata);

			foreach ($metadata as $key => $value) {
				$imgquery .= '"' . $value . '"';
				$size = $size - 1;

				if ($size > 0) {
					$imgquery .= ", ";
				}
			}

			$imgquery .= ");";

			$insertImage = $mysqli->query($imgquery);

			$query = $mysqli->query("SELECT MAX(imgID) FROM images");
			$results = $query->fetch_row();
			$imgID = $results[0];

			$album = $_POST['album'];
			$album = filter_var($album, FILTER_SANITIZE_STRING);

			$query = $mysqli->query('SELECT albumID FROM albums WHERE albumTitle = "' . $album . '";');

			//album exists
			if (mysqli_num_rows($query) > 0) {
				echo ("Album " . $album . " exists. Adding images... <br>");

				$albumID = $query->fetch_row();
				$albumID = $albumID[0];

				$groups = $mysqli->query("INSERT INTO groups ( imgID, albumID ) VALUES ( $imgID , $albumID );");
				echo ("Image successfully uploaded.");

			}

			//album does not exist. create it
			else {
				echo ("Creating Album " . $album . ". <br>");
				$albums = $mysqli->query('INSERT INTO albums (albumTitle) VALUES ("' . $album . '");');

				$query = $mysqli->query("SELECT MAX(albumID) FROM albums");
				$results = $query->fetch_row();
				$albumID = $results[0];

				$groups = $mysqli->query("INSERT INTO groups ( imgID, albumID ) VALUES ( $imgID , $albumID );");

				echo ("Image successfully uploaded.");
			}

		} else {
			print("Error: The file $fileName could not be uploaded.\n");
		}
	}
}

?>
</div>

</body>

</html>