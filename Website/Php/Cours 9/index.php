<!DOCTYPE html>
<html>
<head>
	<title>Send Emails</title>
</head>
<body>

<?php
	require_once "mail.php";

	include "header.php";

	echo '<br><br><br><br><br>';

	if (isset($_POST['email']))
	{

		$success = send_email($_POST['email'], "test subject", "test body");

		if ($success)
		{
			echo 'An email has been sent! Check your emails to see it!';
		}
		else
		{
			echo 'There was a problem sending the email...';		
		}
	}
	else
	{
		echo '<form method="post" action="'. $_SERVER['PHP_SELF'].'">';
		echo '<label for="email">Enter an email address: </label><input type="text" name="email" id="email"><input type="submit">';
		echo '</form>';

	}

?>


</body>
</html>