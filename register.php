<?php
$name=$_POST['name'];
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$city=$_POST['city'];
$phone_no=$_POST['phone_no'];


if ($password != $repassword) 
{
	echo '<script>alert("Password and repassword doesnt match")</script>';
	header('location: register.html');
}
else 
{
 	$con=mysqli_connect("localhost","root","","ResumeBuilder");
 	$con1=mysqli_connect("localhost","root","","ResumeBuilder_master");
 	$con2=mysqli_connect("localhost","root","","ResumeBuilder_emp");
 	if (!$con) 
 	{
 		die("database not connected");
 	}
 	else
 	{
 		$position='user';
 		
 		if ($username!='admin')
 		{
 			$dob=$_POST['dob'];
			$skills=$_POST['skills'];
			$education=$_POST['education'];
			$work_exp=$_POST['work_exp'];
			$lang1=$_POST['lang'];
			$linkedin=$_POST['linkedin'];

			$skill="";
			$lang="";
			foreach($skills as $skill1)  
			   {  
			      $skill .= $skill1.",";  
			   }  
			foreach($lang1 as $lang2)  
			   {  
			      $lang .= $lang2.",";  
			   }  
 			$sql="insert into login values ('$username','$password','$name','$email','$phone_no','$city','$dob','$skill','$education','$work_exp','$lang','$linkedin' )";
 			$sql_master="insert into master_table values ('$username','$password','$name','$email','$phone_no','$city','$position','$dob','$skill','$education','$work_exp','$lang','$linkedin')";
 			$Insert=mysqli_query($con,$sql);
 		}
 		else
 		{
 			$position='employee';

 			$sql_emp="insert into emp values ('admin','$password','$name','$email','$phone_no','$city','$position')";
			$Insert2=mysqli_query($con2,$sql_emp);
			$sql_master="insert into master_table values ('admin','$password','$name','$email','$phone_no','$city','$position','-','-','-','-','-','-')";
 		}
 		

 		
 		
 		$Insert1=mysqli_query($con1,$sql_master);
 		

 		// $Insert2=mysqli_query($con,$sql2);
 		// $Insert3=mysqli_query($con,$sql3);
 		if (!$Insert1) 
 		{
 			die("not inserted");
 		}
 		else
 		{
 			// echo '<div style="font-size:5em;color:red;">DATA successfully added in database</div>';

 			// header('location:login.html');
 			echo "<script>alert('Data added in Database.');
 			window.location.href='login.html'
 			</script>";
 		
 		}
 	}
 }