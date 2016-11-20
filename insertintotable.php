<?php
	// Establishing connection with server by passing "server_name", "user_id", "password".
	$connection = mysql_connect("testinstance.cf2mfgawxvep.us-west-2.rds.amazonaws.com", "testuser", "testuser");
	// Selecting Database by passing "database_name" and above connection variable.
	$db = mysql_select_db("internship", $connection);
	$name2=$_POST['name1']; // Fetching Values from URL
	$final = strtolower(str_replace(' ', '', $name2));
	$msg2=$_POST['msg1'];
	$query = mysql_query("insert into posts(user, post) values('$final', '$msg2');"); //Insert query
	if($query)	echo "Post has been posted on your timeline.";
	mysql_close($connection); // Connection Closed.
?>
