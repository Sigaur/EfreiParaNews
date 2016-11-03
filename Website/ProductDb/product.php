<?php
require_once("db.php");

class event
{
	var $productID;
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
		$this->productID = null;
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
		return "$this->productID - $this->eventType starts the $this->begDay of $this->begMonth $this->begYear and finishes the $this->endDay of $this->endMonth $this->endYear. $this->places place(s) left";
	}

	public function create_table()
	{
		query_database("CREATE TABLE Events(productID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
									  eventType VARCHAR(50), begDay INT, begMonth INT, begYear INT,
									  endDay INT, endMonth INT, endYear INT, places INT NOT NULL)");
	}

	public function insert_record()
	{
		query_database("INSERT INTO Events VALUES(NULL, '$this->eventType', $this->begDay, $this->begMonth, $this->begYear,
													'$this->endDay', $this->endMonth, $this->endYear, $this->places)");
	}

	public function read_record($prodID)
	{
		$results_id = query_database("SELECT * FROM Events WHERE productID=$prodID");

		if ($row = $results_id->fetch_assoc())
		{
			$this->productID = $row["productID"];
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
		print("$this->productID - $this->eventType starts the $this->begDay of $this->begMonth $this->begYear and finishes the $this->endDay of $this->endMonth $this->endYear.<br>");
	}
}

?>