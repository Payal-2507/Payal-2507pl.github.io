<?php include_once("connection.php");
    
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
        if(!empty($_FILES['image']['name'])){
        // echo "<pre>";
        //     print_r($_FILES);
        //     echo "</pre>"; die;
        $img=$_FILES['image']['name'];
        $tmp_name=$_FILES['image']['tmp_name'];
        $path= 'upload/'.$img;
        move_uploaded_file($_FILES['image']['tmp_name'], $path);
       }
    
      
      $query="insert into add_property(city,area,type,status,title,address,description,bed,price,image)values('$city','$area','$type','$status','$title','$address','$description','$bed','$price','$path')";
      $result=mysqli_query($conn,$query);
      header("location:property.php");
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
                <form method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>
                            <h1>Add Property</h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Select City :-</p>
                        </td>
                        <td>
                            <select id="city" name="city">
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Karnal">Karnal</option>
                                <option value="Kurukshetra">Kurukshetra</option>
                                <option value="Ambala">Ambala</option>
                                <option value="Sonipat">Sonipat</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Select Area :-</p>
                        </td>
                        <td>
                            <select id="area" name="area">
                                <option value="Sec-1">Sec-1</option>
                                <option value="Sec-2">Sec-2</option>
                                <option value="Sec-3">Sec-3</option>
                                <option value="Sec-4">Sec-4</option>
                                <option value="Sec-5">Sec-5</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Select Property type :-</p>
                        </td>
                        <td>
                            <select id="type" name="type">
                                <option value="Flat">Flat</option>
                                <option value="1-bhk">1-bhk</option>
                                <option value="2-bhk">2-bhk</option>
                                <option value="3-bhk">3-bhk</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Property Status :-</p>
                        </td>
                        <td>
                            <input type="radio" name="status" id="sale" value="Sale"/>
                            <label for="sale">To Sale</label>
                            <input type="radio" name="status" id="let" value="Let"/>
                            <label for="let">To Let</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Property Title :-</p>
                        </td>
                        <td>
                            <input type="text" name="title" placeholder="Property Title"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Address :-</p>
                        </td>
                        <td>
                            <textarea rows="4" cols="35" name="address" value="Enter Address"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Property Description :-</p>
                        </td>
                        <td>
                            <textarea rows="4" cols="35" name="description" value="Enter Property Description Here"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>No. of Bedrooms :-</p>
                        </td>
                        <td>
                            <input type="text" name="bed" placeholder="Total Bedrooms"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Price :-</p>
                        </td>
                        <td>
                            <input type="text" name="price" placeholder="Enter Price"/>
                        </td>
                    </tr>
                
                    <tr>
                        <td>
                            <p>Image :-</p>
                        </td>
                        <td>
                            <input type="file" name="image" />
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