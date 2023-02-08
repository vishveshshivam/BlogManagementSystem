<?php
session_start();
require "connection.php"; 
/* Checks whether user already has a running session than redirects to the index page*/  
if(isset($_SESSION['id']))
{
    header("Location:index.php");
}
/* Checks whether user is Trying to login to his/her account */
if(isset($_REQUEST['login']))
{
    /* mysqli_real_escape_string() escape the special characters like \n, \r, \, ', ", to be used inside SQL statement*/
    $email=mysqli_real_escape_string($conn,$_REQUEST['email']);
    /* md5() converts character of a string into their equivalent 32-bit hexadecimal codes */
    $pass=md5(mysqli_real_escape_string($conn,$_REQUEST['pass']));
    $query="SELECT * FROM `user` WHERE `email`='$email' AND `pass`='$pass'";
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
    <!-- Login form -->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <center><h2>Login</h2></center>
        <label for="uemail">E-Mail</label><br>
        <input type="email" name="email" id="uemail" required><br>
        <label for="upass">Password</label><br>
        <input type="password" name="pass" id="upass" required>
        <i class="bi bi-eye-slash" id="togglePassword"></i><br>
        <div class="message"><?php if(isset($error)){echo $error;} else{ echo"";}?></div>
        <input type="submit" value="Log in" name="login"><br>
        <span>Do not have an account <a href="signup.php" id="extra">Create Now</a></span>
    </form>
    <!-- END of login form -->
</div> 
<?php require "footer.php";?>
    <script src="./index.js"></script> 
</body>
</html>