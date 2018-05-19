<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Quiz Form</title>
		<link rel="stylesheet" href="stylesheet3.css"/>
	</head>
	
	<body style="">
		<div class="">
			<div id="navigation" class="navigation">
				<div id="navigation_framework" class="navigation_framework" style="position: relative;">
					<div id="navigation_text" class="navigation_text">
						<a id="nav_item1" class="navigation_block_left nav_item1">
							<div class="fr-text">A CMSC389N Project</div>
						</a>
						<a id="nav_item2" class="navigation_block_right nav_item2" href="dashboard.html">
							<div class="fr-text">Sign Out</div>
						</a>
						
						<a id="nav_item3" class="navigation_block_right nav_item3" href="personalInfo.php">
							<div class="fr-text">Profile</div>
						</a>
					</div>
				</div>
			</div>
			
			
			
			<div id="heading" class="heading">
				<div id="heading_framework" class="heading_framework">
					<?php
						session_start();
						require_once("support.php");
						$title = "UMD Quiz";
						$host = "localhost";
						$user = "dbuser";
						$password = "cmsc389n";
						$database = "quiz";
						$table = "questions";
						$db = new mysqli($host, $user, $password, $database);
						
						$sqlQuery = sprintf("select * from questions");
						$result = $db->query($sqlQuery);
						$qCounter = 1;
						$score = 0;
						
						echo "<h1>UMD Quiz</h1>";
						
						if ($result) {
							$num_rows = $result->num_rows;
							if ($num_rows > 0) {
								while ($qdata = $result->fetch_array(MYSQLI_ASSOC)) {
									if (isset($_POST["q{$qCounter}"]) && $qdata['answer'] == $_POST["q{$qCounter}"]) {
										$score++;
									}
			
									$qCounter++;
								}
							}
						}
						$qCounter--;
						echo "<strong>You get {$score}/{$qCounter} correct !<strong><br><br>";	
						
						$scoretosave = round($score * 100 / $qCounter);
						
						echo "Your score is {$scoretosave}";
						
						$sqlQuery2 = sprintf("update users set score = %d where username = '%s'", $scoretosave, $_SESSION['username']);
						$result2 = $db->query($sqlQuery2);

						/* Freeing memory */
                        $result->close();

                        /* Closing connection */
                        $db->close();	
						
						echo "<br /><br />";
						echo "<form action=\"personalInfo.php\">";
						echo "<input type=\"submit\" value=\"Go back to user dashboard\"/>";
						echo "</form>";
					?>			
				</div>
			</div>
			
			<div id="footer" class="footer">
				<div id="footer_framework" class="footer_framework">
					<div id="footer_text" class="footer_text">
						<p>
							We are a dedicate and hard-working group under the UMD class CMSC389N with the best professor Nelson Padua-Perez.<br>
							For Group Project description check <a href="http://cs.umd.edu/class/fall2017/cmsc389N/content/projects/GroupProject/" style="color: green"><strong>this</strong></a>.<br><br>
						<img src="phone.png" class="contact_icon">&nbsp &nbsp<a href="mailto:sqh1078534232@gmail.com" style="color: rgba(255,255,255,0.8)"><strong>sqh1078534232@gmail.com</strong></a>
					</p>
				</div>
			</div>
			
		</div>
		</div><!--
	-->
</div>

<div id="footer-assets">
</div>
</body>
</html>