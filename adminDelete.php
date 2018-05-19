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
						$host = "localhost";
						$user = "dbuser";
						$password = "cmsc389n";
						$database = "quiz";
						$table = "questions";
						$db = new mysqli($host, $user, $password, $database);
	
						$body = "
                        <fieldset id=\"login_fieldset\" class=\"login_fieldset\">
                            <div id=\"login_framework\" class=\"login_framework\">
                                <h1 align=\"center\">Admin</h1>
                                <form action=\"adminResult.php\" method=\"post\">
                                <input type=\"hidden\" name=\"delete\">  
                                ";

                                $body .="
                                <h2 align='center'><strong>All questions in database:</strong></h2>
                                <hr>
                                <br /><br />
                                <div align='center'>
                                <table border=\"1\" cellpadding=\"5\" cellspacing=\"1\">
                                <tr>
                                <td><strong>Question</strong></td>
                                <td><strong>A</strong></td>
                                <td><strong>B</strong></td>
                                <td><strong>C</strong></td>
                                <td><strong>D</strong></td>
                                <td><strong>Correct Answer</strong></td>
                                </tr>
                                
                                
						";

						//check if connect database successfully
                        if ($db->connect_error) {
                            die($db->connect_error);
                        }
	
						$sqlQuery = sprintf("select * from questions");
						$result = $db->query($sqlQuery);
	
						if ($result) {
							$num_rows = $result->num_rows;
							if ($num_rows > 0) {
								while ($qdata = $result->fetch_array(MYSQLI_ASSOC)) {
									$body .= "
									<tr>
									<td>{$qdata['question']}</td>
									<td>{$qdata['choice1']}</td>
									<td>{$qdata['choice2']}</td>
									<td>{$qdata['choice3']}</td>
									<td>{$qdata['choice4']}</td>
									<td>{$qdata['answer']}</td>
									</tr>
									";
								}
							}
						}

						/* Freeing memory */
                        $result->close();
            
                        /* Closing connection */
                        $db->close();
	
						$body .= <<<EOBODY
						
						
						</table></div>
						<br >
						<h4 align="center"><strong>Delete Question in Database</strong></h4>
						<h4 align="center"><strong>Enter the question to delete: </strong> <input type="text" name="qDelete" required/></h4>
						<h4 align="center"><input type="submit" value="Delete Question"/></h4>
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