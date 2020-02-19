<?php @session_start();

if(isset($_SESSION['login']) AND $_SESSION['login']==True )
{
	$uname = $_SESSION['user'];
	$_SESSION['btn']=1;
}
else
{
	$_SESSION['btn']=0;
}



?>
<?php include'links.php'; ?>

<nav class="navbar navbar-default navbar-fixed-top" >
  <div class="container-fluid" style="width:100%;">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <!--<a class="navbar-brand" href="#">Logo</a>-->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar" style="margin:auto;">
      <ul class="nav navbar-nav">
	    <?php 
		if(isset($_SESSION['login']) AND $_SESSION['login']==True  )
		{
			echo "<li><a href='udashboard.php'>". $uname."'"."s Dashboard</a></li>";
		}
		
		?>
        <li><a href="home.php">Home</a></li>
        <li><a href="howitwork.php">How It Works</a></li>
        <li><a href="faq.php">FAQ</a></li>
        <li><a href="contactus.php">Contact Us</a></li>
		
      </ul>
      
      <?php 
	    
	    if( $_SESSION['btn'] == 0 )
	    {

	    ?>
	    	<ul class='nav navbar-nav navbar-right'>
        <li>
			<a href='#' data-toggle='modal' data-target='#login-modal'><span class='glyphicon glyphicon-log-in'></span> Login</a>
			<?php include'loginform.php'; ?>
		</li>
		
		<li>
		
		<a href='#' data-toggle='modal' data-target='#modal-register-user'><span class='glyphicon glyphicon-log-in'></span> SignUp</a>
		
			<?php include'signupform.php'; ?>
		
		</li>
      </ul>

	   
	    <?php 

		}
		else
		{
			echo "	<ul class='nav navbar-nav navbar-right'>
		        <li>
					<a href='logout.php'><span class='glyphicon glyphicon-log-in'></span> LogOut</a>
					
				</li>
				
		      </ul>

		      ";
		}


      ?>
    </div>
  </div>
</nav>


