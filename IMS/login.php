<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f7f7f7;
		}
		h2 {
		color: #1c3e5e;
		font-weight: bold;
		text-align: center;
		margin-top: 20px;
	}
	
	form {
		background-color: #fff;
		border: 1px solid #ccc;
		padding: 20px;
		margin: 20px auto;
		max-width: 500px;
		box-shadow: 0 0 10px rgba(0,0,0,0.2);
	}
	
	label {
		display: inline-block;
		width: 100px;
		margin-bottom: 10px;
		color: #1c3e5e;
		font-weight: bold;
	}
	
	input[type="text"],
	input[type="email"],
	textarea {
		width: 100%;
		padding: 5px;
		border-radius: 5px;
		border: 1px solid #ccc;
		margin-bottom: 10px;
		font-size: 16px;
		color: #333;
		box-sizing: border-box;
	}
	
	input[type="submit"] {
		background-color: #1c3e5e;
		color: #fff;
		border: none;
		padding: 10px 20px;
		border-radius: 5px;
		font-size: 16px;
		cursor: pointer;
		transition: background-color 0.3s ease;
	}
	
	input[type="submit"]:hover {
		background-color: #123552;
	}
	
	.message {
		background-color: #d1ecf1;
		border: 1px solid #bee5eb;
		padding: 10px;
		color: #0c5460;
		margin: 20px auto;
		max-width: 500px;
		text-align: center;
	}
</style>
</head>
<body onload="load()">
	<h2>Login Page</h2>
	<form method="POST" action="loginCheck.php">
		<h1>Login for Users</h1>
		<label>Username:</label>
		<input type="text" name="username"><br><br>
		<label>Password:</label><br>
		<input type="password" name="password"><br><br>
		<input type="submit" name="submit" value="Login">
	</form>

	<form method="POST" action="login.php">
		<h1>Add Users</h1>
		<label>Username:</label>
		<input type="text" name="usernameAdd"><br><br>
		<label>Email:</label>
		<input type="text" name="emailAdd"><br><br>
		<label>Password:</label><br>
		<input type="password" name="passwordAdd"><br><br>
		<input type="submit" name="submit" value="Add">
	</form>
	<?php
	if(isset($_POST['submit'])){
		$username = $_POST['usernameAdd'];
		$password = $_POST['passwordAdd'];
		$email = $_POST['emailAdd'];
		
		$conn = mysqli_connect('localhost', 'root', '', 'inventory');
		
		$query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password','$email')";
		$result = mysqli_query($conn, $query);
		
		if($result){
			echo "User created successfully ngga";
		}else{
			echo "No ngga";
		}
	}
	?>
</body>
<script>
	function load(){
		
	}
</script>
</html>
