<?php
	session_start();

	// set shopping cart items
	$cart_item = null;
	
	if (isset($_SESSION['cart_item']))
	{
		$cart_item = $_SESSION['cart_item'];
	}
	elseif (isset($_COOKIE['cart_item']))
	{
		$cart_item = $_COOKIE['cart_item'];
	}

	
	if (isset($_POST['productID']))
	{
		$productToAdd = $_POST['productID'];
		$expiration = time() + (60*60*24*7);

		// Add cart item to cookie			
		if (isset($_COOKIE['cart_item']))
		{
			// Append to existing cookie
			$cart_item = $_COOKIE['cart_item'];
			$cart_item = "$cart_item,$productToAdd";
		}
		else
		{
			// Create cookie
			$cart_item = $productToAdd;
		}


		// Add cart item to session
		if (isset($_SESSION['cart_item']))
		{
			$cart_item = $_SESSION['cart_item'];
			$cart_item = "$cart_item,$productToAdd";	
		}
		else
		{
			$cart_item = "$productToAdd";
		}

		$_SESSION['cart_item'] = $cart_item;
		setcookie("cart_item", $cart_item, $expiration);

	}
?>

<html>
<head>
	<title>Products in inventory</title>
	<style type="text/css">
		td , th
		{
			text-align: center;
			border: 1px solid black;
		}

		th
		{
			color: white;
			background-color: black;
		}

		table
		{
			border-collapse: collapse;
			border: 1px solid black;
			width: 75%;
		}
	</style>
</head>
<body>


<?php
	require_once('myFunctions.php');
	require_once('db.php');
	require_once('product.php');


	if (isset($cart_item))
	{
		print("Shopping cart cookie: " . $cart_item);
	
		print("<a href='cart.php'>Shopping Cart (". count(split(',', $cart_item)) .")</a>");
	}


	if (isset($_POST['description']) && isset($_POST['cost']) &&
		isset($_POST['weight']) && isset($_POST['inventory']))
	{
		$newproduct = product::constructWithParameters($_POST['description'], $_POST['cost'], 
					   			  				  	   $_POST['weight'], $_POST['inventory']);
		$newproduct->insert_record();
	}
	else
	{
		print("<h2>No product was submitted.</h2>");
	}
?>

<h2>Products in the Database</h2>
<table>
<tr><th>Description</th><th>Cost</th><th>Weight</th><th>Inventory</th><td style="border-style: none; width: 0;"></td></tr>

<?php
		$results_id = retrieve_products();
		while ($row = $results_id->fetch_assoc())
		{
			printTableRow($row['productID'], $row['productDesc'], $row['cost'], $row['weight'], $row['inventory']);
		}
?>

</table>

<?php
	print("<br><br><h2>Product Class examples</h2>");
	$prod = new product();
	$prod->read_record(2);
	print($prod . "<br><br><br>");


	include_once('footer.html');
?>

</body>
</html>