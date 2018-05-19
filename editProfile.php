<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Sign Up</title>
		<link rel="stylesheet" href="stylesheet.css"/>
	</head>
	<style>
		#content{
        	color: white;
		}
		.head_button {
        	width: 90%;
        	max-width: 150px;
        	margin-top: 2rem;
        	padding: 10px 20px;

        	font-family: "Microsoft YaHei";
        	text-align: center;
        	color: white;
        	background-color: #4dc562;
        	border-radius: 4px;
    	}
    	.heading_button_text {
        	font-family: "Microsoft YaHei";
        	font-weight: 600;
        	line-height: 1.2;
        	font-size: 1rem;
        	color: white;
    	}
	</style>
	
	<body style="">
		<div class="">
			<div id="navigation" class="navigation">
				<div id="navigation_framework" class="navigation_framework" style="position: relative;">
					<div id="navigation_text" class="navigation_text">
						<a id="nav_item1" class="navigation_block_left nav_item1">
							<div class="fr-text"><strong>A CMSC389N Project</strong></div>
						</a>
						<a id="nav_item2" class="navigation_block_right nav_item2" href="personalInfo.php">
							<div class="fr-text">Profile</div>
						</a>
						<a id="nav_item3" class="navigation_block_right nav_item3" href="dashboard.html">
							<div class="fr-text">Sign out</div>
						</a>
					</div>
				</div>
			</div>
			
			<div id="heading" class="heading">
				<div id="heading_framework" class="heading_framework">
					<div id="heading_text" class="heading_text">
						<form action="updateDB.php" method="post" onsubmit="return submitForm();">
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
								$body = "";
								
								$username = $_SESSION['username'];
								$sqlQuery = sprintf("select email,pathway from users where username = '%s'", $username);
								$result = $db->query($sqlQuery);
								if ($result) {
									$udata = $result->fetch_array(MYSQLI_ASSOC);
									$email = $udata['email'];
									$pathway = $udata['pathway'];
									
									$checkedTestudo = "";
									$checkedCat = "";
									$checkedCorgi = "";
									$checkedPanda = "";
									
									if ($pathway === "testudo.png"){
										$checkedTestudo = "checked";
									}
									else if ($pathway === "cat.png"){
										$checkedCat = "checked";
									}
									else if ($pathway === "corgi.png"){
										$checkedCorgi = "checked";
									}
									else if ($pathway === "panda.png"){
										$checkedPanda = "checked";
									}
									
									$body .=<<<EOBODY
									<h1> Update Profile </h1>
									<div id="content">

										<strong>Username: </strong><input type="text" id="username" name="username" value="{$username}" readonly>
										<br><br ><br >
									
										<strong>Email: </strong><input type="email" id="emailAddress" name="emailAddress" placeholder="example@not.real" value="{$email}" autofocus required="required">
										<br ><br ><br >
									
										<strong>Password: </strong><input type="password" id="pass1" name="pass1" value="********" minlength="6" maxlength="20" autofocus required="required">
										<div id="errorPass1">
										</div>
										<br ><br >
									
										<strong>Confirm Password: </strong><input type="password" id="pass2" name="pass2" value="********" minlength="6" maxlength="20" autofocus required="required">
										<div id="errorPass2">
										</div>
										<br ><br >
									
										<strong>Profile Image Name: </strong><br >
										<br >
										<input type="radio" id="profile" name="profile" value="testudo.png" {$checkedTestudo}>
										<img src="testudo.png" width="100" height="100" />
										<input type="radio" id="profile" name="profile" value="cat.png" {$checkedCat}>
										<img src="cat.png" width="100" height="100" /><br >
										<input type="radio" id="profile" name="profile" value="corgi.png" {$checkedCorgi}>
										<img src="corgi.png" width="100" height="100" />
										<input type="radio" id="profile" name="profile" value="panda.png" {$checkedPanda}>
										<img src="panda.png" width="100" height="100" /><br >
									
									
										<button class="head_button" type="submit" name="submitButton" onclick="return submitForm();">
										<div class="heading_button_text">Submit</div>
										</button>&nbsp;&nbsp;&nbsp
									</div>       
EOBODY;
								}
								echo $body;
							?>
						</form>
						<script>
							"use strict";
						
							function submitForm(){
								let username = document.getElementById("username").value.trim();
								let pass1 = document.getElementById("pass1").value.trim();
								let pass2 = document.getElementById("pass2").value.trim();
								let reg = /\w+/; //A-Za-z0-9_
								let result = true;
							
								if(pass1 !== "********" && !reg.test(pass1)){
									document.getElementById("errorPass1").innerHTML += "<br >Invalid Password! Password can only contain letter, number, _<br >";
									result = false;
								}
							
								if(pass1 !== "********" && username === pass1){
									document.getElementById("errorPass1").innerHTML += "<br >Invalid Password! Password cannot be same as Username <br >";
									result = false;
								}
							
								if(pass1 !== "********" && pass1 !== pass2){
									document.getElementById("errorPass2").innerHTML += "<br >Two different passwords are entered";
									result = false;
								}
								return result;
							}
						</script>
					</div>
				</div>
			</div>
		
			<div id="footer" class="footer">
				<div id="footer_framework" class="footer_framework">
					<div id="footer_text" class="footer_text">
						<p>
							We are a dedicate and hard-working group under the UMD class CMSC389N with the best professor Nelson Padua-Perez.<br>
							For Group Project description check <a href="http://cs.umd.edu/class/fall2017/cmsc389N/content/projects/GroupProject/" style="color: green"><strong>this</strong></a>.<br><br>
							<img src="phone.png" class="contact_icon">&nbsp;&nbsp;<a href="mailto:sqh1078534232@gmail.com" style="color: rgba(255,255,255,0.8)"><strong>sqh1078534232@gmail.com</strong></a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="footer-assets">
	</div>
</body>
</html>								