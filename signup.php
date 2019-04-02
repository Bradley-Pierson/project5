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
		<div id="bannerarea">
			<img src="match.png" alt="banner logo" /> <br />
			where meek geeks meet
		</div>

		<div>
			<h1>New User Signup:</h1>

			<form enctype="multipart/form-data" action="signup-submit.php" method="post">
				<br> Name: <input type="text" name="name"> </br>
				<br> Gender: <input type="radio" name="gender" value="Male"> Male <input type="radio" name="gender" value="Female"> Female </br>
				<br> Age: <input type="text" name="age"> </br>
				<br> Personality type: <input type="text" name="Personality"> <a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">(Don't know your type ?)</a></br>
				<br> Favorite OS: 
					<select name="OS">
					  <option value="Windows">Windows</option>
					  <option value="Mac OS X">Mac OS X</option>
					  <option value="Linux">Linux</option>
					</select>
 				</br>
 				<br> Seeking age: <input type="text" name="min" value="min"> to <input type="text" name="max" value="max">  </br>
 				<br>
                Upload photo <input type="file" name="myfile">
                </br>
 				<input type="submit" value="Submit">


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