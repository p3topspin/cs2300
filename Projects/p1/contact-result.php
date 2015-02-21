<!DOCTYPE html>
<head>
	<!--Gets static head and required assets-->
	<?php require 'static/head.php';?>

	<!--Get form response from contact.php and send e-mail with contents-->
	<?php

	//Initialize as false, but if input is valid override
	$isLegitEmail = false;

	//Checks whether a form was actually submitted
	if (isset($_POST['submit'])) {

		//User's name
		$name = $_POST["name"];

		//My email
		$to = "krs252@cornell.edu";

		//User's email
		$from = $_POST["email"];

		//User's phone number
		$phone = $_POST["phone"];

		//Email subject
		$subject = $_POST["subject"];

		//Create e-mail content based on message
		$message = "You've received a new message from $name:\n\n";
		$message .= $_POST["message"];
		$message .= "\n\nRespond to $name:\nE-mail: $from\nPhone: $phone";

		//Add sender's email address to headers
		$headers = "From: $from";

		//Send email with above contents IF email address is valid. If it is,
		//initialize isLegitEmail to true. Otherwise, it stays false as above.
		$isLegitEmail = sendMessage($from, $to, $subject, $message, $headers);
	}

	//Checks if user's email matches template blah@blah.blah. If it does,
	//send an email and return true. Else, return false.
	function sendMessage($from, $to, $subject, $message, $headers) {
		if (preg_match('/[\w\.]+@[\w\.]+\.[\w]+/', $from)) {
			mail($to, $subject, $message, $headers);
			return true;
		}
		return false;
	}
	?>

</head>

<body>
	<div class="wrap">
		<div class="section-fullscreen centered centered-vertical" id="bg1">

			<!--Gets static navigation bar-->
			<?php require 'static/navigation.php';?>

			<h1 class="sans-serif bold huge white" style="padding: 5%;">

				<!-- Checks $isLegitEmail above. If the user entered a valid email, say thanks, otherwise, whoops. -->
				<?php
				if ($isLegitEmail) {
					print("Thanks!");
				} else {
					print("Whoops!");
				}
				?>

			</h1>
			<h1 class="serif big white" style="padding: 5%;">

				<!-- Checks $isLegitEmail above. If the user entered a valid email, say sent, otherwise, check it. -->
				<?php
				if ($isLegitEmail) {
					print("Your message has been sent.  ");
				} else {
					print("Let's check that e-mail.  ");
				}
				?>

				<a class="white-underlined" href="contact.php">Go back</a>
			</h1>
		</div>
	</div>
</body>

</html>
