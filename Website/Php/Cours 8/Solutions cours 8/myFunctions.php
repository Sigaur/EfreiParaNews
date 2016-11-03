<?php
	function printTableRow($productID, $description, $cost, $weight, $inventory)
	{
		print("<tr>");
		print("<form action='product_page.php' method='post'>");
		print("<input type='hidden' name='productID' value='$productID'>");
		print("<td>$description</td><td>$cost</td><td>$weight</td><td>$inventory</td>");
		print("<td style='border-style: none; text-align: left;'><input type='submit' value='Add'></td>");
		print("</form>");
		print("</tr>");

	}


?>