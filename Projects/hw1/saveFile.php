<?php
$file = "pokedex.txt";
$data = $_POST['hiddentext'];
file_put_contents($file, $data);
?>
<h1>Success!</h1>
<a href="index.php">Go back</a>