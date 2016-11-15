<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
	include_once('header.php');
?>

<body>
	<div class="bandeauGrey">
		<br>
		<div class="paragraph">
			<h4>Temporary</h4>				
			<br><br>
		</div>
	</div>
	<form action="" method="post">
		<input type="hidden"  name="reset" value="events">
		<input type="submit" value="Reset the Events Database">
	</form>
	<form action="" method="post">
		<input type="hidden"  name="reset" value="users">
		<input type="submit" value="Reset the Users Database">
	</form>
	<?php
	//////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////							RESETING THE DATABASES									//////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////

	require("Php\db.php");
	if (isset($_POST['reset']))
	{
		if($_POST['reset'] == 'events')
		{
			query_database("DROP TABLE Events");
			query_database("CREATE TABLE Events(eventID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
												  eventType VARCHAR(50), begDay INT, begMonth INT, begYear INT,
												  endDay INT, endMonth INT, endYear INT, places INT NOT NULL)");

			query_database("INSERT INTO Events VALUES(NULL, 'Training Session', 4, 11, 2016, 5, 11, 2016, 70)");
			query_database("INSERT INTO Events VALUES(NULL, 'Canopy Flying Session', 11, 11, 2016, 12, 11, 2016, 50)");
			query_database("INSERT INTO Events VALUES(NULL, 'B Certificate Session', 18, 11, 2016, 19, 19, 2016, 30)");
		}
		else if($_POST['reset'] == 'users')
		{
			query_database("DROP TABLE Users");
			query_database("CREATE TABLE Users(userID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
												  login VARCHAR(50), password VARCHAR(50), mail VARCHAR(50))");//to be secured

			query_database("INSERT INTO Users VALUES(NULL, 'admin', 'admin', 'fakemail@fake.com')");
		}
	}
	?>

	<div class="col-xs-6">
	<div>
		<br><br>
		<h4 id="prices">Add an event:</h4>
		<br>
			<form action="" method="post">
				
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
					<input type="int" class="form-control" name="places" placeholder="Amount of places" required>
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		<br><br>
	</div>
	</div>
	<?php
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		//////////						ADING EVENTS TO THE DATABASE								//////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		require_once('Php\myFunctions.php');
		require_once('Php\product.php');
		if (isset($_POST['eventType']) && isset($_POST['begDay']) && isset($_POST['begMonth']) && isset($_POST['begYear']) &&
			isset($_POST['endDay']) && isset($_POST['endMonth']) && isset($_POST['endYear']) && isset($_POST['places']))
		{
			$newevent = event::constructWithParameters($_POST['eventType'], $_POST['begDay'], $_POST['begMonth'], $_POST['begYear'],
														$_POST['endDay'], $_POST['endMonth'], $_POST['endYear'], $_POST['places']);
			$newevent->insert_record();
		}
	?>


	<br><br>

	<div class="col-xs-6">
		<h4 id="prices">Delete an event:</h4>
			<br>
			<form action="" method="post">
				<div class="form-group">
				    <label>Event ID:</label>
				    <input type="int" class="form-control" name="eventID" placeholder="Event Id" required>
			  	</div>
			  	<button type="submit" class="btn btn-default">Submit</button>
			</form>
		<br><br>
	</div>

	<?php
	//////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////						DELETING EVENTS FROM THE DATABASE							//////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////
		if (isset($_POST['eventID']))
		{
			$tempID = $_POST['eventID'];
			query_database("DELETE FROM Events WHERE eventID=$tempID");
		}
	//////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////				DYNAMIC DISPLAY OF THE EVENTS IN THE DATABASE WITH ID				//////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////
		$results_id = retrieve_events();
		while ($row = $results_id->fetch_assoc())
		{
			printTableRowEventsAdmin($row['eventID'], $row['eventType'], $row['begDay'], $row['begMonth'], $row['begYear'],
										$row['endDay'], $row['endMonth'], $row['endYear'], $row['places']);
		}
	?>

	<br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br>

	<div class="bandeauGrey">
	<br>
	<h4 id="prices">User Gestion:</h4>
	<br><br>
		<div>
			<h4 id="deleteUser">Delete a User:</h4>
				<br>
				<form action="#deleteUser" method="post">
					<div class="form-group">
					    <label>User ID:</label>
					    <input type="int" class="form-control" name="userID" placeholder="User Id" required>
				  	</div>
				  	<button type="submit" class="btn btn-default">Submit</button>
				</form>
			<br><br>
		</div>

		<?php
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		//////////						DELETING USERS FROM THE DATABASE							//////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////
			if (isset($_POST['userID']))
			{
				$tempID = $_POST['userID'];
				query_database("DELETE FROM Users WHERE userID=$tempID");
			}
		?>

		<h4 id="prices">Printing the users (debugging purposes: to be secure and encrypted!!):</h4>

		<?php
		require_once('Php\user.php');
		require_once('Php\myFunctions.php');
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		//////////					DYNAMIC DISPLAY OF THE USERS IN THE DATABASE					//////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////
			$user = new user();
			$results_id = retrieve_users();
			while ($row = $results_id->fetch_assoc())
			{
				printTableRowUsers($row['userID'], $row['login'], $row['password'], $row['mail']);
			}
		?>
	</div>
		<br><br><br><br><br>
		
	<footer class="bandeauBlack">
		<br><br><br><br><br>
		<div>
			Join the webmaster : marc.gayraud@efrei.net
		</div>
		<br><br>	
	</footer>
</body>
</html>