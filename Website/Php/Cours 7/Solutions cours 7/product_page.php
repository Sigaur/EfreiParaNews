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
	require_once('db.php');
	require_once('product.php');



	if (isset($_POST['description']) && isset($_POST['cost']) &&
		isset($_POST['weight']) && isset($_POST['inventory']))
	{
		$newproduct = product::constructWithParameters($_POST['description'], $_POST['cost'], 
					   			  				  	   $_POST['weight'], $_POST['inventory']);
		$newproduct->insert_record();
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
		$results_id = retrieve_products();
		while ($row = $results_id->fetch_assoc())
		{
			printTableRow($row['productDesc'], $row['cost'], $row['weight'], $row['inventory']);
		}
?>

</table>

<?php
	print("<br><br><h2>Product Class examples</h2>");
	$prod = new product();
	$prod->read_record(2);
	print($prod . "<br><br><br>");


	include_once('footer.html');
?>

</body>
</html>