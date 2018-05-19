<?php
	
	function generatePage($body, $title="Application System") {
		$page = <<<EOPAGE
		<!doctype html>
		<html>
		<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>$title</title>
		</head>
		<style>
		body, input, option, select{
		font-size: 15px;
		font-family: Microsoft YaHei;
		}
		div {
		width: 800px;
		margin-left: auto;
		margin-right: auto;
		}
		h1, h2 {
		font-size: 40px;
		line-height: 70px;
		font-family: Microsoft YaHei;
		font-weight: bold;
		}
		</style>
		<body>
		<div>
		$body
		</div>
		</body>
		</html>
EOPAGE;

		return $page;
	}
	
	function connectToDB($host, $user, $password, $database) {
		$db = mysqli_connect($host, $user, $password, $database);
		if (mysqli_connect_errno()) {
			echo "<h2>Connect failed.</h2>\n".mysqli_connect_error();
			exit();
		}
		return $db;
	}
	
	class Admin {
		var $u = 'main';
		var $p = 'terps';
		
		function getU() {
			return $this->u;
		}
		
		function getP() {
			return $this->p;
		}
	}
	
	$salt = '$2a$09$anexamplestringforsalt$';
?>
