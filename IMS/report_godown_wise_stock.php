<!DOCTYPE html>
<html>
<head>
	<title>Godown WiseStock Report</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
	<h2>Godown Wise Stock Report</h2>
	<form method="POST" action="">
		<label>Godown:</label>
		<select name="godown_id">
			<option value="">Select Godown</option>
			<?php
			$conn = mysqli_connect('localhost', 'root', '', 'inventory');
			$query = "SELECT * FROM godown";
			$result = mysqli_query($conn, $query);
			while($row = mysqli_fetch_assoc($result)){
				echo "<option value='".$row['id']."'>".$row['name']."</option>";
			}
			?>
		</select><br><br>
		<input type="submit" name="submit" value="View Report">
	</form>
	<?php
	if(isset($_POST['submit'])){
		$godown_id = $_POST['godown_id'];
        	// retrieve godown wise stock data
	$query = "SELECT product.name AS product_name, units.name AS unit_name, current_stock.quantity FROM current_stock 
    INNER JOIN godown ON current_stock.godown_id = godown.id
    INNER JOIN product ON current_stock.product_id = product.id
    INNER JOIN units ON product.unit_id = units.id
    WHERE godown.id = '$godown_id'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){
echo "<h3>Godown Wise Stock Report - ".mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM godown WHERE id = '$godown_id'"))['name']."</h3>";
echo "<table border='1'>";
echo "<thead>";
echo "<tr><th>Product</th><th>Unit</th><th>Quantity</th></tr>";
echo "</thead>";
echo "<tbody>";
while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td>".$row['product_name']."</td>";
    echo "<td>".$row['unit_name']."</td>";
    echo "<td>".$row['quantity']."</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";
}else{
echo "No data found";
}
}
?>
</body>
</html>
