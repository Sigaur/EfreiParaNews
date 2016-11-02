<?php
	function printTableRow($productID, $type, $beginning, $ending)
	{
		print("<tr>
			<td>$productID</td>
			<td>$type</td>
			<td>$beginning</td>
			<td>$ending</td>
			<td><button type=\"button\">Add to cart</button></td></tr>
			");
	}


?>