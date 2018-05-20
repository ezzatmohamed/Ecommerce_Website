<!doctype html>
<html>

<?php
		include_once 'includes/dbserver.inc.php';
		
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="styles.css" type="text/css" />
<link rel="stylesheet" href="css/crtuser.css" type="text/css"/>
	
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>
<body>
<div id="container">

		<?php
			
			include_once 'header.php';
			
		?>

		<section id="content" class="three-column">
			
			<?php
				if( !( ($_SESSION['type'] == 'admin') || ($_SESSION['type'] == 'store empolyee') ) )
				{
					header("Location: home.php");
				}

			?>
			
			<div class="testbox">
				  <h1>Create User</h1>

					  <form action="includes/user.inc.php" method="POST">
						
			<?php
					if( ($_SESSION['type'] == 'admin') )
					{
						echo "		<hr>
									<div class='accounttype'>
										  
										  <input type='radio' value='admin' id='radioOne' name='TYPE' checked/>
										  <label for='radioOne' class='radio' chec>Admin</label>
										  
										  <input type='radio' value='DM' id='radioTwo' name='TYPE' />
										  <label for='radioTwo' class='radio'>Delivery Man</label>
									</div>
								<hr>";
					}
				?>		  
					  <label id="icon" for="name"><i class="icon-envelope "></i></label>
					  <input type="text" name="email" id="name" placeholder="Email" required/>
					 
						 <label id="icon" for="name"><i class="icon-envelope "></i></label>
					  <input type="text" name="first" id="name" placeholder="First Name" required/>
					  
					  <label id="icon" for="name"><i class="icon-user"></i></label>
					  <input type="text" name="last" id="name" placeholder="Last Name" required/>
					  
					  <label id="icon" for="name"><i class="icon-user"></i></label>
					  <input type="text" name="address" id="name" placeholder="Address" required/>
					  
					  <label id="icon" for="name"><i class="icon-user"></i></label>
					  <input type="text" name="usr" id="name" placeholder="User Name" required/>
					  
					  
					  <label id="icon" for="name"><i class="icon-shield"></i></label>
					  <input type="password" name="pwd" id="name" placeholder="Password" required/>
					
					

					  
					 <button type ="submit" name = "create" class="button" />Create</button>   
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