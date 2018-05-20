<?php
	session_start();
	
	
	
		include_once 'dbserver.inc.php';
		
		
				$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
			    $PID = mysqli_real_escape_string($conn,parse_url($url, PHP_URL_QUERY));
		
				$sql = "DELETE FROM cart_prod WHERE pid = '$PID'";
				$query= mysqli_query($conn,$sql);
				
				
				
				$sql = "DELETE FROM product WHERE PID = '$PID'";
				$query= mysqli_query($conn,$sql);
				
				
					
	header("Location: ../editproduct.php?success");
	exit();	
		
	
?>