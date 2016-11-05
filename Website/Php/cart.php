<?php
	session_start();

	require("product.php");

	$cart_item = null;

	if (isset($_SESSION['cart_item']))
	{
		$cart_item = $_SESSION['cart_item'];
	}
	elseif (isset($_COOKIE['cart_item']))
	{
		$cart_item = $_COOKIE['cart_item'];
	}

	if (isset($_POST['emptyCart']))
	{
		$_SESSION['cart_item'] = null;
		setCookie('cart_item', null, -1);
		$cart_item = null;
	}


?>


<html>
<head>
	<title>Shopping Cart</title>
</head>
<body>

<?php
	if (isset($cart_item))
	{
		$splitted_cart = split(",", $cart_item);

		foreach($splitted_cart as $itemId)
		{
			$current_product = new product();
			$current_product->read_record($itemId);
			
			$current_product->displayInCart();
			//print("$current_product <br><br>");
		}

		print("<form action='cart.php' method='post'>");
		print("<input type='submit' name='emptyCart' value='Empty Cart'>");
		print("</form>");

	}
	else
	{
		print("<h3>No product in shopping cart!</h3>");
	}

	print("<br><br>Continue <a href='product_page.php'>shopping</a>...");


?>

</body>
</html>