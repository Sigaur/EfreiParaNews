<!DOCTYPE html>
<html lang="en">
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
			<a class="nav-link" href="index.html"><h4>Home</h4></a>
		</li>
		<li class="nav-item active">
			<a class="nav-link" href="efreiParaPresentation.html"><h4>EfreiPara News</h4></a>
		</li>
		<li class="nav-item active">
			<a class="nav-link" href="news.html"><h4>News</h4></a>
		</li>
		</li>	  
		<li class="nav-item active">
			<a class="nav-link" href="bookIn.html"><h4>Book In</h4></a>
		</li>
		<li class="nav-item dropdown">
		  <a class="nav-link dropdown-toggle" href="#" id="supportedContentDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h4>Infos</h4></a>
		  <div class="dropdown-menu" aria-labelledby="supportedContentDropdown">
			<a class="dropdown-item" href="prices.html"><h4>Prices</h4></a>
			<a class="dropdown-item" href="becomeSkydiver.html"><h4>How to become a Skydiver</h4></a>
		  </div>
		</li>
		<li class="nav-item active">
			<a class="nav-link" href="register.html"><h4>Registration</h4></a>
		</li>
		<li class="nav-item active">
			<a class="nav-link" href="admin.html"><h4>Admin</h4></a>
		</li>
	</ul>
	</nav>
	<br><br><br><br>
	<a class="imageSousMenu" href="index.html"><img src="Images\EfreiParaNews.png"></a>
	<br><br>
</head>

<body>
	<br>
	
	<div class="bandeauGrey">
		<br><br>
			
			<p class="paragraph">

				<?php
					require_once('C:\xampp\htdocs\Website\ProductDb\myFunctions.php');
					require_once('C:\xampp\htdocs\Website\ProductDb\db.php');
					require_once('C:\xampp\htdocs\Website\ProductDb\product.php');

					$results_id = retrieve_products();
					while ($row = $results_id->fetch_assoc())
					{
						printTableRow($row['productID'], $row['eventType'], $row['begDay'], $row['begMonth'], $row['begYear'],
								$row['endDay'], $row['endMonth'], $row['endYear'], $row['places']);
					}
				?>			
			</p>
		<br><br>
	</div>
	
	<br><br>

	<p>
		<h4 class="paragraph">
			Example of form to book in (to be dynamically integrated)<br>
			Here, the example is for when the last button is selected<br>
			<br><br>
			<form>
				<div class="form-group">
				    <label for="account">Account:</label>
				    <input type="account" class="form-control" id="account">
			  	</div>
			  	<div class="form-group">
				    <label for="pwd">Password:</label>
				    <input type="password" class="form-control" id="pwd">
			  	</div>
			  	<label class="checkbox-inline"><input type="checkbox" value="">26 November</label>
				<label class="checkbox-inline"><input type="checkbox" value="">27 November</label>
				<br><br>
			  	<div class="radio">
				  	<label><input type="radio" name="optradio">Housing</label>
				</div>
				<div class="radio">
				  	<label><input type="radio" name="optradio">Camping</label>
				</div>
				<br>
				No account? Try 
				<a href="register.html">register</a>.
				<br>
			  	<button type="submit" class="btn btn-default">Submit</button>
			</form>

		</h4>
	</p>

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