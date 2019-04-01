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
			<h1>Matches for: </h1>
			<?php
			    $name = $_GET["name"];
			    echo $name;

			    //get singles.txt in $contents
			    $contents = file_get_contents("singles.txt");


			    $verName;
			    $verGender;
			    $verAge;
			    $verPersonality1;
			    $verPersonality2;
			    $verPersonality3;
			    $verPersonality4;
			    $verOS;
			    $verMinAge;
			    $verMaxAge;

			    //find the line in contents of the user that logged in and save relevant info
			    $count = 0;
			    while($count < strlen($contents)){
                    $lineEnd = strpos($contents.substr($contents, $count), '\n');
                    $line = substr($contents, $count, $lineEnd);
                    $commaPos = strpos($line, ',');
                    $entryName = substr($line, 0, $commaPos);
                    if($name == $entryName){

                        $info = $line;

                        $verName = substr($info, 0, $commaPos);
                        $commaPos = $commaPos + 1;
                        $info = substr($line, $commaPos);
                        $commaPos = strpos($info, ',');

                        $verGender = substr($info, 0, $commaPos);
                        $commaPos = $commaPos + 1;
                        $info = substr($line, $commaPos);
                        $commaPos = strpos($info, ',');

                        $verAge = substr($info, 0, $commaPos);
                        $commaPos = $commaPos + 1;
                        $info = substr($line, $commaPos);
                        $commaPos = strpos($info, ',');

                        $verPersonality = substr($info, 0, $commaPos);
                        $verPersonality1 = substr($verPersonality, 0, 1);
                        $verPersonality2 = substr($verPersonality, 1, 2);
                        $verPersonality3 = substr($verPersonality, 2, 3);
                        $verPersonality4 = substr($verPersonality, 3, 4);
                        $commaPos = $commaPos + 1;
                        $info = substr($line, $commaPos);
                        $commaPos = strpos($info, ',');

                        $verOS = substr($info, 0, $commaPos);
                        $commaPos = $commaPos + 1;
                        $info = substr($line, $commaPos);
                        $commaPos = strpos($info, ',');

                        $verMinAge = substr($info, 0, $commaPos);
                        $commaPos = $commaPos + 1;
                        $info = substr($line, $commaPos);
                        $commaPos = strpos($info, '\n');

                        $verMaxAge = substr($info, 0, $commaPos);
                        break;
                    }
                    $count = $lineEnd + 1;
                }

                //find all users with same relevant info (opposite gender, between min and max age, same favorite OS, One personality type)
                $count = 0;
			    while($count < strlen($contents)){
                    $lineEnd = strpos($contents.substr($contents, $count), '\n');
                    $line = substr($contents, $count, $lineEnd);
                    $commaPos = strpos($line, ',');

                    $info = $line;

                        $personName = substr($info, 0, $commaPos);
                        $commaPos = $commaPos + 1;
                        $info = substr($line, $commaPos);
                        $commaPos = strpos($info, ',');

                        $gender = substr($info, 0, $commaPos);
                        $commaPos = $commaPos + 1;
                        $info = substr($line, $commaPos);
                        $commaPos = strpos($info, ',');

                        $age = substr($info, 0, $commaPos);
                        $commaPos = $commaPos + 1;
                        $info = substr($line, $commaPos);
                        $commaPos = strpos($info, ',');

                        $personality = substr($info, 0, $commaPos);
                        $personality1 = substr($personality, 0, 1);
                        $personality2 = substr($personality, 1, 2);
                        $personality3 = substr($personality, 2, 3);
                        $personality4 = substr($personality, 3, 4);
                        $commaPos = $commaPos + 1;
                        $info = substr($line, $commaPos);
                        $commaPos = strpos($info, ',');

                        $os = substr($info, 0, $commaPos);
                        $commaPos = $commaPos + 1;
                        $info = substr($line, $commaPos);
                        $commaPos = strpos($info, ',');

                        $minAge = substr($info, 0, $commaPos);
                        $commaPos = $commaPos + 1;
                        $info = substr($line, $commaPos);
                        $commaPos = strpos($info, '\n');

                        $maxAge = substr($info, 0, $commaPos);

                    if($verGender != $gender && $verAge <= $maxAge && $verAge >= $minAge && $age <= $verMaxAge && $age >= $verMinAge && ($verPersonality1 == $personality1 || $verPersonality2 == $personality2 || $verPersonality3 == $personality3 || $verPersonality4 == $personality4) && $verOS == $os){
                        echo $line;
                    }
                    $count = $lineEnd + 1;

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