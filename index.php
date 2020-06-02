<?php
	require "header.php";
?>

	<main>
		<form action="includes/login.inc.php" method="post">
			<h2>Login</h2>
			<input type="text" name="user" placeholder="Username">
			<input type="password" name="pwd" placeholder="Password">
			<input type="submit" name="login" value="Login">
		</form>

		<form action="includes/signup.inc.php" method="post">
			<h2>Sign Up</h2>
			<input type="text" name="user" placeholder="Username">
			<input type="email" name="email" placeholder="Email">
			<br>
			<input type="password" name="pwd" placeholder="Password">
			<input type="password" name="repeatpwd" placeholder="Repeat Password">
			<br>
			<input type="submit" name="signup" value="Register">
		</form>
	</main>

<?php
	require "footer.php"
?>