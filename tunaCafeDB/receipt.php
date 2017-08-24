<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
      "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
   
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>Reciept</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link href="sushi.css" rel="stylesheet" type="text/css" /> 
	<link href="navigation.css" rel="stylesheet" type="text/css" />
	
	</head>
<body>
		<div id='header'>
	<h1 style='text-align: center; margin-bottom:0'>Tsukushinbo Traditional Japanese Cuisine</h1>
	<br />
	
	<nav id='primary_nav_wrap'>
	<ul>
	  <li><a href='index.html'>Home</a></li>
	  <li><a href='#'>Menu</a>
		<ul>
		  <li><a href='listmenu.php'>List Menu</a></li>
		  <li><a href='sushimenu.html'>Sushi</a></li>
		  <li><a href='sashimimenu.html'>Sashimi/Nigiri</a></li>
		  <li><a href='sakimenu.html'>Sake</a></li>
		</ul>
	  </li>
	  <li><a href='https://maps.google.com/maps?q=Tsukushinbo,+515+South+Main+Street,+Seattle,+WA&hl=en&sll=47.67284,-117.41215&sspn=0.262158,0.676346&oq=t&hq=Tsukushinbo,&hnear=515+S+Main+St,+Seattle,+King,+Washington+98104&t=m&z=16'>Location</a></li>
	  <li><a href='menuGenerator.php'>Order Online</a></li>
	</ul>
	</nav>
	
	</div>
	<br>
	<br>
	<br>
	
	<h2 class='center'>Receipt</h2></br>
	<?php
	SESSION_START();
			$order = $_SESSION['order'];
			$lname=$_POST['lname'];	
			$fname=$_POST['fname'];	
			$address=$_POST['address'];
			$city=$_POST['city'];
			$state=$_POST['state'];
			$zip=$_POST['zip'];	
			$payment=$_POST['payment'];
			$cardNum=$_POST['cardNum'];
			$total = (float) $_SESSION['total'];
			$taxRate = .0875;
			$subTotal = 0.0;
			$tax = $subTotal * $taxRate;
			
			echo "<table border='1'>";
			echo "<tr><td>";
			
			echo "<table border='0'>";
			echo "<th>Thank You, $fname $lname</th>";
			echo "</table></td></tr><tr><td>";
			
			
			
			echo "<table border='1'>";
			echo "<th>Shipping address:</th>";
			echo "<tr><td>$fname $lname<br/>$address<br/>$city, $state $zip</td></tr>";

			echo "<tr><td>Payment type: $payment</tr></td>";	
			echo "</table></td></tr><tr><td>";
			
			echo "<table border='1'>";

			echo "<tr><th width='300'>Menu</th>";
			echo "<th class='right' width='50'>Price</th>";
			echo "<th class='right' width='50'>Quantity</th>";
			echo "<th width='50'>Subtotal</th></tr>";
			
		//Connect DB
		$dbLocalhost=mysql_connect("localhost", "root", "usbw") or 
		die ("Cannot connect:" .mysql_error());
		
		//Select DB
		mysql_select_db('project', $dbLocalhost) or 
		die("Cannot find database: " .mysql_error());
			
			

		//WRITE TO THE DB customers
		//Connect DB
		$sql = "
		INSERT INTO `customers` (`firstName`, `lastName`, `address`, `city`, `state`, `zip`, `paymentType`, `cardNo`)
		VALUES ('$fname', '$lname', '$address', '$city', '$state', '$zip', '$payment', '$cardNum');
		";
		
		$query = mysql_query ($sql, $dbLocalhost) or
			die ("Problem reading table Customers1: " .mysql_error());

		$currentCusID = mysql_insert_id($dbLocalhost);
		
		//WRITE TO THE DB order
		//Connect DB
		$sql = "
		INSERT INTO `order` (`orderID`, `cusID`, `total`, `tax`, `subTotal`)
		VALUES ('', '$currentCusID', '$total', '$tax', '$subTotal')
		";
		
		$query = mysql_query ($sql, $dbLocalhost) or
			die ("Problem reading table order1: " .mysql_error());	
			
		$dbRecords = mysql_query ("SELECT * FROM `product`", $dbLocalhost) or
			die ("Problem reading table Product: " .mysql_error());
			
		$currentOrderID = mysql_insert_id($dbLocalhost);
		
				while ($record =  mysql_fetch_row($dbRecords))
				{
					
					list($catID, $proID, $name, $price) = $record;
					foreach ($order as $i => $v)
					{
						if ($proID == $i)
						{
							echo "
							<tr>
								<td class='center'>" . $name . "</td>
								<td class='center'>$" . $price . "</td>
								<td class='center'>" . $v . "</td>
								<td class='center'>$" . sprintf("%1.2f",($price * $v)) . "</td>
							</tr>";
					
							$subTotalTemp = ($subTotal + ($price * $v));
							$taxTemp = ($subTotal * $taxRate);
							$totalTemp = ($subTotal + $taxTemp);
							
							
							
							
							//WRITE TO THE DB lineitem
							//Connect DB
							$sql = "
							INSERT INTO `lineitem` (`orderID`, `proID`, `quantity`, `unitPrice`)
							VALUES ('$currentCusID', '$proID', '$v', '$price')
							";
							
							$query = mysql_query ($sql, $dbLocalhost) or
								die ("Problem reading table lineitem1: " .mysql_error());	
								
						}

						$tax = ($subTotal * $taxRate);
						$total = ($subTotal + $tax);
						
						$subTotal = sprintf("%01.2f",$subTotal);
						$tax = sprintf("%01.2f",$tax);
						$total = sprintf("%01.2f",$total);
					}
				}
				
			echo "</table></td></tr><tr><td class='right'>";
			
			$subTotal = sprintf("%01.2f",$_SESSION['subTotal']);
			$total = sprintf("%01.2f",$_SESSION['total']);
			$tax = sprintf("%01.2f",$subTotal * $taxRate); 
			
			//Update order data
			/*$sql = "UPDATE `order` SET subTotal = '$subTotal', tax='$tax', total='$total'
					WHERE orderID = '$currentID'";
					
			$query = mysql_query($sql,$dbLocalhost) or
			die ("Cannot update database: ".mysql_error());*/
			
			echo "<table border='1'>";
			echo "<tr><td  class='right' colspan='4'>Subtotal: $$subTotal</td></tr>";
			echo "<tr><td  class='right' colspan='4'>Tax: $$tax</td></tr>";
			echo "<tr><td  class='right' colspan='4'>Total: $$total</td></tr>";
			echo "</table></td></tr></table><br>";
			
			echo "</table></br></br>";
		
			
			mysql_close($dbLocalhost);

			$_SESSION = array();
			SESSION_DESTROY();
	?>
	<h2 class='left'>Thank you for your Business!</h2>
</body></html>