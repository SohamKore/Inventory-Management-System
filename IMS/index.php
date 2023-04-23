<?php
session_start();
if(!isset($_SESSION['username'])){
	header('Location: login.php');
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		*{
			transition: 300ms ease-in-out;
		}
		body {
			font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-image: url(https://wallpaperbat.com/img/490770-clouds-anime-girls-fantasy-art-sky-technology-anime-cranes-machine-futuristic-airships-wallpaper-hd-desktop-wallpaper.jpg) !important;
    background-color: #f2f2f2;
    display: flex;
    color: white;
    flex-direction: column;
    align-items: center;
    flex-wrap: nowrap;
    justify-content: flex-start;
    align-content: center;
		}
		
		.container {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
			padding: 20px;
		}
		
		.card {
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0 2px 5px rgba(0,0,0,0.3);
			margin: 10px;
			padding: 20px;
			text-align: center;
			transition: transform 0.2s ease-in-out;
			width: 300px;
		}
		
		.card:hover {
			transform: translateY(-5px);
		}
		
		.card h3 {
			color: #555;
			font-size: 24px;
			margin-bottom: 10px;
		}
		
		.card a {
			background-color: #4CAF50;
			border: none;
			border-radius: 5px;
			color: #fff;
			cursor: pointer;
			display: block;
			margin-top: 20px;
			padding: 10px;
			text-align: center;
			text-decoration: none;
			transition: background-color 0.2s ease-in-out;
			width: 95%;
		}
		
		.card a:hover {
			background-color: #3e8e41;
		}
	
		.sidebar{    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    align-content: center;
    justify-content: space-around;
    align-items: center;
}
ul{
    display: flex;
    font-size: xx-small;
    text-decoration: none;
    color: white !important;
    width: 80%;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    align-content: center;


}
li{
	margin: 10px;
	text-decoration: none  !important;;
	color: white !important;
	list-style: none !important;

	background-color: rgb(59, 59, 59);
	padding: 5px 7px 5px 7px;
	border-radius: 15px;
	border: 1px solid gray;
}

li:hover{

			transform: translateY(-5px);
	
}
a{
	text-decoration: none  !important;;
	color: white !important;
	list-style: none !important;
}
h2{
	text-align: center;
	width: 100%;
}
.loadData{
    display: flex;
    flex-wrap: nowrap;
    justify-content: center;
    align-items: center;
    padding: 10px;
    background-color: white;
    width: 100%;
    color: black;
    flex-direction: column;
		}
		.loadContainer{
			padding: 30px;
    background-color: white;
    display: flex;
    width: 100%;
    flex-direction: row;
    flex-wrap: nowrap;
    align-content: center;
    justify-content: center;
    align-items: center;
			
		}
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
	</style>

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      function loadContent(table) {
        $.ajax({
          url: "load_data.php",
          method: "POST",
          data: { table: table },
          success: function (response) {
            $("#loadContainer").html(response);
          },
          error: function () {
            $("#loadContainer").html("Error loading data.");
          },
        });
      }
    </script>
</head>
<body>

<div class="loadData">
<?php

// Create a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the "users" table based on the provided "username" id
$username_id = "admin"; // Replace with the desired username id
$sql = "SELECT username FROM users WHERE username='$username_id'";
$result = $conn->query($sql);

// Check if there is any data returned
if ($result->num_rows > 0) {
    // Display the name in HTML
    $row = $result->fetch_assoc();
    echo "Hello, " . $row["username"];
} else {
    echo "No data found for user with username $username_id";
}

// Close the database connection
$conn->close();

?>
		<h2>Inventory Management System</h2>
		<ul>
			<li id="company_get"><a href="#">Company</a></li>
			<li id="Godown_get"><a href="#">Godown</a></li>
			<li id="Inventory_get"><a href="#">Inventory</a></li>
			<li id="Opening_get"><a href="#">Opening_stock</a></li>
			<li id="Product_type_get"><a href="#">Product Types</a></li>
			<li id="product"><a href="#">Product</a></li>
			<li id="Units_get"><a href="#">Units</a></li>
			<li id="Users_get"><a href="#">Users</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
		<div class="loadContainer">
	</div>
</div>

	<div class="container">
		<div class="card">
			<h3>Company & Shop Detail</h3>
			<a href="company.php">Manage</a>
		</div>
		<div class="card">
			<h3>Create Godown</h3>
			<a href="create_godown.php">Create</a>
		</div>
		<div class="card">
			<h3>Create Units</h3>
			<a href="create_unit.php">Create</a>
		</div>
		<div class="card">
			<h3>Create Product Type</h3>
			<a href="create_product_type.php">Create</a>
		</div>
		<div class="card">
			<h3>Create Product</h3>
			<a href="create_product.php">Create</a>
		</div>
		<div class="card">
			<h3>Insert Opening Stock</h3>
			<a href="insert_opening_stock.php">Insert</a>
		</div>
    <div class="card">
			<h3>Create Inventory</h3>
			<a href="create_inventory.php">Insert</a>
		</div>
		<div class="card">
			<h3>Report</h3>
			<a href="report.php">View</a>
		</div>

	</div>
</body>
<script>

$(document).ready(function(){
    $("#company_get").click(function(){
        $.post("retrieve_data.php", {table_name: "company"}, function(data){
            $(".loadContainer").html(data);
        });
    });

    $("#Godown_get").click(function(){
        $.post("retrieve_data.php", {table_name: "godown"}, function(data){
            $(".loadContainer").html(data);
        });
    });

    $("#Inventory_get").click(function(){
        $.post("retrieve_data.php", {table_name: "inventory"}, function(data){
            $(".loadContainer").html(data);
        });
    });

    $("#Opening_get").click(function(){
        $.post("retrieve_data.php", {table_name: "opening_stock"}, function(data){
            $(".loadContainer").html(data);
        });
    });

    $("#Product_type_get").click(function(){
        $.post("retrieve_data.php", {table_name: "product_type"}, function(data){
            $(".loadContainer").html(data);
        });
    });

    $("#Product_get").click(function(){
        $.post("retrieve_data.php", {table_name: "Products"}, function(data){
            $(".loadContainer").html(data);
        });
    });

    $("#Units_get").click(function(){
        $.post("retrieve_data.php", {table_name: "units"}, function(data){
            $(".loadContainer").html(data);
        });
    });

    $("#Users_get").click(function(){
        $.post("retrieve_data.php", {table_name: "users"}, function(data){
            $(".loadContainer").html(data);
        });
    });
});

	const company_get = document.getElementById("company_get");
const container = document.querySelector(".loadContainer");

company_get.addEventListener("click", function() {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      const data = JSON.parse(this.responseText);
      const table = generateTable(data);
      container.innerHTML = table;
    }
  };
  xhr.open("GET", "retrieve_data.php?table=company&database=inventory", true);
  xhr.send();
});

