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
			if( ($_SESSION['type'] != 'DM') && ($_SESSION['type'] != 'customer') )
				{	
			
					header("Location: home.php");
					exit();
				}
	?>

		<section id="content" class="two-column">
			
				
					
				
				<?php 	
		
					$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
			    	$OID = mysqli_real_escape_string($conn,parse_url($url, PHP_URL_QUERY));
					
					$sql = "SELECT * FROM ordr WHERE id = '$OID'";
					$query = mysqli_query($conn,$sql);
					$order = mysqli_fetch_assoc($query);
				
					
					$sql = "SELECT P.* FROM product AS P,cart_prod AS CP WHERE P.PID = 	CP.pid AND CP.cid = '".$order['cid']."' ";
					$query = mysqli_query($conn,$sql);
					$rownum = mysqli_num_rows($query);
					
					if( $rownum > 0 )
					{
						$totalP=0;
						while( $row = mysqli_fetch_assoc($query) ){
							$sql = "SELECT S.* FROM store AS S, product AS P WHERE S.SID = P.sid AND P.PID = '".$row['PID']."'";
							$query = mysqli_query($conn,$sql);
							$store = mysqli_fetch_assoc($query);
							
							
							echo "
									<div class = 'prodbox'>
											
										<div class='prodimg'>	
											<img src='image/product".$row['PID'].".".$row['image']."' alt ='".$row['name']."'  />  
										</div>
										
									
										<div class='info'>
											<h3>".$row['name']."</h3>
											<p>".$row['price']."$</p>
											<p>".$store['name']."</p>
										</div>
									
									</div>
								";
								$totalP += $row['price'];
						}
						echo "<h4>Total Price : ".$totalP." $</h4>";
						
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