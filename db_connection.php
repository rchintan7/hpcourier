<?php

$servername = "localhost";
$db_name="clonemarkets_hpcourier";
$username = "clonemarkets_hpcourier";
$password = "*Jld}?WyO1?3";

// Create connection
$conn = mysqli_connect($servername,$username,$password,$db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

?>