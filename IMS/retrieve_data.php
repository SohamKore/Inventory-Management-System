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

// Check if the request is for company table
if(isset($_GET['table']) && $_GET['table'] == 'company'){
    // Retrieve data from the "company" table
    $sql = "SELECT * FROM company";
} elseif(isset($_GET['table']) && $_GET['table'] == 'godown'){
    // Retrieve data from the "godown" table
    $sql = "SELECT * FROM godown";
} elseif(isset($_GET['table']) && $_GET['table'] == 'inventory'){
    // Retrieve data from the "inventory" table
    $sql = "SELECT * FROM inventory";
} elseif(isset($_GET['table']) && $_GET['table'] == 'opening_stock'){
    // Retrieve data from the "opening_stock" table
    $sql = "SELECT * FROM opening_stock";
} elseif(isset($_GET['table']) && $_GET['table'] == 'product_type'){
    // Retrieve data from the "product_type" table
    $sql = "SELECT * FROM product_type";
} elseif(isset($_GET['table']) && $_GET['table'] == 'products'){
    // Retrieve data from the "products" table
    $sql = "SELECT * FROM products";
} elseif(isset($_GET['table']) && $_GET['table'] == 'units'){
    // Retrieve data from the "units" table
    $sql = "SELECT * FROM units";
} elseif(isset($_GET['table']) && $_GET['table'] == 'users'){
    // Retrieve data from the "users" table
    $sql = "SELECT * FROM users";
} else {
    // Return an error message if table is not found
    $error = array('error' => 'Table not found');
    $data = json_encode($error);
    header('Content-Type: application/json');
    echo $data;
    exit();
}

$result = $conn->query($sql);

// Convert the data to JSON format
$rows = array();
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
$data = json_encode($rows);

// Close the database connection
$conn->close();

// Return the data
header('Content-Type: application/json');
echo $data;
