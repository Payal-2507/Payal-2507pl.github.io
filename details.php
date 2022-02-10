<?php 

session_start();
 if(!isset($_SESSION['id'])){
    echo "<script>window.location.href='login.php'</script>";
 }
include_once("connection.php"); 
// print_r($_GET['id']);
$id=$_GET['id'];
$query="select * from picture where id='$id'";
$result=mysqli_query($conn,$query);
$row= mysqli_fetch_assoc($result);


$p_id = $row['property_id'];
$querys="select * from add_property where id='$p_id'";
$results=mysqli_query($conn,$querys);
$rows= mysqli_fetch_assoc($results);
//print_r($rows['title']);

if(!empty($_POST['add'])){
		
    $description=$rows['description'];
    $city=$rows['city'];
    $area= $rows['area'];
    $type= $rows['type'];
    $status= $rows['status'];
    $title= $rows['title'];
    $address= $rows['address'];
    $bed= $rows['bed'];
    $price= $rows['price'];
    $name = $_SESSION['person']; 
    //print_r($name);
        
      $query_insert="insert into details(description,city,area,type,status,title,address,bed,price,name)values('$description','$city','$area','$type','$status','$title','$address','$bed','$price','$name')";
      $result_insert=mysqli_query($conn,$query_insert);
      //print_r($query_insert);
      
}

?>
<html>
    <head>
        <title>Prime Locations</title>
        <link href="Primelocation.css" rel="stylesheet">
    </head>
    <body>
        <div id="wrapper">
            <header>
                <div class="Logo">
                    <img src="Logo.jpg" alt="240x240px Logo.jpg"/>
                </div><!--END OF LOGO--> 
                <div class="Prime">
                    <img src="Primelocation.jpg" alt="960x320px Primelocation.jpg"/>
                </div><!--END OF PRIME-->    
            </header><!--END OF HEADER-->
            <div id="banner">
                <img src="Banner2.jpg" alt="Banner1"/>
                <img src="Banner1.jpg" alt="Banner2"/>
                <img src="Banner.jpg" alt="Banner3"/>
            </div><!--END OF BANNER-->
            
            <?php  include_once("header.php"); ?>
            <!--END OF MENU-->
            <div class="Prequest">
                <form method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>
                            <h1>Property Details</h1>
                        </td>
                        
                    </tr>
                    <?php  
                        foreach ($result as $key => $value) {       
                        $ids =  $value['property_id'];      
                        $que="select * from add_property where id='$ids'";
                        $res=mysqli_query($conn,$que);
                        $row_data = mysqli_fetch_assoc($res);

                        ?>
                    <tr>
                        <td>
                            <h3>Image</h3>

                        	<img src="<?=$row['image'];?>">
                        	<input type="hidden" name="image" />
                        </td>

                        
                        <td>
                            <h3>Description</h3>
                             <!-- <?=$row['description'];?> -->
                             <?php 
                             $description= $row['description'];
                             print_r($description);
                             ?>
                             
                            <input type="hidden" name="description" />
                        </td>
                        
                        <td>
                        	<h3>City</h3>
                        	<!-- <?=$row_data['city'];?> -->

                        	<?php 
                             $city= $row_data['city'];
                             print_r($city);
                             ?>
                        	<input type="hidden" name="city" />
                        </td>

                        <td>
                        	<h3>Area</h3>
                        	<!-- <?=$row_data['area'];?> -->
                        	<?php 
                             $area= $row_data['area'];
                             print_r($area);
                             ?>
                        	<input type="hidden" name="area" />
                        </td>

                        <td>
                        	<h3>Type</h3>
                        	<!-- <?=$row_data['type'];?> -->
                        	<?php 
                             $type= $row_data['type'];
                             print_r($type);
                             ?>
                        	<input type="hidden" name="type" />
                        </td>

                        <td>
                        	<h3>Status</h3>
                        	<!-- <?=$row_data['status'];?> -->
                        	<?php 
                             $status= $row_data['status'];
                             print_r($status);
                             ?>
                        	<input type="hidden" name="status" />
                        </td>

                        <td>
                        	<h3>Title</h3>
                        	<!-- <?=$row_data['title'];?> -->
                        	<?php 
                             $title= $row_data['title'];
                             print_r($title);
                             ?>
                        	<input type="hidden" name="title" />
                        </td>

                        <td>
                        	<h3>Address</h3>
                        	<!-- <?=$row_data['address'];?> -->
                        	<?php 
                             $address= $row_data['address'];
                             print_r($address);
                             ?>
                        	<input type="hidden" name="address" />
                        </td>

                        <td>
                        	<h3>No. of Beds</h3>
                        	<!-- <?=$row_data['bed'];?> -->
                        	<?php 
                             $bed= $row_data['bed'];
                             print_r($bed);
                             ?>
                        	<input type="hidden" name="bed" />
                        </td>

                        <td>
                        	<h3>Price</h3>

                        	<!-- <?=$row_data['price'];?> -->
                        	<?php 
                             $price= $row_data['price'];
                             print_r($price);
                             ?>
                        	<input type="hidden" name="price" />
                        </td>
                    </tr>
                <?php } ?>
             
                    <tr>
                    	<td>
                    		<input type="submit" name="add" value="Property Request">
                    	</td>
                    </tr>
                </table>
                </form>

            </div><!--END OF REQUESTS-->
            <?php  include_once("footer.php"); ?>
        </div><!--END OF WRAPPER-->     
    </body>
</html>

