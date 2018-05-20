<!doctype html>
<html>

<?php
		include_once 'includes/dbserver.inc.php';
		
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styles.css" type="text/css" />
<link rel="stylesheet" href="css/product.css" type="text/css" />
	
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>
<body>
<div id="container">

		<?php
			include_once 'header.php';
		?>

		<section id="content" class="three-column">

			<?php
				if(isset($_POST['search']))
				{
					
					$searched = $_POST['search'];
					
					$sql = ("SELECT * FROM product WHERE name LIKE '%$searched%'") or die("couldn't search !");
					$query = mysqli_query($conn,$sql);
					$rows = mysqli_num_rows($query);
					
					if($rows == 0 )
					{
						echo "Couldn't be found !";
					}
					else{
						
						while( $row = mysqli_fetch_assoc($query) )
						{
					
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