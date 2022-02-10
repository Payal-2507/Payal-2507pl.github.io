<?php 
include_once("connection.php"); 
//print_r($_GET['id']);
$id=$_GET['id'];
$query="delete from details where id='$id'";
$result=mysqli_query($conn,$query);
header("location:property_request.php");
?>