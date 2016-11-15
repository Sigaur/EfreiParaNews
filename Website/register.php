<?php
	session_start();
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
			<div>
			<h4>Adding a User:</h4>
				<br>
				<form action="" method="post">
					<div class="form-group">
					    <label>Account Name:</label>
					    <input type="text" class="form-control" name="login" placeholder="Login" required>
				  	</div>
				  	<div class="form-group">
					    <label>Password:</label>
					    <input type="password" class="form-control" name="password" placeholder="password" required>
				  	</div>

				  	<div class="form-group">
					    <label>Email:</label>
					    <input type="email" class="form-control" name="email" placeholder="email" required>
				  	</div>
				  	<button type="submit" class="btn btn-default">Submit</button>
				</form>
			<br><br>
		</div>

		<?php
			require_once('Php\db.php');
			require_once('Php\user.php');
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		//////////							ADDING USERS TO THE DATABASE							//////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////
			if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['email']))
			{
				$newuser = user::constructWithParameters($_POST['login'], $_POST['password'], $_POST['email']);
				$newuser->insert_record();
			}
		?>

		<br><br>
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