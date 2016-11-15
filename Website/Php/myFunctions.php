<?php
	function printTableRowEvents($eventID, $eventType, $begDay, $begMonth, $begYear, $endDay, $endMonth, $endYear, $places)
	{
		print("<form action='bookIn.php' method='post'>");
		print("<input type='hidden' name='eventID' value='$eventID'>");
		print("<button type='Submit' class='btn btn-primary btn-block buttonWhite'>
					$eventType:<br>
					$begDay/$begMonth/$begYear - $endDay/$endMonth/$endYear<br>
					<br>
				</button><br>");		
		print("</form>");
	}

	function printTableRowEventsAdmin($eventID, $eventType, $begDay, $begMonth, $begYear, $endDay, $endMonth, $endYear, $places)
	{
		print("$eventID - $eventType: $begDay/$begMonth/$begYear - $endDay/$endMonth/$endYear<br>");

	}

	function printTableRowUsers($userID, $login, $password, $mail)
	{
		print("$userID: $login/$password  E-mail: $mail<br>");
	}


?>