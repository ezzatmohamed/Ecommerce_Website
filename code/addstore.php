<!doctype html>
<html>

<?php
		include_once 'includes/dbserver.inc.php';
		
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styles.css" type="text/css" />
<link rel="stylesheet" href="css/addstore.css" type="text/css"/>
	
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>
<body>
<div id="container">

		<?php
			
			include_once 'header.php';
			
		?>

		<section id="content" class="three-column">
			
			<?php
				if( !($_SESSION['type'] == 'admin') )
				{
					header("Location: home.php");
				}

			?>
			
			<div class="testbox">
				  <h1>Add Store	</h1>

					  <form action="includes/store.inc.php" method="POST">
						 
						  
					  <label id="icon" for="name"><i class="icon-envelope "></i></label>
					  <input type="text" name="email1" id="name" placeholder="Email 1 (required)" required/>
					 
					  <label id="icon" for="name"><i class="icon-user"></i></label>
					  <input type="text" name="email2" id="name" placeholder="Email 2 ( optional )" />
					 
				
					<label id="icon" for="name"><i class="icon-user"></i></label>
					  <input type="text" name="location1" id="name" placeholder="Location 1 ( required )" required/>
					  
					 
					  <label id="icon" for="name"><i class="icon-user"></i></label>
					  <input type="text" name="location2" id="name" placeholder="Location 2 ( optional )" />
					   
					  
					  
					  <label id="icon" for="name"><i class="icon-user"></i></label>
					  <input type="text" name="location3" id="name" placeholder="Location 3 ( optional )" />
					  
					   <label id="icon" for="name"><i class="icon-envelope "></i></label>
					  <input type="text" name="sname" id="name" placeholder="Store Name" required/>
					  
					  
					  <label id="icon" for="name"><i class="icon-user"></i></label>
					  <input type="text" name="phone1" id="name" placeholder="phone number 1 ( required )" required/>
					  
					  
					  <label id="icon" for="name"><i class="icon-shield"></i></label>
					  <input type="text" name="phone2" id="name" placeholder="phone number 2 ( optional )" />
					
					
					<h1>First Store empolyee	</h1>
					
					
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
					
					
					
					  <div class="gender">
						<input type="radio" value="None" id="male" name="gender" checked/>
						<label for="male" class="radio" chec>Male</label>
						<input type="radio" value="None" id="female" name="gender" />
						<label for="female" class="radio">Female</label>
					   </div> 
					  
					
					  
					 <button type ="submit" name = "newstore" class="button" />Create</button>   
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