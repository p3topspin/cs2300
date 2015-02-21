<!DOCTYPE html>
<head>
	<!--Gets static head and required assets-->
	<?php require 'static/head.php';?>
</head>

<body>
	<div class="wrap">

		<!--Gets static navigation bar-->
		<?php require 'static/navigation.php';?>

		<div class="main">

			<!-- Get required PHP functions -->
			<?php require 'static/main.php';?>

			<?php

			//Display list of all articles
			$file = 'data.txt';
			$articles = json_decode(file_get_contents($file));
			printArticles($articles);

			?>
		</div>
		
	</div>
</body>

</html>