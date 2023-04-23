<!DOCTYPE html>
<html>
<head>
	<title>Movement Report</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<h2>Movement Report</h2>
	<form method="POST" action="">
		<label>From Date:</label>
		<input type="date" name="from_date"><br><br>
		<label>To Date:</label>
		<input type="date" name="to_date"><br><br>
		<input type="submit" name="submit" value="View Report">
	</form>
	<?php
	if(isset($_POST['submit'])){
		$from_date = $_POST['from_date'];
		$to_date = $_POST['to_date'];

		// retrieve movement data
		$query = "SELECT movement.date, godown.name AS godown_name, product.name AS product_name, 
				units.name AS unit_name, movement.quantity, movement.type FROM movement 
				INNER JOIN godown ON movement.from_godown_id = godown.id
INNER JOIN product ON movement.product_id = product.id
INNER JOIN units ON product.unit_id = units.id
WHERE movement.date >= '$from_date' AND movement.date <= '$to_date'";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){
    echo "<h3>Movement Report - From ".$from_date." To ".$to_date."</h3>";
    echo "<table border='1'>";
    echo "<thead>";
    echo "<tr><th>Date</th><th>Godown</th><th>Product</th><th>Unit</th><th>Quantity</th><th>Type</th></tr>";
    echo "</thead>";
    echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$row['date']."</td>";
        echo "<td>".$row['godown_name']."</td>";
        echo "<td>".$row['product_name']."</td>";
        echo "<td>".$row['unit_name']."</td>";
        echo "<td>".$row['quantity']."</td>";
        echo "<td>".$row['type']."</td>";
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
