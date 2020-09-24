<!DOCTYPE html>
<html>
<head>
	<title>Searched</title>
	<link rel="stylesheet" href="view_data.css">
</head>
<body>

	<?php
	error_reporting(E_ERROR | E_PARSE);
	$con=mysqli_connect("localhost","root","","ResumeBuilder");
	$name=$_POST["search"];
	// echo "$name";
	$sqll="Select *from login where Full_Name='$name'";
	$res=mysqli_query($con,$sqll);
	// echo "HIII";
	if(mysqli_num_rows($res)>0)
 		{
 			
 			echo "<br><br><br>";
 			while($row= mysqli_fetch_assoc($res))
 			{
 				$val=$row["Full_Name"];

			

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
	?>
<form action="admin.php" method="post">
            <button class="button button1" style="margin-top: 20px">Go back.</button>
        </form>


</body>
</html>