function generateTable(data) {
  let table = "<table>";
  table += "<thead><tr>";
  for (const column in data[0]) {
    table += "<th>" + column + "</th>";
  }
  table += "</tr></thead><tbody>";
  for (const row of data) {
    table += "<tr>";
    for (const column in row) {
      table += "<td>" + row[column] + "</td>";
    }
    table += "</tr>";
  }
  table += "</tbody></table>";
  return table;
}


const Godown_get = document.getElementById("Godown_get");

Godown_get.addEventListener("click", function() {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      const data = JSON.parse(this.responseText);
      const table = generateTable(data);
      container.innerHTML = table;
    }
  };
  xhr.open("GET", "retrieve_data.php?table=godown&database=inventory", true);
  xhr.send();
});

function generateTable(data) {
  let table = "<table>";
  table += "<thead><tr>";
  for (const column in data[0]) {
    table += "<th>" + column + "</th>";
  }
  table += "</tr></thead><tbody>";
  for (const row of data) {
    table += "<tr>";
    for (const column in row) {
      table += "<td>" + row[column] + "</td>";
    }
    table += "</tr>";
  }
  table += "</tbody></table>";
  return table;
}

const Inventory_get = document.getElementById("Inventory_get");

Inventory_get.addEventListener("click", function() {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      const data = JSON.parse(this.responseText);
      const table = generateTable(data);
      container.innerHTML = table;
    }
  };
  xhr.open("GET", "retrieve_data.php?table=inventory&database=inventory", true);
  xhr.send();
});

