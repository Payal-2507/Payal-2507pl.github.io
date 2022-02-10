<?php
 include_once("connection.php");

 if(!empty($_POST['add'])){
    $email= $_POST['email'];
    $password= $_POST['password'];

    $query="select * from registration where email='$email'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($result);
    
    if(password_verify($password, $row['password'])){
        session_start();
        $_SESSION['id']=$row['id'];
        $_SESSION['person']=$row['person'];
        //print_r($_SESSION['person']);
        echo "<script>window.location.href='home.php'</script>";
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
            <?php include_once("header.php");?><!--END OF MENU-->
            <!--CONTENT START -->
    <div class="Signin">
            <form method="POST">
            <table>
                <tr>
                    <td>
                        <h1>Sign In</h1>
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
                    <td></td>
                    <td>
                        <input type="submit" name="add" value="Login"/>
                    </td>
                </tr>
                </table>
            </form>
    </div><!--END OF SIGNIN-->        
            <!--END OF CONTENT-->    
            <?php include_once("footer.php");?>
        </div><!--END OF WRAPPER-->     
    </body>
</html>