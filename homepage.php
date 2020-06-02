<?php
	require "header.php";
	session_start();

	if(isset($_GET['signup'])){
		require "includes/createtable.inc.php";
		$x = 7;
	}
?>
	<main>
		<form action="includes/logout.inc.php" method="post">
			<input type="submit" name="logout" value="Logout">
		</form>
		<h1>Welcome to your Dashboard <?="{$_SESSION['name']}!"?></h1>

		<form action="includes/todo.inc.php" method="post">
			<input type="text" name="todo" placeholder="Add Item">
			<input type="submit" name="add" value="add">
		</form>

		<?php
			require "includes/dbh.inc.php";
			$sql = "SELECT * FROM {$_SESSION['name']}";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				echo "<ul>";
				while($row = $result->fetch_assoc()){
					echo "<li>{$row['post']}

							<form action='includes/deleteTodo.inc.php' method='post'>
								<input type='hidden' name='id' value=\"{$row['id']}\">
								<input type='submit' name='delete' value='delete'>
							</form>

						</li>";
				}
				echo "</ul>";
			}
		?>
	</main>

<?php 
	require "footer.php";
?>