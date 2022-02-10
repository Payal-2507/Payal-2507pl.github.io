<?php include_once("connection.php");

    $id= $_GET['id'];
if(!empty($_POST['add'])){

      if(!empty($_FILES['image']['name'])){
        // echo "<pre>";
        //     print_r($_FILES);
        //     echo "</pre>"; die;
        $img=$_FILES['image']['name'];
        $tmp_name=$_FILES['image']['tmp_name'];
        $path= 'upload/'.$img;
        move_uploaded_file($_FILES['image']['tmp_name'], $path);
       }

      $description= $_POST['description'];
      $query="insert into picture(image,description,property_id)values('$path','$description','$id')";
      //print_r($query);
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
            <?php include_once("header.php");?>
            <!--END OF MENU-->
            <div class="picture1">
                <form method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>
                            <p>Browse Picture :-</p>
                        </td>
                        <td>
                            <input type="file" name="image"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Description :-</p>
                        </td>
                        <td>
                            <textarea rows="4" cols="30" name="description" placeholder="Enter Picture Description Here" ></textarea>
                        </td>
                        <tr>
                            <td></td>
                            <td>
                            <input type="submit" name="add" value="Upload">
                        </td>
                        </tr>
                    </tr>
                </table>'
                </form>
            </div><!--END OF PICTURE1-->
            <div class="picture2">
                <table>
                    <tr>
                        <td>
                            <p>Display Image</p>
                        </td>
                    </tr>
                    <?php  
                    $que="select * from picture where property_id='$id'";
                    $res=mysqli_query($conn,$que);
                    $row=mysqli_fetch_assoc($res);
                    //print_r($row);
                    ?>
                    <tr>
                        <td><img src="<?=$row['image'];?>"></td>
                    </tr>
                
                    <tr>
                        <td>
                            <p><?=$row['description'];?></p>             
                        </td>
                    </tr>
                <tr>
                    <td>
                        <a href="delete_picture.php?id=<?=$id;?>">Delete</a>    
                        <a href="home.php?id=<?=$id;?>">Home</a>    
                    </td>
                    
                </tr>
            </table>
            
            </div><!--END OF PICTURE2-->
            <?php include_once("footer.php"); ?>
        </div><!--END OF WRAPPER-->     
    </body>
</html>