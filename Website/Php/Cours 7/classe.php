<!DOCTYPE html>
<html>
<head>
	<title>Title</title>
</head>

<body>

<?php

	$mysqli = new mysqli("localhost", "root", "concordia", "myfirstdb");
	if($mysqli->connect_errno)
	{
		die ("Fail to connect to MySQL" . $mysqli->connect_errno);
	}
	else
	{
		print ("It Works !");
	}

class eventManager
{
	public function create_table()
	{
		$SQLcmd = 'CREATE TABLE Events(EventID int AUTO_INCREMENT PRIMARY KEY, EventType TEXT, EventStarting int, EventEnding int)';
		query_database($SQLcmd);
		print("<h2>Executed SQL Command: </h2>$SQLCmd<br><br>");
	}

	public function read_record($ID)
	{
		$SQLcmd = 'SELECT EventID FROM Events WHERE($ID)';
		query_database($SQLcmd);
		print("<h2>Executed SQL Command: </h2>$SQLCmd<br><br>");
	}

	public function delete_record($ID)
	{
		$SQLcmd = 'DELETE FROM Events
		WHERE EventID=$ID';
		query_database($SQLcmd);
		print("<h2>Executed SQL Command: </h2>$SQLCmd<br><br>");
	}

	function retrieve_events()
	{
		$SQLCmd = 'SELECT * FROM Events';
		return query_database($SQLCmd);
	}

}

class event
{
	var $ID;
	var $type;
	var $beginning;
	var $ending;

	public function _construct($type, $beginning, $ending)
	{
		$this->type = $type;
		$this->beginning = $beginning;
		$this->ending = $ending;
	}

	public function insert_record()
	{
		$SQLcmd = 'INSERT INTO Events VALUES($this->$ID, $this->type, $this->beginning, $this->ending)';
		query_database($SQLcmd);
		print("<h2>Executed SQL Command: </h2>$SQLCmd<br><br>");
	}

	public function update_record()
	{
		$SQLcmd = 'SELECT EventID FROM Events WHERE($this->$ID)';
		$SQLcmd = 'UPDATE Events
		SET col2=$this->type, col3=$this->beginning, col4=$this->ending';
		query_database($SQLcmd);
		print("<h2>Executed SQL Command: </h2>$SQLCmd<br><br>");
	}
}
?>

</body>


</html>