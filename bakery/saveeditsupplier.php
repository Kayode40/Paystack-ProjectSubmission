<?php
// configuration
include('config.php');

// new data
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$supply = $_POST['supply'];
$status = $_POST['status'];
$amount = $_POST['amount'];
// query supliers table
$qry = "UPDATE supplier SET supplier_name='$name', supplier_email='$email', supplier_contact='$contact', supply='$supply', delivery_status='$status', Amount = '$amount'  WHERE supplier_id='$id'";
mysqli_query($conn, $qry);

header("location: supplier.php");

?>