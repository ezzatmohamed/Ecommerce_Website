<!DOCTYPE html>
<html>
<?php
		include_once 'includes/dbserver.inc.php';
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styles.css" type="text/css" />
<link rel="stylesheet" href="css/product.css"/>


<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>
<body>
<div id="container">

    <?php
			include_once 'header.php';
	?>

		<section id="content" class="two-column">

		
<?php
	
	$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
	$CID = mysqli_real_escape_string($conn,parse_url($url, PHP_URL_QUERY));
	
	
	if( $CID != NULL )
 	{		

		$sql = "SELECT * FROM product WHERE CTID = ".$CID;
		$query = mysqli_query($conn,$sql);
		$rownum = mysqli_num_rows($query);
		if($rownum > 0)
		{
			while( $row = mysqli_fetch_assoc($query) ){
				$Pid = $row['PID'];
				$imgext = $row['image'];
				$Pname = $row['name'];
				$price = $row['price'];
				$item = '<div class="item">
				
					<div class = "img-product">
						<img src="image/product'.$Pid.'.'.$imgext.'" alt = "'.$Pname.'" />  
					</div>' ;
				$item .= '<span class = "Pname">'.$Pname.'</span>';
				$item .=  '
						<span>'.$price.'$</span>';
				$item .= '
				 <a href ="productinfo.php?'.$Pid.'">  <button class ="Cadd" > More details </button></a>
				
				 </div>';
			
				echo $item;
			}
		}
	}
	else
	{
		$sql = "SELECT * FROM product ";
		$query = mysqli_query($conn,$sql);
		while( $row = mysqli_fetch_assoc($query) ){
				$Pid = $row['PID'];
				$imgext = $row['image'];
				$Pname = $row['name'];
				$price = $row['price'];
				$item = '<div class="item">
				
					<div class = "img-product">
						<img src="image/product'.$Pid.'.'.$imgext.'" alt = "'.$Pname.'" />  
					</div>' ;
				$item .= '<span class = "Pname">'.$Pname.'</span>';
				$item .=  '
						<span>'.$price.'$</span>';
				$item .= '
				 <a href ="productinfo.php?'.$Pid.'">  <button class ="Cadd" > More details </button></a>
				
				</div>';
			
				echo $item;
			}
	}
		    

?>    
      		
        </section>
        
        
    	<div class="clear"></div>
    </div>

	
    <?php
		include_once 'footer.php';
	?>
</div>
</body>
</html>