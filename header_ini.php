    <nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
          <div class="header" style="padding-top:2%;">
		    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigator">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
<!--Update-->
<a class="navbar-brand" href="#" style="color:#fff;font-size:3em;">BikesOnFire</a>
                <!-- <img src="img/comlogo.jpg" alt="company logo"style="width:25%;height:auto;" >   -->
 </div>
		  <div class="collapse navbar-collapse" id="navigator">
		    <ul class="nav navbar-nav">
                          <li><a href="index.php" class="link">Home</a></li>
			  <li><a href="bikelist.php" class="link">Rent</a></li>
			  <li><a href="about.php" class="link">About Us</a></li>
			  <li><a href="contact.php" class="link">Contact Us</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			  <li><a href="register.php" class="link"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>
			  <li><a href="" class="link overlayLink1"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
		  </div>
	  </div>
          </div>
	</nav>
  
	<!--log in box-->
	
	<div class="overlay" style="display: none;">
    <div class="login-wrapper">
        <div class="login-content" id="loginTarget">
            <a class="close">X</a>
            <h3>Sign in</h3>
            <form method="post" action="login.php" class="hform">
                <label for="username">
                    Username:
                    <input type="text" name="username" id="username" required />
                </label>
                <label for="password">
                    Password:
                    <input type="password" name="password" id="password" required />
                </label>
                <button type="submit" name="sblogin">Sign in</button>
            </form>
        </div>
    </div>
</div> 
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster  
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
