<?php 
 session_start();
 if(!isset($_SESSION['id'])){
    echo "<script>window.location.href='login.php'</script>";
 }

include_once("connection.php");


if(!empty($_POST['add'])){

    $agent= $_POST['agent'];
    $name= $_POST['name'];
    $number= $_POST['number'];
    $address= $_POST['address'];
      if(!empty($_FILES['image']['name'])){
        // echo "<pre>";
            // print_r($_FILES);
            // echo "</pre>";
        $img=$_FILES['image']['name'];
        $tmp_name=$_FILES['image']['tmp_name'];
        $path='upload/'.$img;
        move_uploaded_file($_FILES['image']['tmp_name'], $path);
      }

      $query="insert into profile(agent,name,number,address,image)values('$agent','$name','$number','$address','$path')";
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
            <?php include_once("header.php");?><!--END OF MENU-->
            <!--PROFILE START -->
            <div class="profile">
                <form method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>
                            <h1>Submit Profile</h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Agent Type :-</p>
                        </td>
                        <td>
                            <input type="radio" name="agent" id="EAgent" value="EAgent"/>
                            <label for="EAgent">Estate Agent</label>
                        </td>
                        <td>
                            <input type="radio" name="agent" id="LAgent" value="LAgent"/>
                            <label for="LAgent">Letting Agent</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Business Name</p>
                        </td>
                        <td>
                            <input type="text" name="name" placeholder="Enter Business Name"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Phone No.</p>
                        </td>
                        <td>
                            <input type="text" name="number" placeholder="Enter Phone Number"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Address</p>   
                        </td>
                        <td>
                            <textarea rows="3" cols="30" name="address" placeholder="Enter Address"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Logo</p>
                        </td>
                        <td>
                            <input type="file" name="image" value="Browse"/>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Submit" name="add"/>

                            <input type="reset" value="Reset" name="reset"/>
                        </td>
                    </tr>
                </table>
                </form>
            </div><!--END OF PROFILE-->
            <!--PROFILE END-->
            <?php include_once("footer.php");?>
        </div><!--END OF WRAPPER-->     
    </body>
</html>