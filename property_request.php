<?php 

session_start();
include_once("connection.php"); 
$query="select * from details";
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
            
            <?php  include_once("header.php"); ?>
            <!--END OF MENU-->
            <div class="Prequest">
                <table>
                    <tr>
                        <td>
                            <h1>Property Requests</h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>User-type</h3>
                        </td>
                        
                        <td>
                            <h3>Property Title(type)</h3>
                        </td>
                        <td>
                            <h3>Request Status</h3>
                        </td>
                        <td>
                            <h3>Request Date</h3>
                        </td>
                        <td>
                            <h3>Message</h3>
                        </td>
                    </tr>
                    <?php  
                    foreach ($result as $key => $value) {
                        
                    ?>
                    <tr>
                        <td><?=$value['name'];?></td>
                        <td><?=$value['type'];?></td>
                        <td><?=$value['status'];?></td>
                        <td><?=$value['created_at'];?></td>
                        <td><?=$value['description'];?></td>
                        <td></td>
                        <td>
                            <?php  if(isset($_SESSION['id'])){?>
                            <a href="close_request.php?id=<?=$value['id'];?>">Close Requests</a>
                        <?php }else{?>
                            <a href="home.php">Home</a>
                        <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
                </table>

            </div><!--END OF REQUESTS-->
            <?php  include_once("footer.php"); ?>
        </div><!--END OF WRAPPER-->     
    </body>
</html>