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

			<!--Gets required PHP functions-->
			<?php require 'static/main.php';?>

			<!-- Get articles from data.txt, decode json data, find queried article and then view it -->
			<?php

			$file = 'data.txt';
			$articles = json_decode(file_get_contents($file));
			
			$current = $_GET['article'];
			$toprint = findArticle($current, $articles);

			//Find selected article $query in array $array
			function findArticle($query, $array) {
				$toprint = array();
				$found = false;
				for ($i1 = 0; $i1 < count($array); $i1++) {
					if(stripos($array[$i1][0], $query) !== false) {
						$toprint[] = $array[$i1];
					}
				}
				return $toprint;
			}

			view($toprint);

			?>
			
		</div>
	</div>
</body>

</html>