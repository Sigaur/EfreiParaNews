<?php
	function query_database($SQLCmd)
	{
		$mysqli = new mysqli('localhost', '', '55674729', 'myfirstdb');

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

	function retrieve_products()
	{
		$SQLCmd = 'SELECT * FROM Products';
		return query_database($SQLCmd);
	}
?>