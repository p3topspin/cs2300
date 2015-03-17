<!-- Static navigation bar for all pages. -->
<div class="header">
	<div id="scene">
		<a href="index.php">SCENE</a>
	</div>
	<div id="sections">
		<div class="section">
			<a href="index.php?albumTitle=landscapes">LANDSCAPES</a>
		</div>
		<div class="section">
			(more coming soon)
		</div>
		<div class="section">
			<a href="upload.php">UPLOAD</a>
		</div>
		<div class="section">
			<a href="login.php">LOG IN</a>
		</div>
	</div>
	<div id="search">
		<form action="index.php" method="GET">
			<select name="albumID" onchange="this.form.submit()">
				<option>View an Album</option>
				
				<?php 

				require_once 'static/config.php';
				$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
				$result = $mysqli->query('SELECT * FROM albums');

				while ( $row = $result->fetch_row() ) {
					print('<option name="' . $row[1] . '">' .$row[1] . '</option>');
				}

				?>
			</select>
		</form>
	</div>
</div>


