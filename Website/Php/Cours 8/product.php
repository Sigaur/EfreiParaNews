<?php
require_once("db.php");

class product
{
	var $eventID;
	var $type;
	var $beginning;
	var $ending;

	public function __construct()
	{
		$this->productID = null;
		$this->type = null;
		$this->beginning = null;
		$this->ending = null;
	}

	public function constructWithParameters($type, $beginning, $ending)
	{
		$instance = new self();
		
		$instance->type = $type;
		$instance->beginning = $beginning;
		$instance->ending = $ending;

		return $instance;
	}

	public function __toString()
	{
		return "$this->productID - $this->type  starts $this->beginning and end at $this->ending";
	}

	public function create_table()
	{
		query_database("CREATE TABLE Products(productID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
											  type VARCHAR(50), beginning INT, ending INT)");
	}

	public function insert_record()
	{
		query_database("INSERT INTO Products VALUES(NULL, '$this->type', $this->beginning, $this->ending)");
	}

	public function read_record($prodID)
	{
		$results_id = query_database("SELECT * FROM Products WHERE productID=$prodID");

		if ($row = $results_id->fetch_assoc())
		{
			$this->productID = $row["productID"];
			$this->type = $row["type"];
			$this->beginning = $row["beginning"];
			$this->ending = $row["ending"];
		}
	}	
}

?>