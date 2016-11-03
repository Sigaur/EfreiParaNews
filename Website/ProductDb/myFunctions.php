<?php
	function printTableRow($productID, $eventType, $begDay, $begMonth, $begYear, $endDay, $endMonth, $endYear, $places)
	{
		print("<input type='hidden' name='productID' value='$productID'>");
		print("<button type=\"button\" class=\"btn btn-primary btn-block buttonWhite\">
					$eventType:<br>
					$begDay/$begMonth/$begYear - $endDay/$endMonth/$endYear<br>
					<br>
				</button><br>");
		//print("<td style='border-style: none; text-align: left;'><input type='submit' value='Add'></td>");

	}


?>