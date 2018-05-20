<!doctype html>
<html>

<?php
		include_once 'includes/dbserver.inc.php';
		
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styles.css" type="text/css" />
<link rel="stylesheet" href="css/crtuser1.css" type="text/css"/>
	
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>
<body>
<div id="container">

		<?php
			
			include_once 'header.php';
			
		?>

		<section id="content" class="three-column">
			
			<?php
				if( !($_SESSION['type'] == 'customer') )
				{
					header("Location: home.php");
				}

			?>
			
			<div class="testbox">
				  <h1>Order your Cart</h1>

					  <form action="includes/order.inc.php" method="POST" enctype="multipart/form-data">
						

			
					 <label id="icon" for="name"><i class="icon-envelope "></i></label>
					  <input type="text" name="d_address" id="" placeholder="Deliver Full address" required/>
					
				
					  <input type="text" id="name" name="phone" placeholder = "Mobile Phone" required/>
					  
					
					 <button type ="submit" name = "order" class="button" />Order</button>   
					  </form>
				</div>
						
        </section>
        
       
    	<div class="clear"></div>
    </div>
   
</div>
<?php
include_once 'footer.php';
?>
</body>
</html>	