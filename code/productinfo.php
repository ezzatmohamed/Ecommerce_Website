<!doctype html>
<html>

<?php
		include_once 'includes/dbserver.inc.php';
	//	session_start();
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styles.css" type="text/css" />
<link rel="stylesheet" href="css/productinfo.css"/>


	
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>
<body>
<div id="container">

		<?php
			include_once 'header.php';
		?>

		<section id="content" class="three-column">
			
			<?php
				
				$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
				$PID = mysqli_real_escape_string($conn,parse_url($url, PHP_URL_QUERY));
				
				$sql = "SELECT * FROM product WHERE PID = ".$PID;
				$query = mysqli_query($conn,$sql);
				$rownum = mysqli_num_rows($query);
				
				if( $rownum > 0 )
				{		
						 $row = mysqli_fetch_assoc($query) ;
							$Pid = $row['PID'];
							$imgext = $row['image'];
							$Pname = $row['name'];
							$price = $row['price'];
							$info = $row['descrip'];
							$item = '
						
							<div class = "productinfo">
								<div class = "infoimage">
									<img src="image/product'.$Pid.'.'.$imgext.'" alt = "'.$Pname.' " />  
								</div>
								
								' ;
							
							echo $item;
							
								echo ' <h2 class = "pname">    '.$Pname.' </h2>  ';
								
								echo '<div class = "Pprice"><p>'.$price.'$</p></div>';
								echo ' <h3>Description </h3> ';
								
								
								
								echo '<div class ="descrip" >  <p >'.$info.' </p> </div>';
									
									
									
			
								if( ($_SESSION['type'] == 'customer' ))
								{
										$sql1 = "SELECT * FROM cust_cart WHERE custID = ".$_SESSION['id'];
										$query1 = mysqli_query($conn,$sql1);
										$result1 = mysqli_fetch_assoc($query1);
											
										$sql2 = "SELECT * FROM cart_prod WHERE pid = ".$PID." AND cid = ".$result1['cartID'];
										$query2 = mysqli_query($conn,$sql2);
										
										$rows = mysqli_fetch_assoc($query2);
										
										
									
										if( $rows == 0 )
										{
											
												$ToCart = "  <form action='includes/tocart.inc.php?".$Pid."'  method = 'POST'>
																
																<input type='submit' value='Add to Cart' class='Toadd' name ='tocart'>
															
															</form>
													 ";
												
										}

										else
										{
												
												$ToCart = "  <form action='includes/tocart.inc.php?".$Pid."' method = 'POST'>
																
																<input type='submit' value='Remove from Cart' class='Toadd' name ='delcart'>
															
															</form>
													 ";
													
										}
								}
								else
								{
									
									$ToCart = "  <form action='loginsystem/includes/logout.inc.php' method = 'POST'>
																
																<input type='submit' value='Log In as a customer to buy it ' class='Toadd' name ='delcart'>
															
															</form>";
									
								}
								echo $ToCart;

								echo "<a href ='includes/wish.inc.php?".$Pid."'>  <button class ='Cadd' > Add to wishlist </button></a>";
							echo '</div> ';
							
							
				}
				
			
				
				
			?>
		
        </section>
			
			
				
       
    	<div class="clear"></div>
    </div>
   
</div>
<?php
include_once 'footer.php';
?>
</body>
</html>