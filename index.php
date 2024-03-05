<?phpb include 'connection.php' ?>
<?php  
	if (isset($_POST['submit'])){
		$users = $_POST['user'];
		$passs = $_POST['pass'];

		$sql = "SELECT * FROM 'users' WHERE 'Username' = ? AND 'Password' = ?";
		$stmt = $conn->prepare($sql);
		$stmt -> bind_param("ss",$users,$passs);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		if($passs != @$row['Password'] && $users != @$row['Username']){
			echo 'Incorrect Credentials, Try again';
		}else{
			header("Location:Dashboard.php");
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;

		}

		.log{
			text-align: center;
			margin-top: 10%;
			background-color: black;
			margin-left: 30%;
		}

		div{
			border: none;
			border-radius: 20px;
			width: 600px;
			padding: 20px 0px;
		}


		#username{
			width: 30%;
			height: 30px;
			border: none;
			border-radius: 20px;
		}

		#password{
			width: 20%;
			width: 30%;
			height: 30px;
			border: none;
			border-radius: 20px;
		}

		h2{
			color: white;
		}

		input[type=submit]{
			color: white;
			width: 100px;
			height: 40px;
			border: none;
			border-radius: 20px;
			background-color: orange;
			
		}

		input{
			font-size: 14px;
			padding-left: 10px;
		}

		label{
			color: white;
			font-size: 20px
		}


	</style>
</head>
<body>
	<div class="log">
		<div>
	<h2>Login</h2>
	<br><br>
<form id="form_login" action="" method="post">

	<label for="username">Username:</label><br>
	<input type="text" id="username" name="user"><br><br><br>
	<label for="password">Password:</label><br>
	<input type="password" id="password" name="pass"><br><br>
	<input type="submit" name="submit" value="Login">
</form>
</div>
</div>
<div class="text-center">
	<span class="small"></span><p>Not have an account?
	<a href="register.php">REGISTER</a></p>
</div>
</body>
</html>