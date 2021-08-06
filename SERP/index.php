<!DOCTYPE html>
<html>
<head>
	<title>SERP</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	</head>
<body>
	<div id="menu">
                <a href="add_website.php"><img src="add.png" width="50px"></a>
            </div>
            <br>

	<form action="index.php" method="GET" >
					<center><a href="index.php"><img src="cu.png" width="50%"></a>
					<input type="text" name="search" id="vsv"><br><br>
					<input type="submit" name="searchbtn" value="GO!" id="gobtn">
				</center>
		<table border="0" style="margin-left: 20px; margin-top: 10px;">
			<tr>
			<?php

			include ("connection.php");
			if (isset($_GET['searchbtn'])) 
			{
				$search = $_GET['search'];

				if ($search=="")
				{
					echo "<script>alert('Please Write something in search box')</script>";
					exit();
				}
				
				$query = "select * from add_website where website_keywords like '%$search%' limit 0,4";
				$data = mysqli_query($conn,$query);

				if (mysqli_num_rows($data)<1)
				{
					echo "<script>alert('No Result Found')</script>";
					exit();
				}
				echo "<h2 style='margin-left:20px; margin-top:315px;'>SEARCH RESULTS</h2>";
   while ($row = mysqli_fetch_array($data)) 
   {
    echo "
	<tr>
     <img src='$row[4]' width='100px' height='100px' style='margin-left:20px;'>
	 </tr>";
   }   
				$query1 = "select * from add_website where website_keywords in ('$search')";
	$data1 = mysqli_query($conn,$query1);

	while($row1 = mysqli_fetch_array($data1))
	{
		echo 
		"
		<tr>
		<td>
		<font size='5' >$row1[1]</font><br>";
		echo "<font size='6' ><b><a href='$row1[1]'>$row1[0]</a></b></font><br>";
		echo "<font size='4' color='white'>$row1[3]</font><br><br>
		</td>
		</tr>";
	}
			}
			else
			{
				
			}
	
	?>
		</tr>
		</table>
</form>
</body>
</html>