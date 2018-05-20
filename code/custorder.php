<!DOCTYPE html>
<html>
<?php
		include_once 'includes/dbserver.inc.php';
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styles.css" type="text/css" />
<link rel="stylesheet" href="css/product.css"/>
<link rel="stylesheet" href="css/showorders.css"/>

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
			
				
		<table>
		<tr>
		<th></th>
		<th>Deliver Date</th>
		<th>Address</th>
	
		<th>Total Price</th>
		<th>Details</th>
		<th></th>
		</tr>
		<?php
			
			$sql = "SELECT * FROM ordr WHERE custID = '".$_SESSION['id']."'";
			$query = mysqli_query($conn,$sql);
			$count = 1;
			while( $row = mysqli_fetch_assoc($query) )
			{	
			
				echo "
					
					<th>$count</th>
					<td>".$row['d_date']."</td>
					<td>".$row['d_address']."</td>
					
					<td>".$row['total_price']."</td>
					<td><a href='ordDetail.php?".$row['id']."'>See Details</a></td>
					
					<td><a href='includes/cancel.inc.php?".$row['id']."'>Cancel</a></td>
					</tr> 
					";
					$count +=1;
			}	
		?>
	</table>
			
        </section>
        
    	<div class="clear"></div>
    </div>

	
    <?php
		include_once 'footer.php';
	?>
	

</body>
</html>