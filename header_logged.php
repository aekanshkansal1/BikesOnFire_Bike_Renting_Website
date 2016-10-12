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
			   <li><div id="orders" ><a href="custorder.php" class="link">My Orders</a></div></li>
			    <li class="">
			    <a href="" class="dropdown-toggle link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="toggle"><?php if(isset($_SESSION['mail'])) echo $_SESSION['mail']; else echo 'Guest'; ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="account_set.php" class="link">Account Settings</a></li>
            <li><a href="custorder.php" class="link">My orders</a></li>
            <li><a href="logout.php" class="link">Logout</a></li>
            </ul>
        </li>
     
			</ul>
		  </div>
		</div> 
	  </div> 
	</nav>