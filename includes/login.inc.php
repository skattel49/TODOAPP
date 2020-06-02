<?php 
	if(isset($_POST['login'])){
		require "dbh.inc.php";

		$name  = $_POST['user'];
		$pwd = $_POST['pwd'];

		$sql = "SELECT * FROM login WHERE uname=?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $name);
		$stmt->execute();
		$result = $stmt->get_result()->fetch_assoc();

		if(!password_verify($pwd, $result['pwd'])){
			header("Location: ../index.php?invalid+credentials");
			exit();
		}
		else{
			session_start();
			$_SESSION['name'] = $name;
			header("Location: ../homepage.php?login=success");
			exit();
		}

		$stmt->close();
		$conn->close();
	}
	else{
		header("Location: ../index.php?unathorized+access");
		exit();
	}
?>