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

	
	if (isset($_POST['eventID']))
	{
		$productToAdd = $_POST['eventID'];
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
<!DOCTYPE html>
<html lang="en">
<?php
	include_once('header.php');
?>

<body>
	<br>
	
	<div class="bandeauGrey">
		<br><br>
			
			<p class="paragraph" id="logIn">

				<?php
				//////////////////////////////////////////////////////////////////////////////////////////////////////
				//////////					DYNAMIC DISPLAY OF THE EVENTS IN THE DATABASE					//////////
				//////////////////////////////////////////////////////////////////////////////////////////////////////
					require_once('Php\db.php');
					require_once('Php\myfunctions.php');
					$results_id = retrieve_events();
					while ($row = $results_id->fetch_assoc())
					{
						printTableRowEvents($row['eventID'], $row['eventType'], $row['begDay'], $row['begMonth'], $row['begYear'],
								$row['endDay'], $row['endMonth'], $row['endYear'], $row['places']);
					}

					if (isset($cart_item))
					{
						print("Shopping cart cookie: " . $cart_item);
					
						print("<a href='account.php'>Shopping Cart (". count(split(',', $cart_item)) .")</a>");
					}
				?>			
			</p>
		<br><br>
	</div>
	
	<br><br>

	

	<?php
	//////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////									Loging In										//////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////
	require_once('Php\user.php');
	if (!isset($_SESSION["login"]))
	{
		print("<p>
				<h4 class='paragraph'>
					Sign In<br>
					<br><br>
					<form action='#logIn' method='post'>
						<div class='form-group'>
						    <label>Login:</label>
						    <input type='text' class='form-control' name='login' placeholder='Login' required>
					  	</div>
					  	<div class='form-group'>
						    <label>Password:</label>
						    <input type='password' class='form-control' name='password' placeholder='Password' required>
					  	</div>
					  	<button type='submit' class='btn btn-default'>Submit</button>
					</form>

				</h4>
			</p>");
	}
	if (isset($_POST['login']) && isset($_POST['password']))
	{
      	$tempUser = new user();
      	$tempUser->read_recordLogin($_POST['login']);

      	if($_POST['password'] == $tempUser->getPassword())
		{
			print("Connected!!!!!!");
			$_SESSION["login"] = $_POST['login'];
			header("Refresh:0");
		}
		else
		{			
			//print("Non Connecte... $_POST['password'] / $tempUser->getPassword()");
		}
	}
   	?>

	<br><br>
	
	<div class="calendar">
		<iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showTabs=0&amp;showCalendars=0&amp;height=600&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;
			src=efreiparanews%40gmail.com&amp;color=%231B887A&amp;ctz=America%2FToronto" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no">
		</iframe>
	</div>
	
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