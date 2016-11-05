<?php
	function printTableRowEvents($eventID, $eventType, $begDay, $begMonth, $begYear, $endDay, $endMonth, $endYear, $places)
	{
		print("<input type='hidden' name='eventID' value='$eventID'>");
		print("<button type=\"button\" class=\"btn btn-primary btn-block buttonWhite\">
					$eventType:<br>
					$begDay/$begMonth/$begYear - $endDay/$endMonth/$endYear<br>
					<br>
				</button><br>");
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