<?php
session_start();
require "connection.php";
$id=$_SESSION['id'];
/* Checks whether Admin is creating a updating details account*/
if(isset($_REQUEST['update']))
{

   
    $name=mysqli_real_escape_string($conn,$_REQUEST['name']);
    $email=mysqli_real_escape_string($conn,$_REQUEST['email']);
    $dob=mysqli_real_escape_string($conn,$_REQUEST['dob']);
    $gender=mysqli_real_escape_string($conn,$_REQUEST['gender']);
    $query="UPDATE `admin` SET `name` = '$name',`email` = '$email' WHERE `id`=$id";
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