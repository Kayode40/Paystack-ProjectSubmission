<?php
session_start();
include('config.php');


$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$supply = $_POST['supply'];


// query insert in supplier table
$qry = "INSERT INTO supplier VALUES ('','$name', '$contact', '$email', '$supply','Pending', '0')";
mysqli_query($conn, $qry);

header("location: supplier.php");


?>