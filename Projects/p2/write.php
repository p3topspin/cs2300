<!DOCTYPE html>
<head>
	<!--Gets static head and required assets-->
	<?php require 'static/head.php';?>
</head>

<body>
	<div class="wrap">

		<!--Gets static navigation bar-->
		<?php require 'static/navigation.php';?>

		<div class="write">

			<!-- Gets required PHP functions -->
			<?php require 'static/main.php';?>

			<?php

			//Setup temp var
			$success = false;

			//Check if form was submitted
			if(isset($_POST['submit'])) 
			{

				//Get injection-safe _POST data
				$title= htmlentities($_POST['title']);
				$author= htmlentities($_POST['author']);
				$category= htmlentities($_POST['category']);
				$image= htmlentities($_POST['image']);
				$content= htmlentities($_POST['content']);

				//Decode data. If data contains no articles set it to a blank array.
				$file = 'data.txt';
				$articles = json_decode(file_get_contents($file));
				if(empty($articles)) {
					$articles = array();
				}

				//First check that all fields are valid. If they are, prepend the
				//new article in data.txt and notify user. Set $success to true
				//so the forms don't re-display.
				if( (!isDupe($title, $articles)) && (isValid($title) === true) && (isValid($author) === true) && (isValid($category) === true) && isPic($image) && (! empty($content)) ) {
					array_unshift($articles, array($title,$author,$category, $content, $image, date("F j, Y"), 0));
					file_put_contents($file, json_encode($articles));
					echo '<div class="notice">Thanks! <a class="link green" href="index.php">Go home</a></div>';
					$success = true;
				}

				//Collection of possible error messages. See main.php for functions used
				//and their specifications.
				else {
					echo '<div class="notice">Please correct the following:</div>';
					if(isDupe($title, $articles)) {
						echo '<div class="notice alert">That article title is already taken.</div>';
					}
					if(isValid($title) === "empty") {
						echo '<div class="notice alert">Please enter an article title.</div>';
					}
					if(isValid($title) === "length") {
						echo '<div class="notice alert">Article titles must be less than 80 characters in length.</div>';
					}
					if(isValid($title) === "invalid") {
						echo '<div class="notice alert">Article titles must contain only letters, numbers, spaces, hyphens, and underscores.</div>';
					}	
					if(isValid($author) === "empty") {
						echo '<div class="notice alert">Please enter an article author.</div>';
					}
					if(isValid($author) === "length") {
						echo '<div class="notice alert">Article authors must be less than 80 characters in length.</div>';
					}
					if(isValid($author) === "invalid") {
						echo '<div class="notice alert">Article authors must contain only letters, numbers, spaces, hyphens, and underscores.</div>';
					}
					if(isValid($category) === "empty") {
						echo '<div class="notice alert">Please enter an article category.</div>';
					}
					if(isValid($category) === "length") {
						echo '<div class="notice alert">Article categories must be less than 80 characters in length.</div>';
					}
					if(isValid($category) === "invalid") {
						echo '<div class="notice alert">Article categories must contain only letters, numbers, spaces, hyphens, and underscores.</div>';
					}
					if(empty($content)) {
						echo '<div class="notice alert">Please enter some content for your article.</div>';
					}
					if (!isPic($image)) {
						echo '<div class="notice alert">Please enter a valid image URL.</div>';
					}
				}
			}

			//If the form hasn't been submitted or there are errors,
			//display the write form for corrections
			if(! $success) {
				echo '
				<form class="form" action="write.php" method="post">
					<input class="input" type="text" name="title" value="'; if (isset ($_POST['title'])) echo (htmlentities($_POST['title'])); echo '" placeholder="Title">
					<input class="input" type="text" name="author"  value="'; if (isset ($_POST['author'])) echo (htmlentities($_POST['author'])); echo '" placeholder="Author">
					<select class="input selectable" name="category">
						<option value="Business" '; if (isset($_POST['category']) && ($_POST['category']) == "Business") echo ('selected="selected"'); echo '>Business</option>
						<option value="Politics" '; if (isset($_POST['category']) && ($_POST['category']) == "Politics") echo ('selected="selected"'); echo '>Politics</option>
						<option value="Entertainment" '; if (isset($_POST['category']) && ($_POST['category']) == "Entertainment") echo ('selected="selected"'); echo '>Entertainment</option>
						<option value="Science" '; if (isset($_POST['category']) && ($_POST['category']) == "Entertainment") echo ('selected="selected"'); echo '>Science</option>
						<option value="Tech" '; if (isset($_POST['category']) && ($_POST['category']) == "Tech") echo ('selected="selected"'); echo '>Tech</option>
						<option value="World" '; if (isset($_POST['category']) && ($_POST['category']) == "World") echo ('selected="selected"'); echo '>World</option>
					</select>
					<input class="input" type="text" name="image" value="'; if (isset ($_POST['image'])) echo (htmlentities($_POST['image'])); echo '" placeholder="Image">
					<textarea class="input posteditor" rows="10" name="content" placeholder="Enter the content of your post here.">'; if (isset ($_POST['content'])) echo (htmlentities($_POST['content'])); echo '</textarea>
					<input class="input submit" name="submit" type="submit" value="Submit">
				</form>
				';
			}

			?>
			
		</div>
	</div>
</body>

</html>