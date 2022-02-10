<?php
include_once("connection.php");
	$id= $_GET['id'];
	$query="delete from add_property where id='$id' ";
	$res=mysqli_query($conn,$query);
	header("location:property.php");


?>