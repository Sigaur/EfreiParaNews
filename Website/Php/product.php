<?php
require_once("db.php");

class event
{
	var $eventID;
	var $eventType;
	var $begDay;
	var $begMonth;
	var $begYear;
	var $endDay;
	var $endMonth;
	var $endYear;
	var $places;

	public function __construct()
	{
		$this->eventID = null;
		$this->eventType = null;
		$this->begDay = null;
		$this->begMonth = null;
		$this->begYear = null;
		$this->endDay = null;
		$this->endMonth = null;
		$this->endYear = null;
		$this->places = null;
	}

	public function constructWithParameters($eventType, $begDay, $begMonth, $begYear, $endDay, $endMonth, $endYear, $places)
	{
		$instance = new self();
		
		$instance->eventType = $eventType;
		$instance->begDay = $begDay;
		$instance->begMonth = $begMonth;
		$instance->begYear = $begYear;
		$instance->endDay = $endDay;
		$instance->endMonth = $endMonth;
		$instance->endYear = $endYear;
		$instance->places = $places;

		return $instance;
	}

	public function __toString()
	{
		return "$this->eventID - $this->eventType starts the $this->begDay of $this->begMonth $this->begYear and finishes the $this->endDay of $this->endMonth $this->endYear. $this->places place(s) left";
	}

	public function affichage()
	{
		return "$this->eventID - $this->eventType";
	}

	public function create_table()
	{
		query_database("DROP TABLE Events");
		query_database("CREATE TABLE Events(eventID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
											  eventType VARCHAR(50), begDay INT, begMonth INT, begYear INT,
											  endDay INT, endMonth INT, endYear INT, places INT NOT NULL)");

		query_database("INSERT INTO Events VALUES(NULL, 'Training Session', 4, 11, 2016, 5, 11, 2016, 70)");
		query_database("INSERT INTO Events VALUES(NULL, 'Canopy Flying Session', 11, 11, 2016, 12, 11, 2016, 50)");
		query_database("INSERT INTO Events VALUES(NULL, 'B Certificate Session', 18, 11, 2016, 19, 19, 2016, 30)");
	}

	public function insert_record()
	{
		query_database("INSERT INTO Events VALUES(NULL, '$this->eventType', $this->begDay, $this->begMonth, $this->begYear,
													$this->endDay, $this->endMonth, $this->endYear, $this->places)");
	}

	public function read_record($prodID)
	{
		$results_id = query_database("SELECT * FROM Events WHERE eventID=$prodID");

		if ($row = $results_id->fetch_assoc())
		{
			$this->eventID = $row["eventID"];
			$this->eventType = $row["eventType"];
			$this->begDay = $row["begDay"];
			$this->begMonth = $row["begMonth"];
			$this->begYear = $row["begYear"];
			$this->endDay = $row["endDay"];
			$this->endMonth = $row["endMonth"];
			$this->endYear = $row["endYear"];
			$this->places = $row["places"];
		}
	}

	public function displayInCart()
	{
		print("$this->eventID - $this->eventType starts the $this->begDay of $this->begMonth $this->begYear and finishes the $this->endDay of $this->endMonth $this->endYear.<br>");
	}
}

?>