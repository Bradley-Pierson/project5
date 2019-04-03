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
		$valid = true;

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["name"])) {
		    $nameErr = "<br> Name is required </br>";
		    $valid = false;
		  } 		  
		  if (empty($_POST["gender"])) {
		    $genderErr = "<br>Gender is required </br>";
		    $valid = false;
		  } 		    
		  if (empty($_POST["age"])) {
		    $ageErr = "<br> Age is required </br>";
		    $valid = false;
		  } else{
		  	if(!is_numeric($_POST["age"]) || strlen($_POST["age"]) > 2){
		  		$ageErr = "<br> Enter a valid age </br>";
		  		$valid = false;
		  	}
		  }
		  if (empty($_POST["personality"])) {
		    $personalityErr = " <br> Personality type is required </br>";
		    $valid = false;
		  } else {
			if(!preg_match('/[A-Z]/', $_POST["personality"]) || strlen($_POST["personality"]) != 4){
		  		$personalityErr = "<br> Enter a valid personality type </br>";
		  		$valid = false;
		  	}
			if ($_POST["personality"][0] != 'I' && $_POST["personality"][0] != 'E') {
		  		$personalityErr = "<br> Enter a valid personality type ex ESTJ </br>";
		  		$valid = false;
			}
			if ($_POST["personality"][1] != 'N' && $_POST["personality"][1] != 'S') {
		  		$personalityErr = "<br> Enter a valid personality type ex ESTJ </br>";
		  		$valid = false;
			}					  	
			if ($_POST["personality"][2] != 'F' && $_POST["personality"][2] != 'T') {
		  		$personalityErr = "<br> Enter a valid personality type ex ESTJ </br>";
		  		$valid = false;
			}
			if ($_POST["personality"][3] != 'J' && $_POST["personality"][3] != 'P') {
		  		$personalityErr = "<br> Enter a valid personality type ex ESTJ </br>";
		  		$valid = false;
			}			
				
		  }
		  if (empty($_POST["min"])) {
		    $minErr = "<br> min age is required </br> ";
		    $valid = false;
		  } else{
		  	if(!is_numeric($_POST["min"]) || strlen($_POST["min"]) > 2){
		  		$minErr = "<br> Enter a valid min age  </br>";
		  		$valid = false;
		  	}
		  }
		  if (empty($_POST["max"])) {
		    $maxErr = "<br> max age is required  </br>";
		    $valid = false;
		  } else{
		  	if(!is_numeric($_POST["max"]) || strlen($_POST["max"]) > 2){
		  		$maxErr = "<br> Enter a valid max age </br> ";
		  		$valid = false;
		  	}		  	
		  }
		  if(strlen($_POST["min"]) > strlen($_POST["max"])){
		  	$minErr = "<br>min age is greater than max age </br> ";
		  	$valid = false;
		  }
	   		  
		  if(!$valid){		  		  		   
		   header('Location: signup.php? ');
		   exit();
		  }			    
		}
		
		?>





		<div id="bannerarea">
			<img src="match.png" alt="banner logo" /> <br />
			where meek geeks meet
		</div>

		<div>
			<h1>Thank you!</h1>

			<br>

			<?php
			    $name = $_POST["name"];
			    echo "Welcome to Match, " . $name;
			    $targetDir = "Images/";
                $uploadFile = $targetDir.$_FILES['myfile']['name'];
    		    if(isset($_POST['name']) && isset($_POST['gender']) && isset($_POST['age']) && isset($_POST['personality']) && isset($_POST['OS']) && isset($_POST['min']) && isset($_POST['max']) && move_uploaded_file($_FILES['myfile']['tmp_name'],$uploadFile))
                {
                    echo "<br>file uploaded successfully";
                    $data =  "\n" . $_POST['name'] . "," . $_POST['gender'] . "," . $_POST['age'] . "," . $_POST['personality'] . "," . $_POST['OS'] . "," . $_POST['min'] . "," . $_POST['max'];
                    $ret = file_put_contents('singles.txt', $data, FILE_APPEND | LOCK_EX);

                }
                else{
                    echo "<br>upload failed. Please make sure all fields are completed";
                    echo $nameErr;
                    echo $genderErr;
                    echo $ageErr;
                    echo $personalityErr;
                    echo $minErr;
                    echo $maxErr;
                }
			?>

			<br>
			<br> <a href="matches.php">Now log in to see your matches!</a><br>

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