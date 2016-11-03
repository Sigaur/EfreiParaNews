<!DOCTYPE html>
<html lang="en">
<?php
	include_once('C:\xampp\htdocs\Website\header.html');
?>

<body>
	<br>
	
	<div class="bandeauGrey">
		<br><br>
			
			<p class="paragraph">

				<?php
				
					require_once('C:\xampp\htdocs\Website\ProductDb\myFunctions.php');
					require_once('C:\xampp\htdocs\Website\ProductDb\db.php');
					require_once('C:\xampp\htdocs\Website\ProductDb\product.php');
					if (isset($_POST['eventType']) && isset($_POST['begDay']) && isset($_POST['begMonth']) && isset($_POST['begYear']) &&
											isset($_POST['endDay']) && isset($_POST['endMonth']) && isset($_POST['endYear']) && isset($_POST['places']))
					{
						$newevent = event::constructWithParameters($_POST['eventType'], $_POST['begDay'], $_POST['begMonth'], $_POST['begYear'],
																	$_POST['endDay'], $_POST['endMonth'], $_POST['endYear'], $_POST['places']);
						$newevent->insert_record();
					}
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
				<a href="register.php">register</a>.
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