<?php
/* Connecting to the database using mysqli_connect() */
$conn=mysqli_connect("localhost","root","","demo");
if(!$conn)
{
    die("Error in creating database connection");
}
?>