<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
	include_once('header.php');
?>

<body>
	

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
	else
	{
		print("You are already connected");
		header("Location: bookIn.php");
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