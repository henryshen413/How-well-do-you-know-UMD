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
					</div>
				</div>
			</div>
			
			
			
			<div id="heading" class="heading">
				<div id="heading_framework" class="heading_framework">
					<?php
						require_once("support.php");
	
						$title = "UMD Application System";
	
						$admin = new Admin();
						$user = password_hash($admin->getU(), PASSWORD_DEFAULT);
						$password = password_hash($admin->getP(), PASSWORD_DEFAULT);
	
						$body = "";
	
						if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
							if (password_verify($admin->getP(), $password) && password_verify($admin->getU(), $user)){
								$body .= <<<EOBODY
								
								<fieldset id="login_fieldset" class="login_fieldset">
                                    <div id="login_framework" class="login_framework">
								
								
								    <h1 align="center">Admin</h1>
								    <br />
								
                                    <td>
                                        <a id="login_button1" class="login_button1" href="adminAdd.php">
                                            <div class="heading_button_text">Add more questions</div>
                                        </a>
                                    </td>
                
                                    <td>
                                    <br /> <br />
                                        <a id="login_button2" class="login_button2" href="adminDelete.php">
                                            <div class="heading_button_text">Delete Questions</div>
                                        </a>
                                    </td>
                
                                    <td>
                                    <br /> <br />
                                        <a id="login_button3" class="login_button3" href="adminResult.php">
                                            <div class="heading_button_text">Display all questions</div>
                                        </a>
                                    </td>
			
                                    </tr>
								<br />
								
								</div>
								</fieldset>
                           
EOBODY;
			
			
								echo $body;
			
								$_SERVER['PHP_AUTH_USER'] = null;
								$_SERVER['PHP_AUTH_PW'] = null;
							} 
						} else {
							header("WWW-Authenticate: Basic realm=\"Enter admin username and password for Application System\"");
							header("HTTP/1.0 401 Unauthorized");
							echo "This server could not verify that you are authorized to access the document requested. Either you supplied the wrong credentials (e.g., bad password), or your browser doesn't understand how to supply the credentials required.";
							exit;
						}
					?>

				</div>
			</div>
			
			<div id="footer" class="footer">
				<div id="footer_framework" class="footer_framework">
					<div id="footer_text" class="footer_text">
						<p>
							We are a dedicate and hard-working group under the UMD class CMSC389N with the best professor Nelson Padua-Perez.<br>
							For Group Project description check <a href="http://cs.umd.edu/class/fall2017/cmsc389N/content/projects/GroupProject/" style="color: green"><strong>this</strong></a>.<br><br>
						<img src="phone.png" class="contact_icon">&nbsp; &nbsp;<a href="mailto:sqh1078534232@gmail.com" style="color: rgba(255,255,255,0.8)"><strong>sqh1078534232@gmail.com</strong></a>
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