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
				<form target="_blank" action="ProductDb\reset_database.php" method="get">
	  				<input type="submit" value="Reset the database">
				</form>
			<br><br>
		</div>
	</div>

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
			<form>
				<div class="form-group">
				    <label for="account">Admin account:</label>
				    <input type="account" class="form-control" id="account">
			  	</div>
			  	<div class="form-group">
				    <label for="pwd">Admin Password:</label>
				    <input type="password" class="form-control" id="pwd">
			  	</div>
				<div class="form-group">
				    <label for="eventName">Event Name:</label>
				    <input type="eventName" class="form-control" id="eventName">
			  	</div>
			  	<button type="submit" class="btn btn-default">Submit</button>
			</form>
		<br><br>
	</div>
	
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