<?php
$file = "pokedex.txt";
if(isset($_POST['hiddentext'])) {
	$data = $_POST['hiddentext'];
	if(! empty($data)) {
		file_put_contents($file, $data);
	}
	echo '
	<h1>Success!</h1>
	<a href="index.php">Go back</a>
	';
}
else {
	echo '
	<h1>Error! Did you change anything?</h1>
	<a href="index.php">Go back</a>
	';
}
?>