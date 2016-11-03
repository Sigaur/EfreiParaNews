<script type="text/javascript">
setTimeout("window.close()", 500);
</script>

<?php
	require("db.php");
	query_database("DROP TABLE Events");
	query_database("CREATE TABLE Events(productID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
										  eventType VARCHAR(50), begDay INT, begMonth INT, begYear INT,
										  endDay INT, endMonth INT, endYear INT, places INT NOT NULL)");

	query_database("INSERT INTO Events VALUES(NULL, 'Training Session', 4, 11, 2016, 5, 11, 2016, 70)");
	query_database("INSERT INTO Events VALUES(NULL, 'Canopy Flying Session', 11, 11, 2016, 12, 11, 2016, 50)");
	query_database("INSERT INTO Events VALUES(NULL, 'B Certificate Session', 18, 11, 2016, 19, 19, 2016, 30)");
?>