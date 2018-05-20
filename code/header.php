<?php 
	
	session_start();
	if(!isset($_SESSION['id']))
	{
		$_SESSION['type'] = 'guest';
	}

?>



<header>
<title>Tech-Store</title>
	<div class="width">
    		<h1><a href="#">Tech-Store</a></h1>
       	</div>
 </header>

    <nav>
	<div class="width">
    		<ul>
        		<li class="start selected"><a href="home.php">Home</a></li>
        	    <li class=""><a href="products.php">Products</a></li>
			<?php
				

				
				if($_SESSION['type'] == 'admin')
				{	
			
					echo "

					<li><a href='createuser.php'>Create User</a></li>
					<li><a href='addstore.php'>Add Store</a></li>

					";
				}
				else if($_SESSION['type'] == 'store empolyee')
				{	
					echo "
					<li><a href='createuser.php'>Create an store empolyee</a></li>
					<li><a href='addproduct.php'>Add product</a></li>
					<li><a href='editproduct.php'>Edit product</a></li>
					";
				}
				else if($_SESSION['type'] == 'customer')
				{	
					echo "
					<li><a href='cart.php'>Cart</a></li>
					<li><a href='wishlist.php'>Wishlist</a></li>
					<li><a href='custorder.php'>Orders</a></li>
					";
				}
				else if($_SESSION['type'] == 'DM')
				{	
					echo "
					<li><a href='showorders.php'>Orders</a></li>
					";
				}
				if( !($_SESSION['type'] == 'guest') )
				{	
			
				echo "<li><a href= 'chngpwd.php'>Change Password  </a></li>
				<li><a href='loginsystem/includes/logout.inc.php'>Logout</a></li>";
				}
				else{
						echo"<li><a href='loginsystem/signup.php'>LogIn</a></li>";
				}
			?>
        	</ul>
	</div>
    </nav>

    <div id="body" class="width">

		
   <aside class="sidebar small-sidebar left-sidebar">
	
	
	<?php
            
				
		$categories = '<ul>	
               <li>
                    <h4>Categories</h4>
                    <ul>
						';	
			
		$sql = 'SELECT * FROM category';
		$query = mysqli_query($conn,$sql);
		$catnum = mysqli_num_rows($query);
		
		
				while ( $row = mysqli_fetch_assoc($query) )
				{
						$categories .=	'<li><a href="products.php?'.$row['CID'].' ">'.$row['name'].'</a></li>';
				}
				$categories .= '</ul></li>';
				
				
				
				echo 	 $categories;
				
	?>
                
                <li class="bg">
                    <h4>About us</h4>
                    <ul>
                        <li class="text">
                        	<p style="margin: 0;">It’s a website that allows People to buy electronics and technology devices (Laptops, Mobile phones, TVs, …. etc.).  
 Stores can add products they want to sell. We connect people and products, give people access to everything they need and want.
 We deliver their products to Customers.</p>
                        </li>
                    </ul>
                </li>
                
                <li>
                	<h4>Search site</h4>
                    <ul>
                    	<li class="text">
                            <form method="POST" class="searchform" action="home.php" >
                                <p>
                                    <input type="text" size="32" value="" name="search" class="s" />
									<input type ="submit" value="Search"/>
                                </p>
                            </form>	
						</li>
					</ul>
                </li>
                
                <li>
                    <h4>Helpful Links</h4>
                    <ul>
                        <li><a href="http://www.themeforest.net/?ref=spykawg" title="premium templates">Premium HTML web templates from $10</a></li>
                        <li><a href="http://www.dreamhost.com/r.cgi?259541" title="web hosting">Cheap web hosting from Dreamhost</a></li>
                        <li><a href="http://tuxthemes.com" title="Tux Themes">Premium WordPress themes</a></li>
                    </ul>
                </li>
                
            </ul>
		
        </aside>