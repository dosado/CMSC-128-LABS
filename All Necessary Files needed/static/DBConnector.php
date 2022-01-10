<?php

$servername = "localhost";
$username = "root"; //default username
$password = "";     //default password
$dbname = "sprintvisitor";

//Create connection
$conn = new mysqli($servername,$username,$password,$dbname);
//Check connection
if ( $conn -> connect_error) {
    die("Connections failed: " . $conn->connect_error);
}
?>