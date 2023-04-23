<!DOCTYPE html>
<html>
<head>
	<title>Create Product</title>
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
	<h2>Create Product</h2>
	
	<form method="POST" action="create_product.php"><br>
	<input type="submit" name="submit" value="Save"><br>
		<label>Name:</label>
		<input type="text" name="name"><br><br>
		<label>Description:</label>
		<textarea name="description"></textarea><br><br>
		<label>Product Type:</label>
		<select name="product_type_id">
			<option value="">Select Product Type</option>
			<?php
			$conn = mysqli_connect('localhost', 'root', '', 'inventory');
			$query = "SELECT * FROM product_type";
			$result = mysqli_query($conn, $query);
			while($row = mysqli_fetch_assoc($result)){
				echo "<option value='".$row['id']."'>".$row['name']."</option>";
			}
			?>
		</select><br><br>
		<label>Unit:</label>
		<select name="unit_id">
			<option value="">Select Unit</option>
			<?php
			$query = "SELECT * FROM units";
			$result = mysqli_query($conn, $query);
			while($row = mysqli_fetch_assoc($result)){
				echo "<option value='".$row['id']."'>".$row['name']."</option>";
			}
			?>
		</select><br><br>
		<hr>
	

	</form>
	
	<?php
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$description = $_POST['description'];
		$product_type_id = $_POST['product_type_id'];
		$unit_id = $_POST['unit_id'];
		
		$conn = mysqli_connect('localhost', 'root', '', 'inventory');
		
		$query = "INSERT INTO product (name, description, product_type_id, unit_id) VALUES ('$name', '$description', '$product_type_id', '$unit_id')";
		$result = mysqli_query($conn, $query);
		
		if($result){
			echo "Product created successfully";
		}else{
			echo "Error creating product";
		}
	}
	?>
</body>
</html>
