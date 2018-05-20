<?php

	session_start();
	if(isset($_SESSION['id']))
	{
		header("Location: ../home.php");
		exit();
	}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <div class="form" style="background-color:">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="includes/sign.inc.php" method="POST">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" name="first"  />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text" name="last"/>
            </div>
          </div>

		   <div class="field-wrap">
              <label>
                Address
              </label>
              <input type="text" name="address"  />
            </div>
		  
          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email">
          </div>
          
		  
		  
		  <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input type="text" name = "usr"/>
          </div>
		  
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password" name = "pwd"/>
          </div>
          
		  
		  
          <button type="submit" name="submit" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="includes/login.inc.php" method="post">
          
		  <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input type="text" name = "log-usr" required autocomplete="off"/>
          </div>
		  
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name = "log-pwd" required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button type ="create" name = "login" class="button button-block"/>Log In</button>
		  
          
          </form>
        </div>
        
      </div><!-- tab-content -->
	  
	  		  <a href = "../home.php">      <button style="margin-top:5%;" type ="create" name = "logGeust" class="button button-block"/>Log In as a guest</button></a>

      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>

