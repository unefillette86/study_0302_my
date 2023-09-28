<?php
header('Content-Type: text/html; charset=utf-8');
$mysqli = mysqli_connect("localhost", "rzczxmuv_usermacaron", "123456", "rzczxmuv_usermacaron");
if ($mysqli == false){
    print("error");
} else {
	 $name = $_POST["name"];
	 $surname = $_POST["surname"];
	 $email = trim(mb_strtolower($_POST["email"]));
	 $password = trim($_POST["password"]);
	 $password = password_hash($password, PASSWORD_DEFAULT);
	 
	 $result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email'");

	 if($result->num_rows != 0) {
		print("Exist"); 
	 } else {
		 $mysqli->query("INSERT INTO `users`(`name`, `surname`, `email`, `password`) VALUES ('$name', '$surname', '$email', '$password')");
		 print("Ok"); 
	 }

}






