<?php
session_start();
ob_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">

    <div class="col-sm-9">
      <h4><small>RECENT POSTS</small></h4>

      <?php 




$test = $_SESSION['test'];
$number = $_SESSION['qno'];
  echo 'Number of Questions :<br> ';
  
  include 'dbconnect.php';

  $query = $conn->prepare("SELECT COUNT(test_id) FROM questions WHERE test_id = '$test' ");
  $query->execute();

  $query->bind_result($no_que);
  //include'navbar.php';
  
  $query->fetch();
  
    printf("%s",$no_que);
    echo '<br>';
    
    $_SESSION['testlen']  = $no_que; 

  $query->close();

    echo "Session test len :  ";
    echo $_SESSION['testlen'];



  $query = $conn->prepare("SELECT qno,question,op1,op2,op3,op4 FROM questions WHERE test_id = 'cs' AND qno =$number ");

  $query->execute();

  $query->bind_result($qno,$question,$op1,$op2,$op3,$op4);
  //include'navbar.php';
  
  $query->fetch();
  
    printf(" Q. %d",$qno);
    echo '<br>';
    printf("%s",$question);
    echo '<br>';
    printf("A . %s      ",$op1);
    printf("B . %s      ",$op2);
    echo '<br>';
    printf("C . %s      ",$op3);
    printf("D . %s      ",$op4);

    
    echo "<form action='storeAnswer.php' method='POST'>

     <input type='radio' name='option' value=1 >A <br>
   <input type='radio' name='option' value=2>B <br>
     <input type='radio' name='option' value=3>C <br>  
     <input type='radio' name='option' value=4>D<br>


    <button type='submit'>Submit</button><button type='reset'>Clear</button>

  </form>";


  $query->close();
  ?>
      
    </div>
    <div class="col-sm-3 sidenav">



      
      <br><br>
      <?php

      echo "<form action='updateQno.php' method='POST'>";

    for($i=1 ; $i <= $no_que ; $i++)
    {
      echo "<button type='submit' name='queButton' value=$i >";
      echo $i;
      echo "</button></br>"; 
    }

  echo "</form>";
  echo "<form action='submitTest.php' method='POST'>
      <button type='submit'>Submit Test</button> 
      </form>
     ";
     ?>
      
    </div>

    
  </div>
</div>

<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>
</html>
