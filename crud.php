<?php
session_start();
require "connection.php";
$id=$_SESSION['id'];
/* Checks whether user is creating a new account if not then proceed to next if statement*/
if(isset($_REQUEST['submit']))
{
    $name=mysqli_real_escape_string($conn,$_REQUEST['uname']);
    $email=mysqli_real_escape_string($conn,$_REQUEST['uemail']);
    $pass=md5(mysqli_real_escape_string($conn,$_REQUEST['upass']));
    $query="INSERT INTO `user` (`name`,`email`,`pass`)
                        VALUES ('$name','$email','$pass')";
    $result=mysqli_query($conn,$query);
    if(isset($result))
    {
        header("Location:index.php");
    }
    else{
        echo "Your data is not submitted. please retry.";
    }
}
/* Checks whether user is creating a updating details account*/
if(isset($_REQUEST['update']))
{

   
    $name=mysqli_real_escape_string($conn,$_REQUEST['uname']);
    $email=mysqli_real_escape_string($conn,$_REQUEST['uemail']);
    $dob=mysqli_real_escape_string($conn,$_REQUEST['dob']);
    $gender=mysqli_real_escape_string($conn,$_REQUEST['gender']);
    $query="UPDATE `user` SET `name` = '$name',`email` = '$email',`dob` = '$dob',`gender`='$gender' WHERE `id`=$id";
    $result=mysqli_query($conn,$query);
    if(isset($result))
    {
        header("Location:update.php");
    }
    else{
        echo "Data is not updated.";
    }
    
}


?>