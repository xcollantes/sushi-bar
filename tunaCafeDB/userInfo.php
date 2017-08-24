<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
      "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
   
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>User Info</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link href="sushi.css" rel="stylesheet" type="text/css" />
	</head>
<body>
	<h2 class='right'>Submit Order</h2>
	<form action="receipt.php" method="POST">
<?php
SESSION_START(); 
	$inFile = fopen('state.csv','r') or die('Fail to open the Program.');
	$states = array();
	
	while(!feof($inFile)){
		$inString = fgets ($inFile, 4096);
		$inLine = explode(',',$inString);
		$states [$inLine['0']] = trim($inLine['1']);
	}
	
	fclose($inFile);
	
//	$total=$_POST['total'];
	
	$total = $_SESSION['total'];
	$order = $_POST['order'];
	
	
		echo "<table border = 1>";
		echo "<tr><td colspan=3>Customer Shipping Address</td></tr>";
		echo "<tr><td colspan=3>Last Name:<input type='text' name='lname'> First Name:<input type='text' name='fname'></td></tr>";
		echo "<tr><td colspan=3 class='left'>Address:<input type='text' name='address'> </td></tr>";
		echo "<tr><td colspan=3 class='left'>City:<input type='text' name='city'>";
		echo "State: <select name='state'>";
		
			foreach ($states as $i){
				echo"<option value='$i'>$i</option>";
			}
			
			echo"</select>";
			
		echo " Zip:<input type='text' name='zip'></td></tr>";
		
		
		echo "<tr><td class='left' colspan=3>";
			echo"<input type='radio' name= 'payment' value='discover'> Discover";
			echo"<input type='radio' name= 'payment' value='Master'> Master";
			echo"<input type='radio' name= 'payment' value='Visa'> Visa</br>";
		echo "Card Number:<input type='text' name='cardNum'>";
		echo "</td></tr>";
		
		echo "<tr><td colspan=3 class='center'> Order Total: $$total </td></tr>";
		echo "<tr><td colspan=3 class='center'><input type='submit' value='Submit'>&nbsp<input type='reset' value='Cancel'></td></tr>";
	
	
	echo "</form>";
	echo "</table>";
?>
</body>
</html>