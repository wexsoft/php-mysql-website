<?php

// catch variables POSTed from ajax.js
if(isset($_POST['table'])){
	$table 		= $_POST['table'];
	$database 	= 'test';
} else {
	$table 		= "basetypes";
	$database 	= "test";
}

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("test", $con);

$result = mysql_query("SELECT * FROM ".$table);

$output = "";

while($row = mysql_fetch_array($result))
  {
  $output .= '{"recId":"'.$row['recId'].'","Name":"'.$row['Name'].'","SortOrder":"'.$row['SortOrder'].'","Active":"'.$row['Active'].'"},';
  }
$output = "[".$output."{}]";
if($output == ""){
	$output = "No results found!";
}

echo $output;
mysql_close($con);
?>