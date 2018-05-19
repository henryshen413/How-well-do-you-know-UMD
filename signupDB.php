<?php
    require_once("support.php");
    require_once("db.php");
    
    session_start();
	$body = "";	

	if (isset($_POST["submitButton"])){
		$username = trim($_POST["username"]);
		$email = $_POST['emailAddress'];
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
		$profile = $_POST['profile'];
	}
	
	$hashed = password_hash($pass1, PASSWORD_DEFAULT);
	$imageData = addslashes(file_get_contents($profile));
		
	$db_connection = new mysqli($host, $user, $password, $database);

	//check if connect database successfully
	if ($db_connection->connect_error) {
		die($db_connection->connect_error);
	}
		
	/* someone to be added to table */
	$sqlQuery = "insert into $table1 (username, email, password, profile, pathway) values ";
	$sqlQuery .= "('{$username}', '{$email}', '{$hashed}','{$imageData}','{$profile}')";
	$result = $db_connection->query($sqlQuery);

	if ($result) {
		$_SESSION['username'] = $username;
		$_SESSION['pathway'] = $profile; 
        header("Location: personalInfo.php");
        exit;
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