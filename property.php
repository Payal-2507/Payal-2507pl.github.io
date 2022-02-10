<?php 

 session_start();
 if(!isset($_SESSION['id'])){
    echo "<script>window.location.href='login.php'</script>";
 }

include_once("connection.php");

$query="select * from add_property";
$result=mysqli_query($conn,$query);

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
            <?php include_once("header.php");

?><!--END OF MENU-->
            <!--PROFILES START-->
            <div class="profile">
                <form method="POST">
                <table>
                    <tr>
                        <td>
                            <h1>Properties</h1>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                           <button> <a href="add_property.php">Add Property</a></button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Property Title</h3>
                        </td>
                        <td>
                            <h3>Property Type</h3>
                        </td>
                        <td>
                            <h3>Address</h3>
                        </td>
                        <td>
                            <h3>Area</h3>
                        </td>

                        <td>
                            <h3>Status</h3>
                        </td>
                    </tr>

                    <?php
                        foreach ($result as $key => $value) { ?>
                    <tr>
                        <td><?=$value['title'];?></td>
                        <td><?=$value['type'];?></td>
                        <td><?=$value['address'];?></td>
                        <td><?=$value['area'];?></td>
                        <td>
                            <a href="picture.php?id=<?=$value['id'];?>">Picture</a>
                            <a href="update_property.php?id=<?=$value['id'];?>">Edit</a>
                            <a href="delete_property.php?id=<?=$value['id'];?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
                </table>
                </form>
            </div><!--END OF PROFILE-->
            <!--PROFILES END-->
            <?php include_once("footer.php");

?>
        </div><!--END OF WRAPPER-->     
    </body>
</html>