<?php
$servername = "testinstance.cf2mfgawxvep.us-west-2.rds.amazonaws.com";
$username = "testuser";
$password = "testuser";
$dbname = "internship";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
$name2=$_POST['name1']; // Fetching Values from URL
$final = strtolower(str_replace(' ', '', $name2));
$sql = "SELECT id, user, post FROM posts where user = "."'$final'"."order by id desc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
      echo "{$row['post']} <hr>";
     }
} else {
     echo "No posts to show";
}

$conn->close();	
?>
