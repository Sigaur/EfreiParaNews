<?php
	function query_database($SQLCmd)
	{
		$mysqli = new mysqli('localhost', 'root', 'concordia', 'myfirstdb');

		if ($mysqli->connect_errno)
		{
			die("Error connecting to the database.");

		}
		else
		{
			//print("Database connection succeeded!<br><br>");
		}

		$results_id = $mysqli->query($SQLCmd);
		$mysqli->close();

		return $results_id;
	}

	function insert_product($description, $cost, $weight, $inventory)
	{
		$SQLCmd = "INSERT INTO Products VALUES(NULL, '$description', $cost, $weight, $inventory)";
		query_database($SQLCmd);

		print("<h2>Executed SQL Command: </h2>$SQLCmd<br><br>");
	}

	function retrieve_products()
	{
		$SQLCmd = 'SELECT * FROM Products';
		return query_database($SQLCmd);
	}
?>