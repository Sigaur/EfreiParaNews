<?php
require_once("db.php");

class product
{
	var $productID;
	var $description;
	var $cost;
	var $weight;
	var $inventory;

	public function __construct()
	{
		$this->productID = null;
		$this->description = null;
		$this->cost = null;
		$this->weight = null;
		$this->inventory = null;
	}

	public function constructWithParameters($description, $cost, $weight, $inventory)
	{
		$instance = new self();
		
		$instance->cost = $cost;
		$instance->description = $description;
		$instance->weight = $weight;
		$instance->inventory = $inventory;

		return $instance;
	}

	public function __toString()
	{
		return "$this->productID - $this->description  weights $this->weight kilos, $this->inventory unit(s) in inventory";
	}

	public function create_table()
	{
		query_database("CREATE TABLE Products(productID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
											  productDesc VARCHAR(50), cost INT, weight INT, inventory INT)");
	}

	public function insert_record()
	{
		query_database("INSERT INTO Products VALUES(NULL, '$this->description', $this->cost, $this->weight, $this->inventory)");
	}

	public function read_record($prodID)
	{
		$results_id = query_database("SELECT * FROM Products WHERE productID=$prodID");

		if ($row = $results_id->fetch_assoc())
		{
			$this->productID = $row["productID"];
			$this->cost = $row["cost"];
			$this->description = $row["productDesc"];
			$this->weight = $row["weight"];
			$this->inventory = $row["inventory"];
		}
	}	
}

?>