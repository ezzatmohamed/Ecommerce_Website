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
				if( ($_SESSION['type'] == 'guest') )
				{
					header("Location: home.php");
				}


			?>
			
			<div class="testbox">
				  <h1>Change password</h1>

					  <form action="includes/chngpwd.inc.php" method="POST" >
								<?php 
										//$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
										//$check = mysqli_real_escape_string($conn,parse_url($url, PHP_URL_QUERY));
										if( isset($_GET['OLD']) )
										{	
											echo"<p> Current Password is not correct !</p> ";
										}
										
										else if (isset($_GET['chng']))
										{
											$change = $_GET['chng'];
										
											if($change == 'false')
											{
												echo "<p>Confirmed password is not correct. Try again !</p>";
												
											}
											else
											{
													echo "<p>You've changed your password successfully !</p>";
											}
										}
								?>
								 
					 <label id="icon" for="name"><i class="icon-envelope "></i></label>
					  <input type="password" name="oldpwd" id="" placeholder="Current Password" required/>
					
					 
					 <label id="icon" for="name"><i class="icon-envelope "></i></label>
					  <input type="password" name="newpwd" id="" placeholder="New Password" required/>
						
					<label id="icon" for="name"><i class="icon-envelope "></i></label>
					  <input type="password" name="confpwd" id="" placeholder="Confirm New Password" required/>
					

							<button type ="submit" name = "chngpwd" class="button" />Create</button>   
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