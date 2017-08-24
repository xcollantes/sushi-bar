<!DOCTYPE html>
	<head>
		<!-- 
		 Section: BMIS342-01 9:25am
		 //list($ID, $name, $price) = $record;
				$appetizers[$ID] = array('name' => $name, 'price' => $price);
		-->
		
		<title>List Menu</title>
		<link href="sushi.css" rel="stylesheet" type="text/css" /> 
		<link href="navigation.css" rel="stylesheet" type="text/css" />
		<link href="http://www.w3schools.com/lib/w3.css" rel="stylesheet">
		
	<style>
		table {
			display: inline;
			padding: 10px;
		}
		
		
		
	</style>
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
		
		<?php
			//Connect DB
			$dbLocalhost=mysql_connect("localhost", "root", "usbw") or 
			die ("Cannot connect:" .mysql_error());
			
			//Select DB
			mysql_select_db('project', $dbLocalhost) or 
			die("Cannot find database: " .mysql_error());
			
			echo "<h1>Sushi Choices</h1>";
			echo "<br />";
			echo "<table style='display:inline;'>";
				
			//GET DB appetizers
			$dbRecords = mysql_query ("SELECT * FROM `product` WHERE `catID` = 1", $dbLocalhost) or
			die ("Problem reading table Product: " .mysql_error());
			
			echo "<table>";
			echo "<th colspan ='2'>Appetizers</th>";
			
			echo "<td>";
				while ($record =  mysql_fetch_row($dbRecords))
				{
					list($catID, $proID, $name, $price) = $record;
					
					echo "<tr>";
						echo "<td>$name</td>";
						echo "<td>$$price</td>";
					echo "</tr>";
				}

			echo "</table>";
			
			//GET DB Nigiri
			$dbRecords = mysql_query ("SELECT * FROM `product` WHERE `catID` = 5", $dbLocalhost) or
			die ("Problem reading table Product: " .mysql_error());
			
			echo "<table>";
			echo "<th colspan ='2'>Nigiri</th>";
			echo "<td>";
			
				while ($record =  mysql_fetch_row($dbRecords))
				{
					list($catID, $proID, $name, $price) = $record;
					
					echo "<tr>";
						echo "<td>$name</td>";
						echo "<td>$$price</td>";
					echo "</tr>";
				}
			echo "</td>";
			echo "</table>";
			
			//GET DB Sake
			$dbRecords = mysql_query ("SELECT * FROM `product` WHERE `catID` = 3", $dbLocalhost) or
			die ("Problem reading table Product: " .mysql_error());
			
			echo "<table>";
			echo "<th colspan ='2'>Sake</th>";


			
				while ($record =  mysql_fetch_row($dbRecords))
				{
					list($catID, $proID, $name, $price) = $record;
					
					echo "<tr>";
						echo "<td>$name</td>";
						echo "<td>$$price</td>";
					echo "</tr>";
				}

			echo "</table>";
			
			//GET DB Sushi
			$dbRecords = mysql_query ("SELECT * FROM `product` WHERE `catID` = 2", $dbLocalhost) or
			die ("Problem reading table Product: " .mysql_error());
			
			echo "<table>";
			echo "<th colspan ='2'>Sushi</th>";

			
				while ($record =  mysql_fetch_row($dbRecords))
				{
					list($catID, $proID, $name, $price) = $record;
					
					echo "<tr>";
						echo "<td>$name</td>";
						echo "<td>$$price</td>";
					echo "</tr>";
				}
			echo "</table>";
			
			//GET DB jbeer
			$dbRecords = mysql_query ("SELECT * FROM `product` WHERE `catID` = 4", $dbLocalhost) or
			die ("Problem reading table Product: " .mysql_error());
			
			echo "<table>";
			echo "<th colspan ='2'>Beer</th>";

			
				while ($record =  mysql_fetch_row($dbRecords))
				{
					list($catID, $proID, $name, $price) = $record;
					
					echo "<tr>";
						echo "<td>$name</td>";
						echo "<td>$$price</td>";
					echo "</tr>";
				}
				
			//GET DB Sashimi
			$dbRecords = mysql_query ("SELECT * FROM `product` WHERE `catID` = 6", $dbLocalhost) or
			die ("Problem reading table Product: " .mysql_error());
			
			echo "<table>";
			echo "<th colspan ='2'>Sashimi</th>";

			
				while ($record =  mysql_fetch_row($dbRecords))
				{
					list($catID, $proID, $name, $price) = $record;
					
					echo "<tr>";
						echo "<td>$name</td>";
						echo "<td>$$price</td>";
					echo "</tr>";
				}
				
			echo "</table>";


			echo "</tr>";


				
			echo "</table>"; //Close big table
			
			
			echo "<br>
			<br>
			<br>";
			
			mysql_close($dbLocalhost);
		?>
		
		</form>
	</body>
</html>