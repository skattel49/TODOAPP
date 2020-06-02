<?php
	require "dbh.inc.php";
	$sql = "CREATE TABLE {$_SESSION['name']}(
				id INT(6) AUTO_INCREMENT NOT NULL PRIMARY KEY,
				post TEXT NOT NULL
			)";

	$conn->query($sql);
	$conn->close();