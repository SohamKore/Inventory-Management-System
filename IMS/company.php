
<!DOCTYPE html>
<html>
<head>
	<title>Company Shop Detail</title>
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
<body>
	<h2>Company Shop Detail</h2>
	<form method="POST" action="company.php">
		<label>Name:</label>
		<input type="text" name="name" required><br><br>
		<label>Address:</label>
		<textarea name="address" required></textarea><br><br>
		<label>Contact:</label>
		<input type="text" name="contact" required><br><br>
		<label>Email:</label>
		<input type="email" name="email" required><br><br>
		<input type="submit" name="submit" value="Save">
	</form>
	<?php

	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		
		$conn = mysqli_connect('localhost', 'root', '', 'inventory');
		
		$query = "INSERT INTO company (name, address, contact, email) VALUES ('$name', '$address', '$contact', '$email')";
		$result = mysqli_query($conn, $query);
		
		if($result){
			echo "Company details saved successfully";
		}else{
			echo "Error saving company details";
		}
	}
	?>
</body>
</html>
