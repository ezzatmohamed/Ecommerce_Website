<?php
	
		include_once 'dbserver.inc.php';
	
     session_start();
	if(isset($_POST['tocart']))
	{
		
		$sql1 = "SELECT * FROM cust_cart WHERE custID = ".$_SESSION['id'];
		$query1 = mysqli_query($conn,$sql1);
		$result1 = mysqli_fetch_assoc($query1);
			
		$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
		$PID = parse_url($url, PHP_URL_QUERY);
				
		$sql2 = "SELECT * FROM product WHERE PID = ".$PID;
		$query2 = mysqli_query($conn ,$sql2);
		$result2 = mysqli_fetch_assoc($query2);
		

		$sql2 = "INSERT INTO cart_prod (pid,cid) VALUES ('".$result2['PID']."','".$result1['cartID']."' )";
		$query2 = mysqli_query($conn,$sql2);
		
		
					header("Location: ../productinfo.php?".$PID);
					exit();
	}
	else if( isset($_POST['delcart']) )
	{	


		$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
		$PID = parse_url($url, PHP_URL_QUERY);
	
				
		$sql1 = "SELECT * FROM cust_cart WHERE custID = ".$_SESSION['id'];
		$query1 = mysqli_query($conn,$sql1);
		$result1 = mysqli_fetch_assoc($query1);
		


		$sql    = "DELETE FROM cart_prod WHERE cid = ".$result1['cartID']." AND pid = ".$PID;
		$query  = mysqli_query($conn,$sql);

		header("Location: ../productinfo.php?".$PID);
		exit();
	}

?>