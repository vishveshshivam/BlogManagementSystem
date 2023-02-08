<?php
session_start();
require "connection.php";
/* Checks if user is logged in or not */
if (isset($_SESSION['id'])) {
  $query = "SELECT * FROM `post` ORDER BY `id` DESC";/* selecting data from database */
  $result = mysqli_query($conn, $query);
  $row = mysqli_num_rows($result);
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    
<body>
<?php require "loggednav.php";?>
<br><br>
<div class="d-flex justify-content-around flex-wrap">
<?php 
/* Displays the blog posts in loop*/
if ($row > 0) {
  while($posts = mysqli_fetch_assoc($result))
  {

   
 ?>
<a href="./view-post.php?id=<?php if(isset($posts['id'])){echo $posts['id'];}?>" class="text-decoration-none text-muted"><div class="card mt-5" style="width:400px">
  <img class="card-img-top" src="<?php if(isset($posts['thumbnail'])){echo $posts['thumbnail'];}?>" alt="Thumbnail image">
  <div class="card-body">
    <h4 class="card-title"><?php if(isset($posts['heading'])){echo $posts['heading'];}?></h4>
    <p class="card-text"><?php if(isset($posts['short_description'])){echo $posts['short_description'];}?></p>
    <a href="./view-post.php?id=<?php if(isset($posts['id'])){echo $posts['id'];}?>" class="btn btn-primary">View Post</a>
  </div>
</div></a>

<?php
 }
}
/* Loop ends here */
?>

</div>
<?php require "footer.php";?>
</body>
</html>
<?php
/* If user is not logged in then redirected to login page */
} else{
  header("Location:login.php");
}
?>