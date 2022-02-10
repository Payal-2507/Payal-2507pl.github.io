<?php 
include_once("connection.php");

$id=$_GET['id'];
$query="delete from picture where property_id='$id'";
$result=mysqli_query($conn,$query);
header("location:picture.php");
?>