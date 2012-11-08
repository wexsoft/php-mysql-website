<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("test", $con);

$result = mysql_query("SELECT * FROM table_1");

$output = "";

while($row = mysql_fetch_array($result))
  {
  $output .= $row['fname'] . " " . $row['lname'] . " " . $row['email'];
  $output .= "<br />";
  }

if($output == ""){
	$output = "No results found!";
}

echo $output;
mysql_close($con);
?>