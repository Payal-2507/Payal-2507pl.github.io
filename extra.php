<?php 
include_once("connection.php");

$query="select * from add_property";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);

if(!empty($_POST['add'])){
    $city= $_POST['city'];
    $area= $_POST['area'];
    $price= $_POST['price'];
    $bed= $_POST['bed'];
    // $status= $_POST['status'];

    $query = "SELECT * FROM add_property WHERE id LIKE '%$city%'";
    //print_r($query);
    $result=mysqli_query($conn,$query);
    foreach($result as $value)
    {
    print_r($value);
        echo $value;
    }
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
                <div class="h1">
                    <table>
                        <form method="POST" enctype="multipart/form-data">
                        <tr>
                            <td>
                                <h2>Find Your House</h2>
                            </td>
                        </tr>    
                        <tr>   
                            <td>
                                <p>Over 3 Million Properties</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>City :-</p>
                            </td>
                            <td>
                                <select name="city" id="city">
                                <option value="">Select City</option>
                                <?php foreach ($result as $key => $value) {?>
                                    
                                <option value="<?=$value['id'];?>"><?=$value['city'];?></option>
                                <?php } ?>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Area :-</p>
                            </td>
                            <td>
                                <select name="area" id="area">
                                <option value="">Select Area</option>
                                <?php foreach ($result as $key => $value) {?>
                                    
                                <option value="<?=$value['id'];?>"><?=$value['area'];?></option>
                                <?php } ?>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Price :-</p>
                            </td>
                            <td>
                                <select name="price" id="price">
                                <option value="">Select Price</option>
                                <?php foreach ($result as $key => $value) {?>
                                    
                                <option value="<?=$value['id'];?>"><?=$value['price'];?></option>
                                <?php } ?>
                            </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <p>Beds :</p>
                            </td>
                            <td>
                                <select name="bed" id="bed">
                                <option value="">No. of Beds</option>
                                <?php foreach ($result as $key => $value) {?>
                                    
                                <option value="<?=$value['id'];?>"><?=$value['bed'];?></option>
                                <?php } ?>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Status :-</p>
                            </td>
                            <td>
                                <input type="radio" name="status" value="Let" id="Rent"/>
                                <label for="Rent">Let</label>
                                <input type="radio" name="status" value="sale" id="ToSale"/>
                                <label for="ToSale">To Sale</label>
                            </td>
                        </tr>
                       <!--  <tr>
                            <td>
                                <p>Status :-</p>
                            </td>
                            <td>
                                <select name="status" id="status">
                                <option value="">Status</option>
                                <?php foreach ($result as $key => $value) {?>
                                    
                                <option value="<?=$value['id'];?>"><?=$value['status'];?></option>
                                <?php } ?>
                            </select>
                            </td>
                        </tr> -->
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="add" value="Search"/>
                            </td>
                        </tr>
                    </table>
                </div><!--END OF H1-->
                <div class="h2">
                    <table>
                        <tr>
                            <td>
                                <h1>Search Results</h1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="http://placehold.jp/250x250.png"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3>Buy Home :- $xxxxx</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="button" value="Read More"/>
                            </td>
                        </tr>
                        </form>
                    </table>
                </div>
            </div><!--END OF HOME-->
           <?php include_once("footer.php");?>
        </div><!--END OF WRAPPER-->     
    </body>
</html>