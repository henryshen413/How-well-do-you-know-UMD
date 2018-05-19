<?php
    require_once("support.php");
    require_once("db.php");
    
    session_start();
	$body = "";	

	if (isset($_POST["submitButton"])){
		$username = $_SESSION['username'];
		$email = $_POST['emailAddress'];
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
		$profile = $_POST['profile'];
	}

	$imageData = addslashes(file_get_contents($profile));
		
	$db_connection = new mysqli($host, $user, $password, $database);

	//check if connect database successfully
	if ($db_connection->connect_error) {
		die($db_connection->connect_error);
	}
		
	/* update database */
	//password dose change 
	if ($pass1 !== "********"){
		$hashed = password_hash($pass1, PASSWORD_DEFAULT);
		$sqlQuery = sprintf("update $table1 set email='%s', password='%s',profile='%s',pathway='%s' where username='%s'", 
						$email, $hashed,$imageData,$profile,$username);
	}else{
		$sqlQuery = sprintf("update $table1 set email='%s', profile='%s',pathway='%s' where username='%s'", 
						$email,$imageData,$profile,$username);
	}
	
	$result = $db_connection->query($sqlQuery);

	if ($result) {
		$_SESSION['username'] = $username;
		$_SESSION['pathway'] = $profile;
		echo '<script type="text/javascript">'; 
		echo 'alert("Your profile has been updated");'; 
		echo 'window.location.href = "personalInfo.php";';
		echo '</script>'; 
	} else { 
        echo '<script type="text/javascript">'; 
		echo 'alert("The entered username has already been used. Please choose another one");'; 
		echo 'window.location.href = "signup.html";';
		echo '</script>'; 		 
	}

	/* Closing connection */
	$db_connection->close();
		
	//$page = generatePage($body);
	echo $body;
?>