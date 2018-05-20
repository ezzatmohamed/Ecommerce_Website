<?php
	session_start();
	
	
	
		include_once 'dbserver.inc.php';
		
		
		
			$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
			$OID = mysqli_real_escape_string($conn,parse_url($url, PHP_URL_QUERY));
					
			echo $OID;
			
			$sql2 = "DELETE FROM ordr WHERE id = '$OID'";
			$query2 = mysqli_query($conn,$sql2);
			
						
		//--------------------------------------------------
		
		
		
					
	header("Location: ../custorder.php?success");
	exit();	

?>