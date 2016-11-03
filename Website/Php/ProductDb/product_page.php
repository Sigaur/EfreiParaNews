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


	if (isset($_POST['eventType']) && isset($_POST['begDay']) && isset($_POST['begMonth']) && isset($_POST['begYear']) &&
		isset($_POST['endDay']) && isset($_POST['endMonth']) && isset($_POST['endYear']) && isset($_POST['places']))
	{
		$newevent = event::constructWithParameters($_POST['eventType'], $_POST['begDay'], $_POST['begMonth'], $_POST['begYear'],
													$_POST['endDay'], $_POST['endMonth'], $_POST['endYear'], $_POST['places']);
		$newevent->insert_record();
	}
	else
	{
		print("<h2>No Event was submitted.</h2>");
	}
?>

<h2>Events in the Database</h2>
<table>
<tr><th>Event Type</th><th>Beginning Date</th><th>Ending Date</th><th>Place(s) Left</th><td style="border-style: none; width: 0;"></td></tr>

<?php
		$results_id = retrieve_products();
		while ($row = $results_id->fetch_assoc())
		{
			printTableRow($row['productID'], $row['eventType'], $row['begDay'], $row['begMonth'], $row['begYear'],
							$row['endDay'], $row['endMonth'], $row['endYear'], $row['places']);
		}
?>

</table>

<?php
	print("<br><br><h2>Event Class examples</h2>");
	$prod = new event();
	$prod->read_record(2);
	print($prod . "<br><br><br>");


	include_once('footer.html');
?>

</body>
</html>