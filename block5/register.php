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
		$resilt = $stmts->get_result();
		$row = $result->fetch_assoc();

		if($users == @$row['Username']){
			echo 'User is already exist';
		}else{
			$sql = "INSER_INTO `users`(`Username`, `Password`, `Fname`, `Mname`, `Lname`, `Position`) VALUES (?,?,?,?,?,?)";
			$stmt = $con->prepare($sql);
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
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 30%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 30%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form action="">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="user" id="email" required>
    <br>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" id="psw" required>
    <br>
    <label for="fname"><b>First Name</b></label>
    <input type="text" placeholder="Enter First name" name="fname" id="psw" required>
    <br>
    <label for="mname"><b>Middle Name</b></label>
    <input type="text" placeholder="Enter Middle name" name="mname" id="psw" required>
    <br>
    <label for="lname"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last name" name="lname" id="psw" required>
    <br>
    <label for="pos"><b>Position</b></label>
    <input type="text" placeholder="Enter Position" name="pos" id="psw" required>


    <hr>

    <button type="submit" name="submit" class="registerbtn" href="index.php">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="index.php">Sign in</a>.</p>
  </div>
</form>

</body>
</html>
