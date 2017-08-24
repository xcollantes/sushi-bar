<?php
	SESSION_START();
	
	if (!empty($_POST['order1'])){
		$temp = $_POST['order1'];
		$_SESSION['order'] = $temp;
	}
	else{
		$_POST['order1'] = array();
		unset($_POST['order1']);
	}
?>
<!DOCTYPE html>
	<head>
		<title>My Cart</title>
		<link href="sushi.css" rel="stylesheet" type="text/css" /> 
		
		<style>
		form {
			display: inline-block;
			text-align: center;
			}
		</style>
	</head>
	
<body><h2>Shopping Cart</h2></body>
<?php		
	$subTotal = 0;
	$tax = 0;
	$total = 0;
	$taxRate = .0875;
	
	$order = $_SESSION['order']; //changes on Update
	
	//$menu = $_SESSION['menu'];
	
	echo "<form action='update.php' method='POST'>";
	echo "<table border='1' width='450' cellpadding='4'>";
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
			
		$dbRecords = mysql_query ("SELECT * FROM `product`", $dbLocalhost) or
			die ("Problem reading table Product: " .mysql_error());
			
				
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
								<td class='center'><input type='textbox' name='update[$proID]' value='$v' size='3'></td>
								<td class='center'>$" . sprintf("%1.2f", ($price * $v)) . "</td>
							</tr>";
					
							$subTotal = ($subTotal + ($price * $v));
						}
					}
					
					
				}
					
					$tax = ($subTotal * $taxRate);
					$total = ($subTotal + $tax);
					
					$subTotal = sprintf("%1.2f",$subTotal);
					$tax = sprintf("%1.2f",$tax);
					$total = sprintf("%1.2f",$total);
					echo "<tr><td  class='right' colspan='4'>
					<input class='right' type='submit' value='Update' name='submit'>
					
					</td></tr>";
					
					echo"</form>";
					
					echo "<tr><td  class='right' colspan='4'>Subtotal: $$subTotal</td></tr>";
					echo "<tr><td  class='right' colspan='4'>Tax: $$tax</td></tr>";
					echo "<tr><td  class='right' colspan='4'>Total: $$total</td></tr>";

					echo "<tr></tr>";
			echo "</table>";

		echo"</form>";
		
		$_SESSION['total'] = $total;
		$_SESSION['subTotal'] = $subTotal;
		$_SESSION['tax'] = $tax;
		$_SESSION['order'] = $order;
		
		echo"<form action='userInfo.php' method='POST'>";
		echo "<tr><td class='center' colspan='4'><input type='submit' value='Submit'></td></tr>";
		
		echo"</form>";
		echo "</table>";
		
		mysql_close($dbLocalhost);

?>