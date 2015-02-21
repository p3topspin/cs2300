<!DOCTYPE html>
<head>
	<!--Gets static head and required assets-->
	<?php require 'static/head.php';?>
</head>

<body>
	<div class="wrap">
		<div class="section-fullscreen centered centered-vertical" id="bg1">

			<!--Gets static navigation bar-->
			<?php require 'static/navigation.php';?>

			<div id="work">
				<h1 class="sans-serif bold huge padded white" style="padding-bottom: 5%;">My Work</h1>
				<h1 class="serif big padded white" style="padding-bottom: 5%;">Photography</h1>

				<!--Populates page with images from img/work folder.
				Creates an array of src locations for 25 images in the folder,
				then adds each of those to an img tag in the #work div.-->
				<?php
				$images = array();
				for ($i = 2; $i < 26; $i++) {
					$images[] = 'img/work/' . $i . '.jpg';
				}
				foreach ($images as $index => $source) {
					print('<img class="image" alt="" src="' . $source . '">');
				}
				?>

				<h1 class="serif big padded white" style="padding-bottom: 5%;">Film</h1>

				<!--Embeds for Youtube/Vimeo uploads, styled in stylesheet.css-->
				<iframe src="http://www.youtube.com/embed/t_QB39rlbw8 " allowfullscreen></iframe>
				<iframe src="http://www.youtube.com/embed/wJfNRpjpqqU " allowfullscreen></iframe>
				<iframe src="http://player.vimeo.com/video/88011470 " allowfullscreen></iframe>
				<iframe src="http://www.youtube.com/embed/x4n9g_zAC20 " allowfullscreen></iframe>
			</div>
		</div>
	</div>
</body>

</html>
