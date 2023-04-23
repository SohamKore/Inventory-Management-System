<!DOCTYPE html>
<html>
<head>
	<title>Insert Opening Stock</title>
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
	<h2>Insert Opening Stock</h2>
	<form method="POST" action="insert_opening_stock.php">
		<label>Product:</label>
		<select name="product_id">
			<option value="">Select Product</option>
			<?php
			$conn = mysqli_connect('localhost', 'root', '', 'inventory');
			$query = "SELECT * FROM product";
			$result = mysqli_query($conn, $query);
			while($row = mysqli_fetch_assoc($result)){
				echo "<option value='".$row['id']."'>".$row['name']."</option>";
			}
			?>
		</select><br><br>
		<label>Godown:</label>
		<select name="godown_id">
			<option value="">Select Godown</option>
			<?php
			$query = "SELECT * FROM godown";
			$result = mysqli_query($conn, $query);
			while($row = mysqli_fetch_assoc($result)){
				echo "<option value='".$row['id']."'>".$row['name']."</option>";
			}
			?>
		</select><br><br>
		<label>Quantity:</label>
		<input type="number" name="quantity"><br><br>
		<input type="submit" name="submit" value="Save">
	</form>
	<?php
	if(isset($_POST['submit'])){
		$product_id = $_POST['product_id'];
		$godown_id = $_POST['godown_id'];
		$quantity = $_POST['quantity'];
		
		$query = "INSERT INTO opening_stock (product_id, godown_id, quantity) VALUES ('$product_id', '$godown_id', '$quantity')";
		$result = mysqli_query($conn, $query);
		
		if($result){
			echo "Opening stock inserted successfully";
		}else{
			echo "Error inserting opening stock";
		}
	}
	?>
</body>
</html>
