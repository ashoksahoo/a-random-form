<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>


<?php 

	$conn = mysqli_connect("localhost", "root", "");
	if(! $conn )
	{
	die('Could not connect: ' . mysqli_error());
	}
	$sql = "SELECT * FROM `myiyc_reg` ORDER BY `myiyc_reg`.`dob` DESC LIMIT 0, 30 ";
	mysqli_select_db($conn , "system");
	if($result = mysqli_query(  $conn, $sql ))
	{
    printf("Select returned %d rows. <br>", $result->num_rows);
    }

	if(! $result )
	{
	die('Could not Fetch data: ' . mysqli_error());
	}
	echo "Fetched data successfully <br>";
	
	while($row = mysqli_fetch_array($result))
	{

	echo $row['name'] . " " . $row['card_no'] . " " . $row['acc_no'] . " " . $row['phone'] . " " . $row['cur_add'] . " " . $row['per_add'] . " " . $row['proof'] . " " . $row['perm'] . " " . $row['email'] . " " . $row['image'] . " " . $row['dob'] . " " . $row['gender'] . " " . $row['uni'] . " " . $row['course'] . " " . $row['unixtime'];
  	echo "<br>";
  	}	
	mysqli_close($conn);
	
?>
</body>
</html>

