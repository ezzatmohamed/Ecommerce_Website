<?php
	session_start();
	
	
	if(isset($_POST['Add']))
	{
		include_once 'dbserver.inc.php';
		
		
		
		$name     = mysqli_real_escape_string($conn,$_POST['name']);
		$price   = mysqli_real_escape_string($conn,$_POST['price']);
		$cat     = mysqli_real_escape_string($conn,$_POST['cat']);
		$descrip  = mysqli_real_escape_string($conn,$_POST['descrip']) ;
		$quantity      = mysqli_real_escape_string($conn,$_POST['quantity']);
		
		
		$sql = "SELECT * FROM storeemp WHERE ID = ".$_SESSION['id'];
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($query);
		$sid = $row['sid'];
		
		
		$sql = "INSERT INTO product (name,price,descrip,CTID,items,sid) VALUES('$name','$price','$descrip','$cat','$quantity','".$sid."')";		
		$query = mysqli_query($conn,$sql);
			
		$sql1 = "SELECT * FROM product ORDER BY PID DESC LIMIT 1";
		$query1 = mysqli_query($conn,$sql1);
		$row = mysqli_fetch_assoc($query1);
		$pID = $row['PID'];

		
		/* For uplaoding Image */
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
					$sql = "UPDATE product SET image = '".$fileActualExt."' WHERE PID = ".$pID;		
					$query = mysqli_query($conn,$sql);
				
				}
				
			}
			
		}
		
		//--------------------------

		
	

	
					
	header("Location: ../addproduct.php?add=success");
	exit();	
		
	}
?>