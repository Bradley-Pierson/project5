<!DOCTYPE html>
<html>
	<!--
	This provided file is the front page that links to two of the files
	you are going to write, signup.php and matches.php.
	You can modify this file as necessary to move redundant code out to common.php.
	-->
	
	<head>
		<title>Match</title>
		
		<meta charset="utf-8" />
		
		<!-- instructor-provided CSS and JavaScript links; do not modify -->
		<link href="heart.gif" type="image/gif" rel="shortcut icon" />
		<link href="match.css" type="text/css" rel="stylesheet" />
		
		<script src="http://ajax.googleapis.com/ajax/libs/prototype/1.7.0.0/prototype.js" type="text/javascript"></script>
		
	</head>

	<body>


		<?php
		// define variables and set to empty values
		$nameErr = "";
		$name = "";
		
		session_start();
		$nameErr = $_SESSION['nameErr'];
		?>

		<div id="bannerarea">
			<img src="match.png" alt="banner logo" /> <br />
			where meek geeks meet
		</div>

		<div>
			

			<form action="matches-submit.php?name=$name" method="get">
				<fieldset>
				<legend>Returning User:</legend>
				<br> <strong> Name: </strong> <input type="text" name="name" size="15"> <span class="error">* <?php echo $nameErr;?></span> </br>
				<input type="submit" value="Submit">
				</fieldset>
			</form>

		</div>

		<!-- shared page bottom HTML -->
		<div>
			<p>
				This page is for single nerds to meet and date each other!  Type in your personal information and wait for the geek love to begin!  Thank you for using our site.
			</p>
			
			<p>
				Results and page (C) Copyright Match Inc.
			</p>
			
			<ul>
				<li>
					<a href="index.php">
						<img src="back.gif" alt="icon" />
						Back to front page
					</a>
				</li>
			</ul>
		</div>



	</body>
</html>