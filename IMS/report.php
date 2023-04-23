<!DOCTYPE html>
<html>
<head>
	<title>Inventory Report</title>
	<style>
			table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  border: 1px solid #ddd;
  padding: 8px;
}

th {
  background-color: #4CAF50;
  color: white;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
h2{
	width: 100%;
	text-align: center;
}
body{
	display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
    align-content: center;
    justify-content: center;
    align-items: center;
}
.container{
	width: 90%;
	padding: 10px;
	background-image: linear-gradient(150deg,powderblue,white) ;
	box-shadow: 0px 0px 30px gray;
}
	</style>
</head>
<body>
	<h2>Inventory Report</h2>
	<div class="container">
	<?php
		// Establish a connection to the database
		$conn = mysqli_connect('localhost', 'root', '', 'inventory');

		// Check for connection errors
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// Get a list of tables in the database
		$tables = array();
		$result = mysqli_query($conn, "SHOW TABLES");
		while ($row = mysqli_fetch_row($result)) {
			$tables[] = $row[0];
		}

		// Print each table
		foreach ($tables as $table) {
			echo "<h3>Table: $table</h3>";

			// Get the column names
			$columns = array();
			$result = mysqli_query($conn, "SHOW COLUMNS FROM $table");
			while ($row = mysqli_fetch_assoc($result)) {
				$columns[] = $row['Field'];
			}

			// Get the data from the table
			$result = mysqli_query($conn, "SELECT * FROM $table");
			if (mysqli_num_rows($result) > 0) {
				echo "<table><tr>";
				foreach ($columns as $column) {
					echo "<th>$column</th>";
				}
				echo "</tr>";
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					foreach ($columns as $column) {
						echo "<td>" . $row[$column] . "</td>";
					}
					echo "</tr>";
				}
				echo "</table><br>";
			} else {
				echo "Table is empty<br><br>";
			}
		}

		// Close the database connection
		mysqli_close($conn);
	?>
	</div>
</body>
</html>
