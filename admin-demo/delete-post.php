<?php
session_start();
require "connection.php";
$id=$_REQUEST['id'];
    $query="DELETE FROM `post` WHERE `id`=$id";
    $result=mysqli_query($conn,$query);
    if(isset($result))
    {
        header("Location:posts.php?message=Deleted");
    }
    else{
        header("Location:posts.php?message=Not-deleted");
    }

?>