
<?php
	require("db.php");
	if (isset($_POST['eventID']))
	{
		$tempID = $_POST['eventID'];
		query_database("DELETE FROM events WHERE eventID=$tempID");
	}
?>

<script type="text/javascript">
	window.close();
</script>