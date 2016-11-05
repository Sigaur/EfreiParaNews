<?php
	function query_database($SQLCmd)
	{
		$mysqli = new mysqli('localhost', 'efreiPara', 'concordia', 'myfirstdb');

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

	function retrieve_events()
	{
		$SQLCmd = 'SELECT * FROM Events';
		return query_database($SQLCmd);
	}

	function retrieve_users()
	{
		$SQLCmd = 'SELECT * FROM USERS';
		return query_database($SQLCmd);
	}
?>