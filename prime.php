<?php if (isset($_REQUEST['sub'])) {
	 $n=$_REQUEST['prime'];
	$flag=0;

    for ($i=1; $i<=$n; $i++) {
          if ($n % $i == 0) {
             $flag++;
          }
      }
      if ($flag==2) {
      	echo "$n is prime number";
      }
      else {
     	 echo "$n is nor prime number";   
      }



} ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<p>Check For Given Number is prime or not?</p>

<form method="post">
Enter Number:
	<input type="text" name="prime"><br>
	<input type="submit" name="sub" value="Click">

</form>
</body>
</html>