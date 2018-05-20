<?php
	session_start();
	
	
	if(isset($_POST['edit']))
	{
		include_once 'dbserver.inc.php';
		
		
		
		$name     = mysqli_real_escape_string($conn,$_POST['name']);
		$price   = mysqli_real_escape_string($conn,$_POST['price']);
		$cat     = mysqli_real_escape_string($conn,$_POST['cat']);
		$descrip  = mysqli_real_escape_string($conn,$_POST['descrip']) ;
		$quantity      = mysqli_real_escape_string($conn,$_POST['quantity']);
		
		$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
		$PID = mysqli_real_escape_string($conn,parse_url($url, PHP_URL_QUERY));
		
		echo $PID;
		
		$sql = "UPDATE product SET name = '$name', price = '$price', descrip ='$descrip', CTID ='$cat', items = '$quantity' WHERE PID = '$PID'";		
		$query = mysqli_query($conn,$sql);
			
		
		/* For uplaoding an Image */
		$file = $_FILES['file'];
		$filename = $_FILES['file']['name'];
		$filetmpname = $_FILES['file']['tmp_name'];
		$filesize = $_FILES['file']['size'];
		$fileerror = $_FILES['file']['error'];
		$filetype = $_FILES['file']['type'];
		
		$fileext = explode('.',$filename);
		$fileActualExt = strtolower(end($fileext));
		$allowed = array('jpg','jpeg','png');
		
		if(in_array($fileActualExt , $allowed ))
		{
			
			if($fileerror === 0){
				if( $filesize < 500000 ){
					$filenamenew = 'product'.$pID.'.'.$fileActualExt;
					$fileDes = '../../image/'.$filenamenew;
					move_uploaded_file($filetmpname,$fileDes);
					$sql = "UPDATE product SET image = '".$fileActualExt."' WHERE PID = ".$PID;		
					$query = mysqli_query($conn,$sql);
				
				}
				
			}
			
		}
		
		//--------------------------

		
	

	
					
	header("Location: ../editproduct.php?add=success");
	exit();	
		
	}
?>