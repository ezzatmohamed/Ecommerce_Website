<!DOCTYPE html>
<html>
<?php
		include_once 'includes/dbserver.inc.php';
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styles.css" type="text/css" />
<link rel="stylesheet" href="css/product.css"/>
<link rel="stylesheet" href="css/cart1.css"/>

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>
<body>
<div id="container">

    <?php
			include_once 'header.php';		
			if($_SESSION['type'] != 'customer')
				{	
			
					header("Location: home.php");
					exit();
				}
	?>

		<section id="content" class="two-column">
			
				
					
				
				<?php 	
					
					
					
					$sql = "SELECT P.* FROM product AS P, wishlist AS W WHERE P.PID = W.pid AND W.cid = ".$_SESSION['id']."";
					$query = mysqli_query($conn,$sql);
					$rownum = mysqli_num_rows($query);
					
					
					if( $rownum > 0 )
					{
						$totalP=0;
						while( $row = mysqli_fetch_assoc($query) ){
							echo "
									<div class = 'prodbox'>
											
										<div class='prodimg'>	
											<img src='image/product".$row['PID'].".".$row['image']."' alt ='".$row['name']."'  />  
										</div>
										
									
										<div class='info'>
											<h3>".$row['name']."</h3>
											<p>".$row['price']."$</p>
										</div>
									
									</div>
								";
						}
						

					}
					?>	
					
				
			
        </section>
        
        
    	<div class="clear"></div>
    </div>

	
    <?php
		include_once 'footer.php';
	?>
	

</body>
</html>