<?php
//Give the name of the program here
//Include your name and the date here
//Give a brief description of what the program does

//I'm moving around the code to see if that does anything, it's giving me an error on local host on google that there's something wrong with the timezone thing so I'm going to execute that first//

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tennisclub";
$port = 3307;

//set the default timezone - this is necessary since MySQL 8. This is an effort to store all dates and times together with their timezones. 
//This is particularly important where there is a timestamp indicating when something happened.
//Okay so timezone was not the problem, the problem was my syntax 
date_default_timezone_set('Europe/Dublin');


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

//uh oh I had forgotten to put the dollar sign and underscore for POST//
//no way i forget the ; at the end for these, it kept saying parse error//
$UserfirstName = $_POST["firstname"];
$UsersecondName = $_POST["surname"];

$sql = "INSERT INTO member (firstname, surname) VALUES ('$UserfirstName', '$UsersecondName')";


mysqli_query($conn, $sql);

mysqli_close($conn);
?>