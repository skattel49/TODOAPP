<?php
	if(isset($_POST['signup'])){
		require "dbh.inc.php";

		$username = $_POST['user'];
		$email = $_POST['email'];
		$pwd = $_POST['pwd'];
		$repeatpwd = $_POST['repeatpwd'];

		if(empty($username) || empty($email) || empty($pwd) || empty($repeatpwd)){
			header("Location: ../index.php?empty+fields");
			exit();
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header("Location: ../index.php?invalid+email");
			exit();
		}
		else if($pwd !== $repeatpwd){
			header("Location: ../index.php?password+mismatch");
			exit();
		}

		//check to see if there is an instance of the email/username provided
		$sql = "SELECT * FROM login WHERE uname=? OR email=?";

		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ss", $username, $email);
		$stmt->execute();

		//get_result returns an object that has data
		//fetch_assoc filters and gives us the data in an associative array
		$result = $stmt->get_result()->fetch_assoc();
		if($result>0){
			header("Location: ../index.php?username+email+already+used");
			exit();
		}

		$sql = "INSERT INTO login(uname, email, pwd) VALUES (?, ?, ?)";

		$hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);

		$stmt = $conn->prepare($sql);
		$stmt->bind_param("sss", $username, $email, $hashed_pwd);
		$stmt->execute();


		session_start();
		$_SESSION['name'] = $username;
		header("Location: ../homepage.php?signup=success");
		exit();

		$stmt->close();
		$conn->close();
	}
	else{
		header("Location: ../index.php?unathorized+access");
		exit();
	}
?>