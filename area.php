<?php 

 session_start();
 if(!isset($_SESSION['id'])){
    echo "<script>window.location.href='login.php'</script>";
 }
include_once("connection.php");
$query="select * from city";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
//print_r($row);

if(!empty($_POST['add'])){
    $city= $_POST['city'];
    $area= $_POST['area'];
    $slug= $_POST['slug'];

      $query="insert into area(city,area,slug)values('$city','$area','$slug')";
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
            <div class="area">
                <form method="POST">
                <table>
                    <tr>
                        <td>
                            <h1>Working Areas</h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Select City :-</p>
                        </td>
                        <td>
                            <select name="city">
                                <option value="">Select One Value Only</option>
                                <?php foreach ($result as $key => $value) {?>
                                    
                                <option value="<?=$value['id'];?>"><?=$value['name'];?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <p>Select Areas :-</p>
                        </td>
                        <td>
                            <input type="text" name="area" placeholder="Enter area">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <p>Slug :-</p>
                        </td>
                        <td>
                            <input type="text" name="slug" placeholder="Enter slug">
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="add" value="submit"/>
                        </td>
                    </tr>
                </table>
                </form>
            </div><!--END OF AREAS-->
            <?php include_once("footer.php");?>
        </div><!--END OF WRAPPER-->     
    </body>
</html>