function generateTable(data) {
  let table = "<table>";
  table += "<thead><tr>";
  for (const column in data[0]) {
    table += "<th>" + column + "</th>";
  }
  table += "</tr></thead><tbody>";
  for (const row of data) {
    table += "<tr>";
    for (const column in row) {
      table += "<td>" + row[column] + "</td>";
    }
    table += "</tr>";
  }
  table += "</tbody></table>";
  return table;
}

const Opening_get = document.getElementById("Opening_get");

Opening_get.addEventListener("click", function() {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      const data = JSON.parse(this.responseText);
      const table = generateTable(data);
      container.innerHTML = table;
    }
  };
  xhr.open("GET", "retrieve_data.php?table=opening_stock&database=inventory", true);
  xhr.send();
});

function generateTable(data) {
  let table = "<table>";
  table += "<thead><tr>";
  for (const column in data[0]) {
    table += "<th>" + column + "</th>";
  }
  table += "</tr></thead><tbody>";
  for (const row of data) {
    table += "<tr>";
    for (const column in row) {
      table += "<td>" + row[column] + "</td>";
    }
    table += "</tr>";
  }
  table += "</tbody></table>";
  return table;
}



const Product_type_get = document.getElementById("Product_type_get");

Product_type_get.addEventListener("click", function() {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      const data = JSON.parse(this.responseText);
      const table = generateTable(data);
      container.innerHTML = table;
    }
  };
  xhr.open("GET", "retrieve_data.php?table=product_type&database=inventory", true);
  xhr.send();
});

function generateTable(data) {
  let table = "<table>";
  table += "<thead><tr>";
  for (const column in data[0]) {
    table += "<th>" + column + "</th>";
  }
  table += "</tr></thead><tbody>";
  for (const row of data) {
    table += "<tr>";
    for (const column in row) {
      table += "<td>" + row[column] + "</td>";
    }
    table += "</tr>";
  }
  table += "</tbody></table>";
  return table;
}



const product = document.getElementById("product");

product.addEventListener("click", function() {

  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      const data = JSON.parse(this.responseText);
      const table = generateTable(data);
      container.innerHTML = table;
    }
  };
  xhr.open("GET", "retrieve_data.php?table=product_type&database=inventory", true);
  xhr.send();
});

function generateTable(data) {
  let table = "<table>";
  table += "<thead><tr>";
  for (const column in data[0]) {
    table += "<th>" + column + "</th>";
  }
  table += "</tr></thead><tbody>";
  for (const row of data) {
    table += "<tr>";
    for (const column in row) {
      table += "<td>" + row[column] + "</td>";
    }
    table += "</tr>";
  }
  table += "</tbody></table>";
  return table;
}


const Units_get = document.getElementById("Units_get");

Units_get.addEventListener("click", function() {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      const data = JSON.parse(this.responseText);
      const table = generateTable(data);
      container.innerHTML = table;
    }
  };
  xhr.open("GET", "retrieve_data.php?table=units&database=inventory", true);
  xhr.send();
});

function generateTable(data) {
  let table = "<table>";
  table += "<thead><tr>";
  for (const column in data[0]) {
    table += "<th>" + column + "</th>";
  }
  table += "</tr></thead><tbody>";
  for (const row of data) {
    table += "<tr>";
    for (const column in row) {
      table += "<td>" + row[column] + "</td>";
    }
    table += "</tr>";
  }
  table += "</tbody></table>";
  return table;
}


const Users_get = document.getElementById("Users_get");

Users_get.addEventListener("click", function() {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      const data = JSON.parse(this.responseText);
      const table = generateTable(data);
      container.innerHTML = table;
    }
  };
  xhr.open("GET", "retrieve_data.php?table=users&database=inventory", true);
  xhr.send();
});

function generateTable(data) {
  let table = "<table>";
  table += "<thead><tr>";
  for (const column in data[0]) {
    table += "<th>" + column + "</th>";
  }
  table += "</tr></thead><tbody>";
  for (const row of data) {
    table += "<tr>";
    for (const column in row) {
      table += "<td>" + row[column] + "</td>";
    }
    table += "</tr>";
  }
  table += "</tbody></table>";
  return table;
}

</script>
<!-- 
<li id="Product_type_get"><a href="#">Product Types</a></li>
    <li id="Product_get"><a href="#">Products</a></li>
    <li id="Units_get"><a href="#">Unitsk</a></li>
    <li id="Users_get"><a href="#">Users</a></li> -->

</html>