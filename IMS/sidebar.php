<head>
	<style>
		*{
			/* padding: 0;
			margin: 0; */
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
    width: 50%;
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
	</style>
</head>
<div class="sidebar">
	<h2>Inventory Management System</h2>
	<ul>
		<li><a href="dashboard.php">Dashboard</a></li>
		<li><a href="company.php">Company & Shop Details</a></li>
		<li><a href="godown.php">Godowns</a></li>
		<li><a href="unit.php">Units</a></li>
		<li><a href="product_type.php">Product Types</a></li>
		<li><a href="product.php">Products</a></li>
		<li><a href="opening_stock.php">Opening Stock</a></li>
		<li><a href="inventory_entry.php">Inventory Entry</a></li>
		<li><a href="movement.php">Movement Report</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
</div>
