<?php

// catch variables POSTed from ajax.js
if(isset($_POST['name0']) && isset($_POST['val0']) &&isset($_POST['name1']) &&isset($_POST['val1']) &&isset($_POST['name2']) &&isset($_POST['val2']) &&isset($_POST['name3']) &&isset($_POST['val3'])){
	$var1_name 	= $_POST['name0'];
	$var1_val 	= $_POST['val0'];//firstname
	$var2_name 	= $_POST['name1'];
	$var2_val 	= $_POST['val1'];//lastname
	$var3_name 	= $_POST['name2'];
	$var3_val 	= $_POST['val2'];
	$var4_name 	= $_POST['name3'];
	$var4_val 	= $_POST['val3'];
	$table 		= 'table_1';//$_POST[table];
	$database 	= 'test';//$_POST[db];
} else {
	$var1_name 	= "";
	$var1_val 	= "";
	$var2_name 	= "";
	$var2_val 	= "";
	$var3_name 	= "";
	$var3_val 	= "";
	$var4_name 	= "";
	$var4_val 	= "";
	$table 		= "";
	$database 	= "";
}

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($database, $con);

// SQL INSERT statement -------------------------------//
$sql="INSERT INTO table_1 (fname, lname, email, dob)
	VALUES
	('$var1_val','$var2_val','$var3_val','$var4_val')";
// END SQL --------------------------------------------//

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

mysql_close($con);

//---------------------------------------
// if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"])){ 
// 	$fname = $_POST["firstname"];
// 	$lname = $_POST["lastname"];
// 	$email = $_POST["email"];
// }else {
// 	$fname = "";
// 	$lname = "";
// 	$email = "";
// }

// $con = mysql_connect("localhost","root","");
// if (!$con)
//   {
//   die('Could not connect: ' . mysql_error());
//   }

// mysql_select_db("test", $con);

// $sql="INSERT INTO table_1 (fname, lname, age)
// VALUES
// ('$fname','$lname','$email')";

// if (!mysql_query($sql,$con))
//   {
//   die('Error: ' . mysql_error());
//   }
// echo "1 record added";

// mysql_close($con);
?>