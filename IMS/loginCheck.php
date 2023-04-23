<?php
session_start();
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$conn = mysqli_connect('localhost', 'root', '', 'inventory');
	
	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $query);
	
	if(mysqli_num_rows($result) == 1){
		$_SESSION['username'] = $username;
		header('Location: index.php');
		exit();
	}else{
		echo "Invalid username or password";
	}
}
