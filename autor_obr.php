<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

$mysqli = mysqli_connect("localhost", "rzczxmuv_usermacaron", "123456", "rzczxmuv_usermacaron");
if ($mysqli == false) {
	print("error");
} else {
	$email = trim(mb_strtolower($_POST["email"]));
	$password = trim($_POST["password"]);

	$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
	$result = $result->fetch_assoc();
	

	if (password_verify($password, $result["password"])) {
		echo "exist";
		$_SESSION["id"] = $result["id"];
		$_SESSION["name"] = $result["name"];
		$_SESSION["surname"] = $result["surname"];
		$_SESSION["email"] = $result["email"];
	} else {
		echo "incorrect email";
	}

// 	if ($result->num_rows != 0) {
// 		print("exist");
// } else {
// 	$registered = false;
// print("incorrect email");
// 	 }
	}

