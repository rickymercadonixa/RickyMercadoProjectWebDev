<?php include 'connection.php' ?>
<?php
	if (isset($_POST['submit'])){
		$users = $_POST['user'];
		$passs = $_POST['pass'];
		$fnames = $_POST['fname'];
		$mnames = $_POST['mname'];
		$lnames = $_POST['lname'];
		$pos = 'Employee';

		$query = "SELECT * FROM `users` WHERE `Username` = '$users'";
		$stmts = $conn->prepare($query);
		$stmts->execute();
		$result = $stmts->get_result();
		$row = $result->fetch_assoc();

		if($users == @$row['Username']){
			echo 'User is already exist';
		}else{
			$sql = "INSER_INTO `users`(`Username`, `Password`, `Fname`, `Mname`, `Lname`, `Position`) VALUES (?,?,?,?,?,?)";
			$stmt = $conn->prepare($sql);
			$stmt -> bind_param("ssssss",$users,$passs,$fnames,$mnames,$lnames,$pos);
			$stmt->execute();
			echo 'Registered Successfully';
		}
	}  
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<h2>SIGN UP!</h2>
<body>
  <div class="login-form">
    <form action="">
      <label for="user">Usernane <span class="required-indicator">*</span></label><span class="required-label">is required</span><br>
      <input type="text" name="user" id="user" required><br><br>

      <div class="login-form">
      <label for="pass">Password <span class="required-indicator">*</span></label><span class="required-label">is required</span><br>
      <input type="password" name="pass" id="user" required><br><br>
</div>

<div class="login-form">
<label for="fname">Firstname <span class="required-indicator">*</span></label><span class="required-label">is required</span><br>
      <input type="text" name="fname" id="fname" required><br><br>
</div>
<div class="login-form">
      <label for="mname">Middlename <span class="required-indicator">*</span></label><span class="required-label">is required</span><br>
      <input type="text" name="mname" id="mname" required><br><br>
      </div>
      <div class="login-form">
      <label for="lname">Lastname <span class="required-indicator">*</span></label><span class="required-label">is required</span><br>
      <input type="text" name="lname" id="lname" required><br><br>
      </div>
      <div class="form-group">
        <button type="submit" name="submit">REGISTER</button><br><br>
</div>
</div>
    </form>
  </div>
  <p>Already have an account? <a href="index.php">Login Here</a></p>
  <br><br>
</div>
</body>
</html>
