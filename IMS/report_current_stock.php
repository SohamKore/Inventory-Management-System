<!DOCTYPE html>
<html>
<head>
	<title>Current Stock Report</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<h2>Current Stock Report</h2>
	<table border="1">
		<thead>
			<tr>
				<th>Product</th>
				<th>Unit</th>
				<th>Quantity</th>
			</tr>
		</thead>
		<tbody>
			<?php
			// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'inventory');
			// retrieve current stock data
			$query = "SELECT product.name AS product_name, units.name AS unit_name, current_stock.quantity FROM current_stock 
			INNER JOIN product ON current_stock.product_id = product.id
			INNER JOIN units ON product.unit_id = units.id";
			$result = mysqli_query($conn, $query);

			// loop through the data and display in table
			while($row = mysqli_fetch_assoc($result)){
				echo "<tr>";
				echo "<td>".$row['product_name']."</td>";
				echo "<td>".$row['unit_name']."</td>";
				echo "<td>".$row['quantity']."</td>";
				echo "</tr>";
			}
		?>
	</tbody>
</table>
</body>
</html>

