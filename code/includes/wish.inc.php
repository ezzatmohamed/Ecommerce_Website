<?php
	session_start();
	
	
	
		include_once 'dbserver.inc.php';
		
		
		
			$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
			$PID = mysqli_real_escape_string($conn,parse_url($url, PHP_URL_QUERY));
					
		echo $PID;
			
			$sql2 = "INSERT INTO wishlist (cid,pid) VALUES('".$_SESSION['id']."','$PID')";
			$query2 = mysqli_query($conn,$sql2);
			
						
		//--------------------------------------------------
		
		
		
					
	header("Location: ../wishlist.php?success");
	exit();	

?>