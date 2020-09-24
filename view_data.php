<!DOCTYPE html>
<html>
<head>
	<title>Your Portfolio</title>
	<link rel="stylesheet" href="view_data.css">
</head>
<body id="view">

	
	<?php
	session_start();
	// $username=_SESSION["username"];
	$con=mysqli_connect("localhost","root","","ResumeBuilder");
	if (!$con) 
 	{
 		die("database not connected");
 	}
 	else{
 		$sql="select *from login where username='$_SESSION[username]';";

 		$result=mysqli_query($con,$sql); 		
 		if(mysqli_num_rows($result))
 		{
 			echo "<br><br><br>";
 			while($row= mysqli_fetch_assoc($result))
 			{
 				echo "<p>";
 				$val=$row["Full_Name"]; 	 	
 				echo "<p id=name>NAME: $val</p>";

 				$val=$row["email"];
 				echo "<p id=email>Email: $val</p>";
 				$val=$row["contact"];
 				echo "<p id=email>Contact no: $val</p>";

 				$val=$row["city"];
 				echo "<p id=email>City: $val</p>";

 				$val=$row["DOB"];
 				echo "<p id=email>DOB: $val</p>";

 				$val=$row["skills"];
 				echo "<p id=email>Skills: $val</p>";

 				$val=$row["education"];
 				echo "<p id=email>Education: $val</p>";

 				$val=$row["work_exp"];
 				echo "<p id=email>Work Experience: $val</p>";

 				$val=$row["languages"];
 				echo "<p id=email>Languages Known: $val</p>";

 				$val=$row["linkedin"];
 				echo "<p id=email>Linkedin acc: $val</p>";


 				echo "</p>";
 			}
 		}
 	}

	?>
<form action="login.html" method="post">
<button class="button button1">Log Out.</button>
</form>

<form action="editacc.php" method="post">
<button class="button button1">Edit Account.</button>
</form>

<form action="delete.php" method="post">
<button class="button button1">Delete Account.</button>
</form>



</body>
</html>