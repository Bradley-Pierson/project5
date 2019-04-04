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
		$nameErr = $genderErr = $ageErr = $personalityErr = $minErr = $maxErr = "";
		$name = $gender = $age = $personality = $min = $max = "";
		

		session_start();
		if(!empty($_SESSION['nameErr'])){
		$nameErr = $_SESSION['nameErr'];		
		}
		if(!empty($_SESSION['genderErr'])){
		$genderErr = $_SESSION['genderErr'];		
		}
		if(!empty($_SESSION['ageErr'])){
		$ageErr = $_SESSION['ageErr'];	
		}
		if(!empty($_SESSION['personalityErr'])){
		$personalityErr = $_SESSION['personalityErr'];	
		}
		if(!empty($_SESSION['minErr'])){
		$minErr =  $_SESSION['minErr'];		
		}
		if(!empty($_SESSION['maxErr'])){
		$maxErr = $_SESSION['maxErr'];		
		}										
		session_destroy();
		?>










		<div id="bannerarea">
			<img src="match.png" alt="banner logo" /> <br />
			where meek geeks meet
		</div>

		<div>
			

			<form enctype="multipart/form-data" method="post" action="signup-submit.php" >
				<fieldset>
				<legend>New User Signup:</legend>
				<br> <strong> Name: </strong> <input type="text" name="name" size="15"> <span class="error">* <?php echo $nameErr;?></span> </br>
				<br> <strong> Gender: </strong> <input type="radio" name="gender" value="Male"> Male <input type="radio" name="gender" value="Female"> Female * <span class="error"> <?php echo $genderErr;?></span></br>
				<br> <strong>Age: </strong><input type="text" name="age" size="4" > *<span class="error"> <?php echo $ageErr;?></span> </br>
				<br> <strong>Personality type:</strong> <input type="text" name="personality" size="4" > <a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">(Don't know your type ?)  </a>  <span class="error">  <?php echo $personalityErr;?></span> </br>
				<br> <strong>Favorite OS: </strong>
					<select name="OS">
					  <option value="Windows">Windows</option>
					  <option value="Mac OS X">Mac OS X</option>
					  <option value="Linux">Linux</option>
					</select>
 				</br>
 				<br> <strong>Seeking age: </strong><input type="text" name="min" placeholder="min" size="4" > to <input type="text" name="max" placeholder="max" size="4" >  <span class="error">  <?php echo $minErr;?><?php echo $maxErr;?> </span></br>
 				<br>
                <strong> Upload photo </strong><input type="file" name="myfile">
                </br>
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