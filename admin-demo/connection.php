<?php
/*Connecting to database */
$conn=mysqli_connect("localhost","root","","demo");
if(!$conn)
{
    die("Error in creating database connection");
}
?>