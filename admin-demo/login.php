<?php
session_start();
require "connection.php"; 
/* Checks if Admin is logged in or not */  
if(isset($_SESSION['id']))
{
    header("Location:index.php");
}
/* check if user is logging in */
if(isset($_REQUEST['login']))
{
    $email=mysqli_real_escape_string($conn,$_REQUEST['email']);
    $pass=md5(mysqli_real_escape_string($conn,$_REQUEST['pass']));
    $query="SELECT * FROM `admin` WHERE `email`='$email' AND `pass`='$pass'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_num_rows($result);
    if($row==1)
    {
      
        $array=mysqli_fetch_assoc($result);
        $_SESSION['id']=$array['id'];
        header("Location:index.php");
    }
    else
    {
        $error= "<h2 class='error-form'>Credentials do not match</h2>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>form</title>
</head>
<body>
<?php require "./navbar.php";?>
<div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <center><h2>Login</h2></center>
        <label for="email">E-Mail</label><br>
        <input type="email" name="email" id="email" required><br>
        <label for="pass">Password</label><br>
        <input type="password" name="pass" id="pass" required><br>
        <div class="message"><?php if(isset($error)){echo $error;} else{ echo"";}?></div>
        <input type="submit" value="Log in" name="login"><br>
    </form>
</div> 
<?php require "footer.php";?>
<script src="./index.js"></script>
</body>
</html>