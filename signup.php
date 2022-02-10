<?php include_once("connection.php");

if(!empty($_POST['add'])){
    $person = $_POST['person'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $cpassword = password_hash($_POST['cpassword'],PASSWORD_DEFAULT);
    $query = "insert into registration(person,email,password,cpassword)values('$person','$email','$password', '$cpassword')";
      $result=mysqli_query($conn,$query);

      if($result){ 
    header("location:login.php");
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
                <!--END OF MENU-->
            <!--SIGNUP START-->
            <div class="signup">
                <form method="POST">
                <table>
                    <tr>
                        <td>
                            <h1>Register Here</h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Register As</p>
                        </td>
                        <td>
                            <input type="radio" name="person" id="Agent" value="Agent"/>    
                            <label for="Agent">Agent</label>
                        </td>
                        <td>
                            <input type="radio" name="person" id="user" value="User"/>
                            <label for="User">User</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Email</p>
                        </td>
                        <td>
                            <input type="text" name="email" placeholder="Email-address"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Password</p>
                        </td>
                        <td>
                            <input type="password" name="password" placeholder="Enter Password"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Confirm Password</p>
                        </td>
                        <td>
                            <input type="password" name="cpassword" placeholder="Confirm Password"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input type="submit" value="submit" name="add"/>
                        
                            <input type="reset" value="Cancel" name="Cancel"/>
                        </td>
                    </tr>
                </table>
                </form>
            </div>          
            <!--SIGNUP END-->
            <?php include_once("footer.php");?>

        </div><!--END OF WRAPPER-->     
    </body>
</html>