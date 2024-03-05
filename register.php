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
</head>
<body>

</body>
</html>
