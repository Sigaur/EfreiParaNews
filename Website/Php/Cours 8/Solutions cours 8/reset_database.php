<?php

require("db.php");

query_database("DROP TABLE Products");
query_database("CREATE TABLE Products(productID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
									  productDesc VARCHAR(50), cost INT, weight INT, inventory INT)");

query_database("INSERT INTO Products VALUES(NULL, 'Hammer', 2, 5, 125)");
query_database("INSERT INTO Products VALUES(NULL, 'Screw Driver', 3, 15, 144)");
query_database("INSERT INTO Products VALUES(NULL, 'Chainsaw', 99, 10, 25)");
?>
