<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" href="helpcenter.css">
</head>
<body>
	<h1><center>Resume of Students.</center></h1>
	<div class="float">
	<form action="search.php" method="post">
		
	
	
		<h2>Search for Name you want details of.</h2>
		<ul>
			<input type="text" name="search" placeholder="Name">
		</ul>
			<button class="button button1">Search.</button>
	
	</form>

	<form action="delete1.php" method="post">
		
		<h2>Enter username you want to delete.</h2>
		<ul>
			<input type="text" name="user" placeholder="username">


		</ul>
			<button class="button button1">Delete</button>
	
	</form>
	
</div>


	<?php
	session_start();
	$con=mysqli_connect("localhost","root","","ResumeBuilder");
		if (mysqli_connect_errno($con)) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
	}
 	if (!$con) {
 		die("database not connected");
 	}
 	else
 	{
 		$sql="select count(username) from login";
 		 $result=mysqli_query($con,$sql);
 		$row1 = mysqli_fetch_array($result);
 		$x=$row1[0];
 		for($i=0;$i<1;$i++)
 		{
 			// echo "holaaa";
 			$sql1="select *from login order by username asc";
 			$result1=mysqli_query($con,$sql1); 

 		if(mysqli_num_rows($result1)>0)
 		{
 			echo "<br><br><br>";
 			while($row= mysqli_fetch_assoc($result1))
 			{
 				$val=$row["Full_Name"];
 				


 			
	?>

	<div class="right_side">
	<button class="head" id="1" style="color: #000000">
		<!-- heloo -->
		<?php $val=$row["Full_Name"]; 	 	
 			echo "<p id=name>NAME: $val</p>";?>				
 	</button>
	<div class="panel"> 
		<p id="show1">
			<?php
				$val=$row["username"];
				echo "<p>Username: $val</p>";


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
 				?>
		</p>
	</div>
</div>



	<?php
				
			}
		}
	}
}
	?>



<script>
		var acc = document.getElementsByClassName("head");
		var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		var i=0;
		for(i=0;i<10;i++)
		{
			$("#show"+i).hide();
		}
		$("#1").click(function(){
			$("#show1").slideToggle("slow");
		});
		$("#1").click(function(){
			$("#show1").slideToggle("slow");
		});
		$("#1").click(function(){
			$("#show1").slideToggle("slow");
		});
	})
</script>

</body>
</html>