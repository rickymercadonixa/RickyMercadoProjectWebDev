<?php include 'connection.php' ?>
<?php  
	if (isset($_POST['submit'])){
		$users = $_POST['user'];
		$passs = $_POST['pass'];

		$sql = "SELECT * FROM `users` WHERE `Username` = ? AND `Password` = ?";
		$stmt = $conn->prepare($sql);
		$stmt  -> bind_param("ss",$users,$passs);
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
</head>
<h2>PHP LOGIN FORM </h2>
<body>
<div class="login-form">
		<form action="" method="post" class="form-group">
			<div class="for-group">
				<input type="text" name="user" placeholder="Username"><br><br>
			</div>
			<div class="for-group">
				<input type="password" name="pass" placeholder="Password"><br><br>
			</div>
			<div class="for-group">
				<button type="submit" name="submit">LOGIN</button><br><br>
			</div>
		</form>
		<br><br>
		<hr>
		<div class="text-center">
			<span class="small"></span><p>Not have an account? <a href="register.php">REGISTER</a></p><br><br>
		</div>
	</div>
</body>
</html>