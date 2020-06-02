<?php
	session_start();
	if(isset($_POST['delete'])){
		require "dbh.inc.php";
		$sql = "DELETE FROM {$_SESSION['name']} WHERE id={$_POST['id']}";
		$conn->query($sql);
		$conn->close();
		header("Location: ../homepage.php?deletion+successful");
		exit();
	}
	else{
		header("Location: ../homepage.php?unathorized+access");
		exit();
	}