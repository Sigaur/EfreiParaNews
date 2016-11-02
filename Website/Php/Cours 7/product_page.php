<html>
<head>
	<title>Products in inventory</title>
	<style type="text/css">
		td , th
		{
			text-align: center;
			border: 1px solid black;
		}

		th
		{
			color: white;
			background-color: black;
		}

		table
		{
			border-collapse: collapse;
			border: 1px solid black;
			width: 75%;
		}
	</style>
</head>
<body>
<?php
	require_once('myFunctions.php');
	require_once('classe.php');

	$eventManager = new eventManager;
	if (isset($_POST['type']) && isset($_POST['beginning']) &&
		isset($_POST['ending']))
	{
		$event = new event($_POST['type'], $_POST['beginning'], $_POST['ending']);
		$event->insert_record();
	}
	else
	{
		print("<h2>No product was submitted.</h2>");
	}
?>

<h2>Products in the Database</h2>
<table>
<tr><th>Description</th><th>Cost</th><th>Weight</th><th>Inventory</th></tr>

<?php
		$results_id = retrieve_events();
		while ($row = $results_id->fetch_assoc())
		{
			printTableRow($row['productDesc'], $row['cost'], $row['weight'], $row['inventory']);
		}
?>

</table>

<?php
	include_once('footer.html');
?>

</body>
</html>