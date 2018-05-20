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
					exit();
				}
				$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
				$PID = mysqli_real_escape_string($conn,parse_url($url, PHP_URL_QUERY));
				
				$sql = "SELECT * FROM product WHERE PID = ".$PID;
				$query = mysqli_query($conn,$sql);
				$product  = mysqli_fetch_assoc($query);
			
			?>
			
			
			
			<div class="testbox">
				  <h1>Add Product</h1>
<?php
				echo " <form action='includes/editproduct.inc.php?".$PID."' method='POST' enctype='multipart/form-data'>";
						

				echo	"  <label id='icon' for='name'><i class='icon-envelope '></i></label>
					  <input type='text' name='name' value ='".$product['name']."' id='' placeholder='Name' required/>
					 
					 <label id='icon' for='name'><i class='icon-envelope '></i></label>
					  <input type='text' name='price' value ='".$product['price']."' id='' placeholder='Price' required/>
					
					
					   <label id='icon2' for='name'><i class='icon-envelope '></i>Category</label>
					  <select  id='categ' name='cat'> ";
					  
					  ?>
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
					  <?php
					  echo "
					  <label id='icon' for='name'><i class='icon-user'></i></label>
					  <textarea name='descrip' value='".$product['descrip']."'  rows='10' cols='50'>Description</textarea>
					  
				
					  <input type='number' id='name' value='".$product['items']."' name='quantity' placeholder = '# of items'min='1' max='1000000'>
					  
					  <input type = 'file'  name ='file' >
					  
					 <button type ='submit' name = 'edit' class='button' />Update</button>
					<a href='editproduct.php'>  <button type ='button' name = 'edit' class='button' />Cancel</button></a>
					 "
						?>					 
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