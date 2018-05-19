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
							<div class="fr-text">Dashboard</div>
						</a>
						<a id="nav_item3" class="navigation_block_right nav_item2" href="admin.php">
							<div class="fr-text">Admin Main Menu</div>
						</a>
					</div>
				</div>
			</div>
			
			
			
			<div id="heading" class="heading">
				<div id="heading_framework" class="heading_framework">
					<?php
						require_once("support.php");
	
						$body = <<<EOBODY
						
						<fieldset id="login_fieldset" class="login_fieldset">
                                    <div id="login_framework" class="login_framework">
				
						<h1 align="center">Admin</h1>
						
						<form action="adminResult.php" method="post">
							<input type="hidden" name="add">  
							
							<h2 align="center"><strong>Add Question in Database</strong></h2>
							
							<hr>
	
							<h4 align="center"><strong>Enter the question to add: </strong> <input type="text" name="qAdd" required/></h4>
							
							<h4 align="center"><strong>Choice A: </strong> <input type="text" name="choice1" required/></h4>
							
							<h4 align="center"><strong>Choice B: </strong> <input type="text" name="choice2" required/></h4>
							
							<h4 align="center"><strong>Choice C: </strong> <input type="text" name="choice3" required/></h4>
							
							<h4 align="center"><strong>Choice D: </strong> <input type="text" name="choice4" required/></h4>
							
							<h4 align="center">Correct Answer: 
							
							<input type="radio" name="answer" value="A" /> A
							
							<input type="radio" name="answer" value="B" /> B
							
							<input type="radio" name="answer" value="C" /> C
							
							<input type="radio" name="answer" value="D" /> D
							</h4>
							
							<br /> 
	
							<h4 align="center"><input type="submit" value="Add Question"/></h4>
						</form>
	
						<br />
                        
                        </div>
								</fieldset>


EOBODY;
			
			
						echo $body;
			
						$_SERVER['PHP_AUTH_USER'] = null;
						$_SERVER['PHP_AUTH_PW'] = null;
					?>

				</div>
			</div>
			
			<div id="footer" class="footer">
				<div id="footer_framework" class="footer_framework">
					<div id="footer_text" class="footer_text">
						<p>
							We are a dedicate and hard-working group under the UMD class CMSC389N with the best professor Nelson Padua-Perez.<br>
							For Group Project description check <a href="http://cs.umd.edu/class/fall2017/cmsc389N/content/projects/GroupProject/" style="color: green"><strong>this</strong></a>.<br><br>
						<img src="phone.png" class="contact_icon">&nbsp; &nbsp;	<a href="mailto:sqh1078534232@gmail.com" style="color: rgba(255,255,255,0.8)"><strong>sqh1078534232@gmail.com</strong></a>
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