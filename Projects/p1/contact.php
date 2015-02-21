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

			<div id="contact">
				<div class="section padded sans-serif bold huge white">Contact</div>
				
				<form action="contact-result.php" method="post">

					<!--Creates an array with each form object, and then adds them to the contact form with specified $name and $placeholder-->
					<?php
					$forms = array("name" => "Name", "email" => "Email", "phone" => "Phone", "subject" => "Subject");
					foreach ($forms as $name => $placeholder) {
						print('<input class="block padded spaced medium serif" size="30" type="text" name="' . $name . '" placeholder="' . $placeholder . '">');
					}
					?>

					<textarea class="block padded spaced medium serif" rows="6" cols="30" name="message" placeholder="Enter your message here."></textarea>
					<input class="button padded auto-margin block medium serif" name="submit" type="submit" value="Submit">
				</form>

			</div>
		</div>
	</div>
</body>

</html>
