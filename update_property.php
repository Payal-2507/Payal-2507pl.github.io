<?php
include_once("connection.php");
	$id= $_GET['id'];
	$query="select * from add_property where id='$id' ";
	$res=mysqli_query($conn,$query);
	$row=mysqli_fetch_assoc($res);

	if(!empty($_POST['add'])){
    $city= $_POST['city'];
    $area= $_POST['area'];
    $type= $_POST['type'];
    $status= $_POST['status'];
    $title= $_POST['title'];
    $address= $_POST['address'];
    $description= $_POST['description'];
    $bed= $_POST['bed'];
    $price= $_POST['price'];
    
      
      $query="update add_property set city='$city', area='$area', type='$type', status='$status',title='$title',address='$address',description='$description',bed='$bed',price='$price' where id='$id'";
      $result=mysqli_query($conn,$query);
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
            <?php include_once("header.php"); ?>

        <!--END OF MENU-->
            <!--ADD PROPERTY STARTS-->
            <div class="Add">
                <form method="POST">
                <table>
                    <tr>
                        <td>
                            <h1>Update Property</h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Select City :-</p>
                        </td>
                        <td>
                            <select id="city" name="city">
                                <option value="Chandigarh" <?php if($row['city']=='Chandigarh'){
                                echo"SELECTED"; }?>>Chandigarh</option>

                                <option value="Karnal" <?php if($row['city']=='Karnal'){
                                echo"SELECTED"; }?>>Karnal</option>

                                <option value="Kurukshetra" <?php if($row['city']=='Kurukshetra'){
                                echo"SELECTED"; }?>>Kurukshetra</option>

                                <option value="Ambala" <?php if($row['city']=='Ambala'){
                                echo"SELECTED"; }?>>Ambala</option>

                                <option value="Sonipat" <?php if($row['city']=='Sonipat'){
                                echo"SELECTED"; }?>>Sonipat</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Select Area :-</p>
                        </td>
                        <td>
                            <select id="area" name="area">
                                <option value="Sec-1" <?php if($row['area']=='Sec-1'){
                                echo"SELECTED"; }?>>Sec-1</option>

                                <option value="Sec-2" <?php if($row['area']=='Sec-2'){
                                echo"SELECTED"; }?> >Sec-2</option>

                                <option value="Sec-3" <?php if($row['area']=='Sec-3'){
                                echo"SELECTED"; }?>>Sec-3</option>

                                <option value="Sec-4" <?php if($row['area']=='Sec-4'){
                                echo"SELECTED"; }?>>Sec-4</option>

                                <option value="Sec-5" <?php if($row['area']=='Sec-5'){
                                echo"SELECTED"; }?> >Sec-5</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Select Property type :-</p>
                        </td>
                        <td>
                            <select id="type" name="type" >
                                <option value="Flat" <?php if($row['type']=='Flat'){
                            	echo"SELECTED"; }?>>Flat</option>

                                <option value="1-bhk" <?php if($row['type']=='1-bhk'){ echo"SELECTED"; }?>>1-bhk</option>

                                <option value="2-bhk" <?php if($row['type']=='2-bhk'){ echo"SELECTED"; }?>>2-bhk</option>

                                <option value="3-bhk" <?php if($row['type']=='3-bhk'){ echo"SELECTED"; }?>>3-bhk</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Property Status :-</p>
                        </td>
                        <td>
                            <input type="radio" name="status" id="sale" value="Sale" <?php if($row['status']=='Sale'){
                            	echo'checked="checked"';
                            }?>/>
                            <label for="sale">To Sale</label>
                            <input type="radio" name="status" id="let" value="Let" <?php if($row['status']=='Let'){
                            	echo'checked="checked"';
                            }?>/>
                            <label for="let">To Let</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Property Title :-</p>
                        </td>
                        <td>
                            <input type="text" name="title" value="<?=$row['title'];?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Address :-</p>
                        </td>
                        <td>
                            <textarea rows="4" cols="35" name="address"><?=$row['address'];?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Property Description :-</p>
                        </td>
                        <td>
                            <textarea rows="4" cols="35" name="description"><?=$row['description'];?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>No. of Bedrooms :-</p>
                        </td>
                        <td>
                            <input type="text" name="bed" value="<?=$row['bed'];?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Price :-</p>
                        </td>
                        <td>
                            <input type="text" name="price" value="<?=$row['price'];?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="Submit" name="add" value="submit"/>
                            <input type="reset" name="reset" value="Reset"/>
                        </td>
                    </tr>
                </table>
                </form>
            </div><!--END OF ADD PROPERTY-->
            <?php include_once("footer.php"); ?>
        </div><!--END OF WRAPPER-->     
    </body>
</html>