<?php

//test function
function add($x,$y){
	$total=$x+$y;
	return $total;
}

//list entries from DB
function listEntries(){
	$con = mysql_connect("localhost","root","");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db("test", $con);

	$result = mysql_query("SELECT * FROM table_1");

	// echo 'Results: <br/>';
	$output = '';
	while($row = mysql_fetch_array($result))
	  {
	  $output .= $row['fname'] . " " . $row['lname'] . " " . $row['age'];
	  $output .= "<br />";
	  }

	mysql_close($con);
	return $output;
}
?>