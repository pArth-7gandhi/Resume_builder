<?php
error_reporting(E_ERROR | E_PARSE);
 // session_start();
 // $username=$_SESSION['username'];

 $username=$_POST["user"];

// echo $username;
if(isset($username))
{
	// $username=$_POST['username'];
	$con=mysqli_connect("localhost","root","","ResumeBuilder");
	$con1=mysqli_connect("localhost","root","","ResumeBuilder_master");
	if (!$con) 
	{
	 	die("database not connected");
	}
	else 
	{
		// $sql1="Delete from login where username='$user'";
		$sql2="Delete from login where username='$username'";
		$sql_master="Delete from master_table where username='$username'";
		// $result1=mysqli_query($con,$sql1);
		// $result2=mysqli_query($con,$sql2);
		if(mysqli_query($con, $sql2) and mysqli_query($con1, $sql_master))
		{
			echo "<script>alert('Account Deleted.');
			window.location.href='login.html'
 			</script>";
		}
		else
		{
			echo'DATA NOT FOUND';
		}

	}
}

?>