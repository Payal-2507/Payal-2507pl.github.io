<?php 
include_once("connection.php");
 //print_r($_GET['id']);
$query="select * from picture";
$result=mysqli_query($conn,$query);
 
 if(!empty($_POST['add'])){
    $search= $_POST['search'];
    
    $search_query="select * from add_property WHERE title LIKE '%$search%' or type LIKE '%$search%' or city LIKE '%$search%'";
    //print_r($search_query);
    $search_result=mysqli_query($conn,$search_query);
    print_r($search_result);
   // $row=mysqli_num_rows($search_result);
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
            <div id="home">
                <div class="h2">
                    <form method="POST">
                    <table style="display: flex;">
                        <tr>
                            <td>
                                <h1>Gallery</h1>
                                <input type="text" name="search" placeholder="Search Property Here">
                                <input type="submit" name="add" value="Click Here">
                            </td>
                        </tr>
                        <?php  
                        foreach ($result as $key => $value) {       
                        $id =  $value['property_id'];      
                        $query="select * from add_property where id='$id'";
                        $result=mysqli_query($conn,$query);
                        $row = mysqli_fetch_assoc($result);

                        ?>

                        <tr>
                            <td> <img src="<?=$value['image'];?>">
                                 <h3>Buy Home :- $<?=$row['price'];?></h3>
                                 <button><a href="details.php?id=<?=$value['id'];?>">Details</a></button>
                            </td>
                        </tr>
                        

                    <?php }?>
                        
                        
                    </table>
                    </form>
                </div>
                
            </div><!--END OF HOME-->
           <?php include_once("footer.php");?>
        </div><!--END OF WRAPPER-->     
    </body>
</html>