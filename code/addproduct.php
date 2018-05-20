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
				if( !($_SESSION['type'] == 'store empolyee') )
				{
					header("Location: home.php");
				}

			?>
			
			<div class="testbox">
				  <h1>Add Product</h1>

					  <form action="includes/addproduct.inc.php" method="POST" enctype="multipart/form-data">
						

					  <label id="icon" for="name"><i class="icon-envelope "></i></label>
					  <input type="text" name="name" id="" placeholder="Name" required/>
					 
					 <label id="icon" for="name"><i class="icon-envelope "></i></label>
					  <input type="text" name="price" id="" placeholder="Price" required/>
					
					
					   <label id="icon2" for="name"><i class="icon-envelope "></i>Category</label>
					  <select  id="categ" name="cat">
					<?php
							$sql = "SELECT * FROM category ";
							$query = mysqli_query($conn,$sql);
							$rownum = mysqli_num_rows($query);
							if($rownum > 0)
							{
								while( $row = mysqli_fetch_assoc($query) ){
									echo"
										<option value='".$row['CID']."'>".$row['name']."</option>
										";	 	
								}
							}
						?>
					</select>
					  
					  
					  <label id="icon" for="name"><i class="icon-user"></i></label>
					  <textarea name="descrip"  rows="10" cols="50">Description</textarea>
					  
				
					  <input type="number" id="name" name="quantity" placeholder = "# of items"min="1" max="1000000">
					  
					  <input type = "file" name ="file" >
					  
					 <button type ="submit" name = "Add" class="button" />Create</button>   
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