<?php
//Give the name of the program here
//Include your name and the date here
//Give a brief description of what the program does
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tennisclub";
$port = 3307;

//set the default timezone - this is necessary since MySQL 8. This is an effort to store all dates and times together with their timezones. 
//This is particularly important where there is a timestamp indicating when something happened.
date_default_timezone_set('Europe/Dublin');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO member (firstname, surname) VALUES ('john', 'doe')";

$sql = "SELECT id, firstname, lastname FROM members";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["surname"]. "<br>";
  }
} else {
  echo "0 results";
}

mysqli_query($conn, $sql);

mysqli_close($conn);
?>