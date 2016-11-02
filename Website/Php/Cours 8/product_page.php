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

	

	if (isset($_POST['type']) && isset($_POST['beginning']) &&
		isset($_POST['ending']))
	{
		$newproduct = product::constructWithParameters($_POST['type'], $_POST['beginning'], 
					   			  				  	   $_POST['ending']);
		$newproduct->create_table();
		$newproduct->insert_record();
	}
	else
	{
		print("<h2>No product was submitted.</h2>");
	}
?>

<h2>Products in the Database</h2>
<table>
<tr><th>Type</th><th>Starting</th><th>Ending</th></tr>

<?php
		$results_id = retrieve_products();

		/*
		print_r ($results_id);
		$row = $results_id->fetch_assoc();
		print_r ($row);
		*/

		while ($row = $results_id->fetch_assoc())
		{
			printTableRow($row['productID'], $row['type'], $row['beginning'], $row['ending']);
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