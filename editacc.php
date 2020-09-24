<!DOCTYPE html>
<html>
<head>
	<title>Edit account</title>
	<link rel="stylesheet" href="view_data.css">
</head>
<body id="edit">


	<form action="" method="post" >
		
	<?php
		session_start();
		$field="";		
		
		error_reporting(E_ERROR | E_PARSE);
		$con=mysqli_connect("localhost","root","","ResumeBuilder");
		$con1=mysqli_connect("localhost","root","","ResumeBuilder_master");
	if (!$con and !$con1) 
 	{
 		die("database not connected");
 	}
 	else{

 		$sql="select *from login where username='$_SESSION[username]';";
 		$sql_master="select *from master_table where username='$_SESSION[username]';";

 		$result=mysqli_query($con,$sql);
 		$result1=mysqli_query($con1,$sql_master);  		
 		if(mysqli_num_rows($result))
 		{
 			echo "<br><br><br>";
 			while($row= mysqli_fetch_assoc($result))
 			{
 				$val=$row["Full_Name"];
				echo "<p id=name>NAME: $val</p>";
			}
		
	?>

	<h3>Select a field that you want to edit</h3>
	<input type="radio" name="field" value="username"> Username
	<input type="radio" name="field" value="email"> Email
	<input type="radio" name="field" value="contact" > Contact no
	<input type="radio" name="field" value="city"> City
	<input type="radio" name="field" value="DOB"> Dob
	<input type="radio" name="field" value="skills"> Skills
	<input type="radio" name="field" value="education"> Education
	<input type="radio" name="field" value="work_exp"> Work Experience
	<input type="radio" name="field" value="languages">Languages
	<input type="radio" name="field" value="linkedin">Linkedin acc
	<br>
	<textarea placeholder="Edit the field" name="data" rows="6" cols="30"></textarea>	
	
		<button>Submit</button>

	<?php

		 $field=$_POST["field"];
		 $data=$_POST["data"];
		 $sql1="Update login set $field='$data' where username='$_SESSION[username]';";
		 $sql1_master="Update master_table set $field='$data' where username='$_SESSION[username]';";
		 // $rest=mysqli_query($con,$sql1);

		 if($con->query($sql1) ==TRUE and $con1->query($sql1_master) ==TRUE)
		 {
 			echo "<script>alert('Data updated in Database.');
 			</script>";	
 		}
				
	}
}
	?>
	</form>

	<form action="view_data.php" method="post">
            <button class="button button1" style="margin-top: 20px">Go back.</button>
        </form>
</body>
</html>