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

			//read data
			$file = 'data.txt';
			$articles = json_decode(file_get_contents($file));
			
			//get injection-safe _GET data
			$query = htmlentities($_GET['search']);
			$title = htmlentities($_GET['title']);
			$author = htmlentities($_GET['author']);
			$category = htmlentities($_GET['category']);
			$content = htmlentities($_GET['content']);
			$date = htmlentities($_GET['date']);
			
			//If one of (title | author | category | content | date) is not empty,
			//user has performed an advanced search. Perform it and print results.
			if((! empty($title)) || (! empty($author)) || (! empty($category)) || (! empty($content)) || (! empty($date))) {
				$advanced = advancedSearch($title, $author, $category, $content, $date, $articles);
				printArticles($advanced);
			}

			//Otherwise, perform general search and print results.
			else {
				$general = search($query, $articles);
				printArticles($general);
			}

			?>
			
		</div>
	</div>
</body>

</html>