<?php
	
	if(empty($_POST['todo'])){
		header("Location: ../homepage.php?empty+field");
		exit();
	}

	require "dbh.inc.php";
	session_start();
	$sql = "INSERT INTO {$_SESSION['name']}(post) VALUES (?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('s', $_POST['todo']);
	$stmt->execute();

	header("Location: ../homepage.php?item+added");

	$stmt->close();
	$conn->close();