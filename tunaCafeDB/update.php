<?php
/*
 * file name: update.php
  * Purpose: update shopping cart once
 */
	session_start();

	//receive data from the cart.php
	$update = $_POST['update'];
	
	
	$temp = array();
	foreach($update as $id => $qty)
	{
		if ($qty != 0)
		$temp[$id]=$qty;
	}
	$update = array();
	$_SESSION['order']=$temp;

	header("location: myCart.php");		
?>