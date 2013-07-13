<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>registration Form</title>
<link href="form.css" rel="stylesheet" type="text/css" />
<script src="form.js"></script>
<style type="text/css">
<!--
#tempid {
	font-family: Verdana, Geneva, sans-serif;
	color:#C33;
}
-->
</style>
</head>

<body>
	<h1>Registration Form</h1> 

<?php 
	$name = isset($_REQUEST["name"])?$_REQUEST["name"]:'';
	$card_no = isset($_REQUEST["card_no"])?$_REQUEST["card_no"]:'';
	$acc_no = isset($_REQUEST["acc_no"])?$_REQUEST["acc_no"]:'';
	$phone = isset($_REQUEST["phone"])?$_REQUEST["phone"]:'';
	$cur_add = isset($_REQUEST["cur_add"])?$_REQUEST["cur_add"]:'';
	$per_add = isset($_REQUEST["per_add"])?$_REQUEST["per_add"]:'';
	$proof = isset($_REQUEST["proof"])?$_REQUEST["proof"]:'';
	$email = isset($_REQUEST["email"])?$_REQUEST["email"]:'';
	$perm = isset($_REQUEST["perm"])?$_REQUEST["perm"]:'';
	
	$image = isset($_REQUEST["image"])?$_REQUEST["image"]:'';
	$dob = isset($_REQUEST["dob"])?$_REQUEST["dob"]:'';
	$gender = isset($_REQUEST["gender"])?$_REQUEST["gender"]:'';
	//$perm = isset($_REQUEST["uni"])?$_REQUEST["uni"]:'';
	//$perm = isset($_REQUEST["course"])?$_REQUEST["course"]:'';
	
?>

 <form id="form1"  name="registration" method="post" action="index.php" enctype="multipart/form-data">
 
 <ul>
	<li><label for= "name">Name (As wanted on card):</label></li>
	<li><input name="name" id="name" type="text"  ></li>
	<li><label for= "card_no">16 Digit Card No.: </label></li>
	<li><input name="card_no" id="card_no" type="text" ></li>
    <li><label for= "acc_no">8 Digit Account Number: </label></li>
    <li><input name="acc_no" id="acc_no" type="text"  ></li>
    <li><label for= "phone">Phone Number:</label></li>
	<li><input name="phone"  id="phone"type="text"></li>
    <li><label for= "email">Email  Address:</label></li>
    <li> <input name="email" id="email" type="email"></li>
    <li><label for= "cur_add">Current Address:</label></li>
    <li> <input name="cur_add" id="cur_add" type="text"></li>
    <li><label for= "per_add">Permanent Address: </label></li>
    <li><div id="cbox"><input name="per_add" id="per_add" type="text"> 
    <label for="add_cbox"> Same as Current Adress:</label>  
    <input name="add_cbox" id="add_cbox" type="checkbox"></div></li>

    <li><label for="add_drop" >Permanent or Outstation: </label></li>
    <li><select name="add_drop" id="add_drop">
      <option value="permanent">Permanent </option>
      <option value="outstation">Outstation</option>
    	</select> </li>
     <li><label for="proof">ID Proof Submitted to vendor:</label></li>
    <li><select id="proof" name= "proof" >
        <option value="1">Pancard</option>
        <option value="2">Passport</option>
      </select></li>
	<li><label for="image"> Upload Your Picture(Same gets printed on your card): </label>
     <input name="image" id="image" type="file"></li> 
    	<li><label>Date of Birth:</label>
     <input name="dob" type="text" value="MM/DD/YYYY" size="10" maxlength="10"> </li>
	<li><label id="gender">Sex:</label></li>    
	<li><input type="radio" name="gender" value="Male" /><span>Male</span></li>  
	<li><input type="radio" name="gender" value="Female" /><span>Female</span></li> 
      
    <li><label>College/University: </label>
        <input name="uni" type="text" > </li>
   
  	<li><label for="course">Course:</label></li>
	<li><select id="course" name="course">
    	<option value="btech">B. Tech</option>
      	<option value="mtech">M. Tech</option>
    	</select></li>
        
    <li><label>Stream: </label>
    	<select name="stream" size="1"> </select></li>
    <li><label>Specialization:</label>
     	<select name="specializtion" size="1"></select></li>
	<li><input type="submit" name="submit" value="Submit" /></li> <!-- Submit button--> 
    </ul>
   
</form>

<!--file upload code-->
<?php
	if (isset($_FILES["image"]))
	{
	if ($_FILES["image"]["error"] > 0)
	  {
	  echo "Error: " . $_FILES["image"]["error"] . "<br>";
	  }
	else
	  {
	  echo "Upload: " . $_FILES["image"]["name"] . "<br>";
	  echo "Type: " . $_FILES["image"]["type"] . "<br>";
	  echo "Size: " . ($_FILES["image"]["size"] / 1024) . " kB<br>";
	  echo "Stored in: " . $_FILES["image"]["tmp_name"];
  
  
	  if (file_exists("upload/" . $_FILES["image"]["name"]))
	      {
	      echo $_FILES["image"]["name"] . " already exists. ";
	      }
	    else
	      {
	      move_uploaded_file($_FILES["image"]["tmp_name"],
	      "upload/" . $_FILES["image"]["name"]);
	      echo "Stored in: " . "upload/" . $_FILES["image"]["name"];
    	  }
  	}
	}
?>
<!-- Data Base code -->
<?php 
	if (isset($_REQUEST["name"]))
	{
 	$name = mysql_real_escape_string($name);
	$email = mysql_real_escape_string($email);
	$card_no = mysql_real_escape_string($card_no);
	$acc_no = mysql_real_escape_string($acc_no);
	$phone = mysql_real_escape_string($phone);
	$cur_add = mysql_real_escape_string($cur_add);
	$per_add = mysql_real_escape_string($per_add);
	$image = mysql_real_escape_string($image);
	$gender = mysql_real_escape_string($_POST['gender']);
	$image = mysql_real_escape_string($_FILES["image"]["name"]);
	$uni = mysql_real_escape_string($_POST['uni']);
	$course = mysql_real_escape_string($_POST['course']);
	$proof = mysql_real_escape_string($_POST['proof']);
	$perm = mysql_real_escape_string($_POST['add_drop']);
	$dob = mysql_real_escape_string($dob);
	$mydate =  strtotime($dob);
	$date1 = date("Y-m-d H:i:s", $mydate);
	
	//connect code
	
	$conn = mysql_connect("localhost", "root", "");
	if(! $conn )
	{
	die('Could not connect: ' . mysql_error());
	}
	$sql="INSERT INTO myiyc_reg (name, card_no, acc_no, phone, cur_add, per_add, proof, perm, email, image, dob, gender, uni, course, unixtime )
	VALUES ('$name', '$card_no', '$acc_no', '$phone', '$cur_add', '$per_add', '$proof', '$perm', '$email', '$image', '$date1', '$gender', '$uni', '$course', '$mydate' )";
	mysql_select_db('system');
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
	die('Could not enter data: ' . mysql_error());
	}
	echo "Entered data successfully\n";

	mysql_close($conn);
	}
?>
</body>
</html>