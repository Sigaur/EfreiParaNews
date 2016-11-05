<?php
require_once("db.php");

	//////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////							TO BE SECURED AND ENCRYPTED								//////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////

class user
{
	var $userID;
	var $login;
	var $password;
	var $mail;

	public function __construct()
	{
		$this->login = null;
		$this->password = null;
		$this->mail = null;
	}

	public function constructWithParameters($login, $password, $mail)
	{
		$instance = new self();
		
		$instance->login = $login;
		$instance->password = $password;
		$instance->mail = $mail;
		
		return $instance;
	}

	public function __toString()
	{
		return "User $this->login is using $this->password as a password. E-mail : $mail";
	}

	public function create_table()
	{
		query_database("DROP TABLE Users");
		query_database("CREATE TABLE Users(userID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
											  login VARCHAR(50), password VARCHAR(50), mail VARCHAR(50))");

		query_database("INSERT INTO Users VALUES(NULL, 'admin', 'admin', 'fakemail@fake.com')");
	}

	public function insert_record()
	{
		query_database("INSERT INTO Users VALUES(NULL, '$this->login', '$this->password', '$this->mail')");
	}

	public function read_record($userID)
	{
		$results_id = query_database("SELECT * FROM Users WHERE userID=$userID");

		if ($row = $results_id->fetch_assoc())
		{
			$this->userID = $row["userID"];
			$this->login = $row["login"];
			$this->password = $row["password"];
			$this->password = $row["mail"];
		}
	}
}

?>