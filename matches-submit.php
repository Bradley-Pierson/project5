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
		$valid = true;



		if ($_SERVER["REQUEST_METHOD"] == "GET") {
		  if (empty($_GET["name"])) {
		    $nameErr = "<br> Name is required </br>";
		    $valid = false;
		  } 		  	   		  
		  if(!$valid){
		   session_start();
		   $_SESSION['nameErr'] = $nameErr;
		   header('Location: matches.php ');
		   exit();
		  }			    
		}
		
		?>





		<div id="bannerarea">
			<img src="match.png" alt="banner logo" /> <br />
			where meek geeks meet
		</div>

		<div>
			<h1>Matches for: </h1>
			<?php
			    $name = $_GET["name"];
			    echo $name . "<br><br><br>";

			    //get singles.txt in $contents
			    $contents = file_get_contents("singles.txt");


			    $verName = "";
			    $verGender = "";
			    $verAge = "";
			    $verPersonality1 = "";
			    $verPersonality2 = "";
			    $verPersonality3 = "";
			    $verPersonality4 = "";
			    $verOS = "";
			    $verMinAge = "";
			    $verMaxAge = "";


                $line = explode("\n",$contents);
                $count = 0;
                while($count < sizeof($line)){
                    $infoArray = explode(",",$line[$count]);
                    $verName = $infoArray[0];
                    if($verName === $name){
                        $verGender = $infoArray[1];
                        $verAge = $infoArray[2];
                        $verPersonality = $infoArray[3];
                        $verPersonality1 = substr($verPersonality,0,1);
                        $verPersonality2 = substr($verPersonality,1,1);
                        $verPersonality3 = substr($verPersonality,2,1);
                        $verPersonality4 = substr($verPersonality,3,1);
                        $verOS = $infoArray[4];
                        $verMinAge = $infoArray[5];
                        $verMaxAge = $infoArray[6];
                        break;
                    }
                    else {
                        $count = $count + 1;
                    }
                }

				  if (empty($verGender)) {
				   $nameErr = " User not found ";
				   session_start();
				   $_SESSION['nameErr'] = $nameErr;
				   header('Location: matches.php ');
				   exit();				    
				  } 	


                $dirname = "Images";

                $count = 0;
                while($count < sizeof($line)){
                    $infoArray = explode(",",$line[$count]);
                    $personName = $infoArray[0];
                    $personFullName = explode(" ",$personName);
                    $twoNames;
                    $personFirstName;
                    $personLastName;
                    if(sizeof($personFullName) > 1){
                        $twoNames = true;
                        $personFirstName = strtolower($personFullName[0]);
                        $personLastName = strtolower($personFullName[1]);
                    }
                    else {
                        $twoNames = false;
                        $personFirstName = strtolower($personFullName[0]);
                    }
                    $gender = $infoArray[1];
                    $age = $infoArray[2];
                    $personality = $infoArray[3];
                    $personality1 = substr($personality,0,1);
                    $personality2 = substr($personality,1,1);
                    $personality3 = substr($personality,2,1);
                    $personality4 = substr($personality,3,1);
                    $os = $infoArray[4];
                    $minAge = $infoArray[5];
                    $maxAge = $infoArray[6];
                    if($verGender != $gender && $verAge <= $maxAge && $verAge >= $minAge && $age <= $verMaxAge && $age >= $verMinAge && ($verPersonality1 == $personality1 || $verPersonality2 == $personality2 || $verPersonality3 == $personality3 || $verPersonality4 == $personality4) && $verOS == $os){

                        if($twoNames == false){
                            $image = $personFirstName . ".jpg";
                            echo "<div class='match'>" . nl2br("<p><img src=Images/$image /> $personName</p><br><strong>gender: </strong>$gender<br><strong>age: </strong>$age<br><strong>personality: </strong>$personality<br><strong>OS: </strong>$os" . "</div>");
                        }
                        else {
                            $image = $personFirstName . "_" . $personLastName . ".jpg";
                            echo "<div class='match'>" . nl2br("<p><img src=Images/$image /> $personName</p><br><strong>gender: </strong>$gender<br><strong>age: </strong>$age<br><strong>personality: </strong>$personality<br><strong>OS: </strong>$os" . "</div>");

                        }
                    }
                    $count = $count + 1;
                }








			?>


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