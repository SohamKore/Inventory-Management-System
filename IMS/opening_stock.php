<!DOCTYPE html>
<html>
<head>
	<title>Opening Stock</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>
<body>
	<h2>Opening Stock</h2>
	<form method="POST" action="opening_stock.php">
		<label>Product:</label>
		<select name="product">
			<?php
			$conn = mysqli_connect('localhost', 'root', '', 'inventory');
			$query = "SELECT * FROM product";
			$result = mysqli_query($conn, $query);
			while($row = mysqli_fetch_assoc($result)){
				echo "<option value='".$row['id']."'>".$row['name']."</option>";
			}
			?>
		</select><br><br>
		<label>Quantity:</label>
		<input type="number" name="quantity"><br><br>
		<label>Date:</label>
		<input type="date" name="date"><br><br>
		<input type="submit" name="submit" value="Save">
	</form>
	<?php
	if(isset($_POST['submit'])){
		$product_id = $_POST['product'];
		$quantity = $_POST['quantity'];
		$date = $_POST['date'];
		
		$conn = mysqli_connect('localhost', 'root', '', 'inventory');
		
		$query = "INSERT INTO opening_stock (product_id, quantity, date) VALUES ('$product_id', '$quantity', '$date')";
		$result = mysqli_query($conn, $query);
		
		if($result){
			echo "Opening stock saved successfully";
		}else{
			echo "Error saving opening stock";
		}
	}
	?>
</body>
</html>
