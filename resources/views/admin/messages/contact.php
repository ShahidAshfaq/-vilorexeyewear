<?php
  

   

  

  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "first-blog";

$r_name = $_POST['f-name'];
$r_lname = $_POST['l-name'];
$r_email = $_POST['email'];
$r_pass = $_POST['pass'];




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "INSERT INTO db_user ( fname , lname, Email , pas)VALUES ( '$r_name', '$r_lname', '$r_email', '$r_pass')";
 

if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();




?>
