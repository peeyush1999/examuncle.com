 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php include'links.php' ?>

  <style>
    .row
{
  color:black !important;
}

</style>
</head>
<body>

  <div>
  <?php include'navbar.php' ?>
</div>

<?php include'header.php' ?>





<div class="container-fluid text-center"> 
<marquee scrollamount="6" loop="infinite" ><span style="color :#2F5597;font-size:1.5em;"># Welcome To ExamUncle !! Prepare for your upcoming Exams. <span style="color :red;"><?php echo str_repeat('&nbsp;', 50);?> * This protal is developed by Peeyush Sahu . </span></marquee> 
  <div class="row content">
    <div class="col-sm-2 sidenav">


      
    </div>
    <div class="col-sm-8 text-left"> 
      <br>

   <center><h1><span style="font-size:1.4em ;color:#2F5597;font-weight:400"><b> Exam Uncle's Message to Students</b></span></h1></center>

    <center><img src="assets/img/head.png" class="img-responsive" style="width:200px" alt="Image"></center>
    <p>

      <span style="font-size:1.3em ;color:black;font-weight:400">Dear Students,

 <br>

It is with great pleasure that I welcome you to our website.


 

As Owner, I am hugely impressed and commited  to the provision of an excellent all-round education for our students in our state of the art facilities.

 



 

With a long and rewarding history of achievement in education behind us, our  community continues to move forward together with confidence, pride and enthusiasm.

 

Our Motto : "The tradition of excellence is ours; the choice is yours!"

 

I hope you enjoy your visit to the website and should you wish to contact us, please find details at the contact page.
<br>
 
Uncle</span></p>


     
    </div>
    <div class="col-sm-2 sidenav" style="overflow-y:  auto;">

    <?php  



       include 'dbconnect.php';

        $query = $conn->prepare("SELECT test_id FROM questions GROUP BY test_id ; ");
        $query->execute();

        $query->bind_result($test);
        //include'navbar.php';
        echo " <span style='font-size: 32px; color: red;'><u><center>Test Available</center></u></span><br>";

        $query->store_result();
        $numtest = $query->num_rows(); 
        if ( $numtest ==0)
        {
          echo "* Sorry Currently We Have No Test For You.";
        }
        else
        {
            

          while($query->fetch())
          {
            echo  " <span style='font-size: 24px; color: #2F5597;'>".$test."</span>";
            echo '<br>';


           }
            
           
        }
      $query->close();
    ?>    

      
    </div>
  </div>
</div>
<div class="container text-center" >    
                        <h3 style="color:white !important;font-weight:bold;border:4px ;border-color:gray;">One Stop Solution For All Your Needs</h3>
                        <br>
                        <div class="row" style="color:white;font-size:1.5em;" >
                        <div class="col-sm-2" data-aos="fade-right" name-"img">
                          <img src="assets/img/maths.png" class="img-responsive" style="width:100%" alt="Image">
                          <p><b>Mathematics</b></p>
                        </div>
                        <div class="col-sm-2" data-aos="fade-left" > 
                          <img src="assets/img/physics.jpg" class="img-responsive" style="width:100%" alt="Image">
                          <p><b>Physics</b></p>    
                        </div>
                        <div class="col-sm-2" data-aos="fade-right" > 
                          <img src="assets/img/chemistry.png" class="img-responsive" style="width:100%" alt="Image">
                          <p><b>Chemistry</b></p>
                        </div>
                        <div class="col-sm-2" data-aos="fade-left" > 
                          <img src="assets/img/biology.png" class="img-responsive" style="width:100%" alt="Image">
                          <p><b>Biology</b></p>
                        </div> 
                        <div class="col-sm-2" data-aos="fade-right" > 
                          <img src="assets/img/history.jpg" class="img-responsive" style="width:100%" alt="Image">
                          <p><b>History</b></p>
                        </div>     
                        <div class="col-sm-2" data-aos="fade-left" > 
                          <img src="assets/img/aptitude.jpg" class="img-responsive" style="width:100%" alt="Image">
                          <p><b>Aptitude</b></p>
                        </div> 
                        </div>
                        <hr>
                      </div>
<?php  include'footer.php'; ?>



<script>
// Get the modal
var modal = document.getElementById('loginmodal');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
