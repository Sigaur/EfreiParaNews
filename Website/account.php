<?php
	session_start();

	require("Php\product.php");

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
<!DOCTYPE html>
<html lang="en">
<?php
	include_once('header.php');
?>

<body>
	

	<?php
	require_once('Php\user.php');
	if (!isset($_SESSION["login"]))
	{
		print("ERROR : NOT LOGGED IN");
		header("Location: connect.php");
	}
	else
	{
		$temp = $_SESSION["login"];
		print("<div class='bandeauGrey'><br>
			   	<p class='paragraph'>
			   	Hello,<br>
			   	Your are currently connected as : $temp<br><br>
			   	</p>
			   	</div><br><br><br><br>");
	}
   	?>

<?php
   	if (isset($cart_item))
	{
		$splitted_cart = split(",", $cart_item);

		foreach($splitted_cart as $itemId)
		{
			$current_event = new event();
			$current_event->read_record($itemId);
			
			$temp = $current_event->affichage();
			print("$temp");
			//print("$current_event <br><br>");
		}

		print("<form action='account.php' method='post'>");
		print("<input type='submit' name='emptyCart' value='Empty Cart'>");
		print("</form>");

	}
	else
	{
		print("<h5>No Events in shopping cart!</h5>");
	}

	print("<br><br>Continue <a href='bookIn.php'>shopping</a>...");
	?>
   	
	
		<br><br><br><br><br><br>
		
	<footer class="bandeauBlack">
		<br><br><br><br><br>
		<div>
			Join the webmaster : marc.gayraud@efrei.net
		</div>
		<br><br>	
	</footer>
</body>
</html>