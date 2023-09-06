<?php

	require("db_connect.php");
	        
	$id = $_POST["id"];

	$result = mysqli_query($link,"SELECT * FROM cart WHERE ip = '{$_SERVER['REMOTE_ADDR']}' AND cart_id = '".$id."'");
	if (mysqli_num_rows($result) > 0)
	{
	$row = mysqli_fetch_array($result);    
	$new_count = $row["count"] + 1;
	$update = mysqli_query ($link,"UPDATE cart SET count='$new_count' WHERE ip = '{$_SERVER['REMOTE_ADDR']}' AND cart_id ='".$id."'");   
	}
	else
	{
	    $result = mysqli_query($link,"SELECT * FROM products WHERE id = '".$id."'");
	    $row = mysqli_fetch_array($result);
	    
	    		mysqli_query($link,"INSERT INTO cart(cart_id,price,count,ip) VALUES (
	    			'".$row['id']."',
	    			'".$row['price']."',
	    			1,
	    			'".$_SERVER['REMOTE_ADDR']."')");
	}


?>