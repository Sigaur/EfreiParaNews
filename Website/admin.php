<!DOCTYPE html>
<html lang="en">
<?php
	include_once('C:\xampp\htdocs\Website\header.html');
?>

<body>
	<div class="bandeauGrey">
		<br>
		<div class="paragraph">
			<h4>Temporary</h4>
				<form method="post">
					<input type="hidden"  name="reset" value="Reset the database">
	  				<input type="submit" value="Reset the database">
				</form>
			<br><br>
		</div>
	</div>

	<?php
	require("ProductDb\db.php");
	if (isset($_POST['reset']))
	{
		query_database("DROP TABLE Events");
		query_database("CREATE TABLE Events(productID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
											  eventType VARCHAR(50), begDay INT, begMonth INT, begYear INT,
											  endDay INT, endMonth INT, endYear INT, places INT NOT NULL)");

		query_database("INSERT INTO Events VALUES(NULL, 'Training Session', 4, 11, 2016, 5, 11, 2016, 70)");
		query_database("INSERT INTO Events VALUES(NULL, 'Canopy Flying Session', 11, 11, 2016, 12, 11, 2016, 50)");
		query_database("INSERT INTO Events VALUES(NULL, 'B Certificate Session', 18, 11, 2016, 19, 19, 2016, 30)");
	}
	?>

	<div class="col-xs-6">
	<div>
		<br><br>
		<h4 id="prices">Add an event:</h4>
		<br>
			<form action="bookIn.php" method="post">
				
				<div class="form-group">
					<label>Event Type:</label><br>
					<input type="text" class="form-control" name="eventType" placeholder="Event Type" required>
				</div>				
				<div class="form-group">
				<label>Beginning Date:</label><br>
					<div class="col-xs-2">
						<input type="int" class="form-control" name="begDay" placeholder="Day" required>
					</div>
					<div class="col-xs-2">
						<input type="int" class="form-control" name="begMonth" placeholder="Month" required>
					</div>
					<div class="col-xs-2">
						<input type="int" class="form-control" name="begYear" placeholder="Year" required>
					</div>
				</div>
				<br>
				<div class="form-group">
				<label>Ending Date:</label><br>
					<div class="col-xs-2">
						<input type="int" class="form-control" name="endDay" placeholder="Day" required>
					</div>
					<div class="col-xs-2">
						<input type="int" class="form-control" name="endMonth" placeholder="Month" required>
					</div>
					<div class="col-xs-2">
						<input type="int" class="form-control" name="endYear" placeholder="Year" required><br>
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<label>Amount of Places:</label><br>
					<input type="text" class="form-control" name="places" placeholder="Amount of places" required>
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		<br><br>
	</div>
	</div>

	<br><br>

	<div class="col-xs-6">
		<h4 id="prices">Delete an event:</h4>
			<br>
			<form action="" method="post">
				<div class="form-group">
				    <label>Event ID:</label>
				    <input type="int" class="form-control" name="productID" placeholder="Event Id" required>
			  	</div>
			  	<button type="submit" class="btn btn-default">Submit</button>
			</form>
		<br><br>
	</div>

	<?php
		//require("ProductDb\db.php");
		if (isset($_POST['productID']))
		{
			$tempID = $_POST['productID'];
			query_database("DELETE FROM events WHERE productID=$tempID");
		}
	?>	
		<br><br><br><br><br><br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br><br><br><br><br><br>
		
	<footer class="bandeauBlack">
		<br><br><br><br><br>
		<div>
			Join the webmaster : marc.gayraud@efrei.net
		</div>
		<br><br>	
	</footer>
</body>
</html>