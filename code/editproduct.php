<!DOCTYPE html>
<html>
<?php
		include_once 'includes/dbserver.inc.php';
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
=<link rel="stylesheet" href="styles.css" type="text/css" />
<link rel="stylesheet" href="css/product.css"/>


<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>
<body>
<div id="container">

    <?php
			include_once 'header.php';
			if( !($_SESSION['type'] == 'store empolyee') )
				{
					header("Location: home.php");
					exit();
				}
	?>

		<section id="content" class="two-column">

		
<?php
	
	
	
		$sql = "SELECT * FROM storeemp WHERE ID = ".$_SESSION['id'];
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($query);
		
		$sql = "SELECT * FROM product WHERE sid = ".$row['sid'];
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
				 <a href ="editproduct2.php?'.$Pid.'">  <button class ="Cadd" > Edit Product </button></a>
				  <a href ="includes/delproduct.inc.php?'.$Pid.'">  <button class ="Cadd" > Delete Product </button></a>
				
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