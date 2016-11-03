<?php
	function printTableRow($productID, $eventType, $begDay, $begMonth, $begYear, $endDay, $endMonth, $endYear, $places)
	{
		print("<tr>");
		print("<form action='product_page.php' method='post'>");
		print("<input type='hidden' name='productID' value='$productID'>");
		print("<td>$eventType</td><td>$begDay/$begMonth/$begYear</td><td>$endDay/$endMonth/$endYear</td><td>$places</td>");
		print("<td style='border-style: none; text-align: left;'><input type='submit' value='Add'></td>");
		print("</form>");
		print("</tr>");

	}


?>