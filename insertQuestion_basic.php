<html>
<head>
	<title> My quiz 1</title>
</head>
<body>

	<form action="insertValidate.php" method="POST">
    test_id <input type="text" name="test_id" ><br>
	Q.no:<input type="text" name="question_no" ><br>		
	
	Questions : <textarea name="question"> </textarea><br>
  	A.<input type="text" name="op1" > <br>
 	B.<input type="text" name="op2" ><br>
  	C.<input type="text" name="op3" > <br>  
  	D.<input type="text" name="op4" > <br>

  	Answer :  - <input type="text" name="ans" > <br>


  	<button type="submit">Submit</button><button type="reset">Clear</button>

	</form>


</body>
</html>