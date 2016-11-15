&copy;
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EfreiPara News</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css\mystyle.css">
	
	<!--NAVIGATION BAR-->
	
	<nav class="navbar navbar-dark navbar-fixed-top" style="background-color: #990016;">
	  <ul class="nav navbar-nav">
	  <li class="nav-item active">
			<a class="nav-link" href="index.php"><h5>Home</h5></a>
		</li>
		<li class="nav-item active">
			<a class="nav-link" href="efreiParaPresentation.php"><h5>EfreiPara News</h5></a>
		</li>
		<li class="nav-item active">
			<a class="nav-link" href="news.php"><h5>News</h5></a>
		</li>
		</li>	  
		<li class="nav-item active">
			<a class="nav-link" href="bookIn.php"><h5>Book In</h5></a>
		</li>
		<li class="nav-item dropdown">
		  <a class="nav-link dropdown-toggle" href="#" id="supportedContentDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h5>Infos</h5></a>
		  <div class="dropdown-menu" aria-labelledby="supportedContentDropdown">
			<a class="dropdown-item" href="prices.php"><h5>Prices</h5></a>
			<a class="dropdown-item" href="becomeSkydiver.php"><h5>How to become a Skydiver</h5></a>
		  </div>
		</li>
		<li class="nav-item active">
			<a class="nav-link" href="register.php"><h5>Registration</h5></a>
		</li>
		
		<?php
			if (isset($_SESSION["login"]))
			{	
				if ($_SESSION["login"] == 'admin')
				{
					print("<li class='nav-item active'>
						<a class='nav-link' href='admin.php'><h5>Admin</h5></a>
						</li>");
				}									
				$temp = $_SESSION["login"];
				print("<li><p class='navbar-text'>Connected as $temp</p></li>");
				print("<li><form class='deconnect' action='' method='post'>
						<input type='hidden'  name='endSession' value='end'>
						<input  clas='.navbar-btn' type='submit' value='Deconnect'>
					</form></li>");
				print("<li class='nav-item active'>
						<a class='nav-link' href='account.php'><h5>Account</h5></a>
						</li>");
				if (isset($_POST['endSession']))
				{
					session_destroy();
					header("Refresh:0");
				}
			}
			else
			{
				print("	<li class='nav-item active'>
							<a class='nav-link' href='connect.php'><h5>Connect</h5></a>
						</li>");
			}			

			
		?>
	</ul>
	</nav>
	<br><br><br><br>
	<a class="imageSousMenu" href="index.php"><img src="Images\EfreiParaNews.png"></a>
	<br><br>
</head>