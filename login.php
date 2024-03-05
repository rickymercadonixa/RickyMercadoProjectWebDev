<?php
 if(isset($_POST['username'])&& isset($_POST['password'])){
 	$username = $_POST['username'];
 	$password = $_POST['password'];

 	$valid_username = 'torrejos';
 	$valid_password = 'gwapa';

 	if($username === $valid_username && $password === $valid_password){
 		echo "Welcome, $username";
 	}elseif (empty($username) && empty($password)) {
 		echo "Provide Username and password. Please try again";
 	}
 	else{
 		echo "Invalid username or password. Please try again";
 	}
 }
?> 