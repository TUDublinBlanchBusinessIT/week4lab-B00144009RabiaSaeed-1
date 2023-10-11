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

//no way i wrote members instead of member, that was my bad because I didn't notice the s//
$sql = "SELECT id, firstname, surname FROM member";
//I changed the names, it still works. I tried to change mysqli_num_rows and mysqli_fetch_assoc but apparently it doesn't work//
$resultOfuser = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultOfuser) > 0) {
  //so over here it's going to output the data onto the locl host
  while($row = mysqli_fetch_assoc($resultOfuser)) {
    echo "ID: " . $row["id"]. " - Name of User: " . $row["firstname"]. " " . $row["surname"]. "<br>";
  }
} else {
  echo "0 results";
}

mysqli_query($conn, $sql);

mysqli_close($conn);
?>