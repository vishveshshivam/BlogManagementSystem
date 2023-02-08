<?php
session_start();
require "connection.php";
/* Checks if Admin is logged in or not */
if (isset($_SESSION['id'])) {
  $query = "SELECT * FROM `post` ORDER BY `id` DESC";
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
  </head>
  <body>
    <?php require "loggednav.php"; ?>
    <?php
    /* Checks if there is any message from the other webpage if then display the div otherwise it will be hidden */
    if (isset($_REQUEST['message'])) {
    ?>
      <div class="d-flex justify-content-center">
        <div class="alert">
          <div class="alert alert-success" role="alert">
            <?php echo $_REQUEST['message']; ?>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
    <div class="d-flex justify-content-around flex-wrap">
      <?php
      /* Displaying all posts in the website */
      if ($row > 0) {
        while ($posts = mysqli_fetch_assoc($result)) {
      ?>
          <a href="./view-post.php?id=<?php if (isset($posts['id'])) {
                                        echo $posts['id'];
                                      } ?>" class="text-decoration-none text-muted">
            <div class="card mt-5" style="width:400px">
              <img class="card-img-top" src="<?php if (isset($posts['thumbnail'])) {
                                                echo $posts['thumbnail'];
                                              } ?>" alt="Thumbnail image">
              <div class="card-body">
                <h4 class="card-title"><?php if (isset($posts['heading'])) {
                                          echo $posts['heading'];
                                        } ?></h4>
                <p class="card-text"><?php if (isset($posts['short_description'])) {
                                        echo $posts['short_description'];
                                      } ?></p>
                <a href="./update-post.php?id=<?php if (isset($posts['id'])) {
                                                echo $posts['id'];
                                              } ?>" class="btn btn-primary mt-2">Update Post</a>
                &nbsp;
                <a href="./view-post.php?id=<?php if (isset($posts['id'])) {
                                              echo $posts['id'];
                                            } ?>" class="btn btn-success mt-2">View Post</a>
                <a href="./delete-post.php?id=<?php if (isset($posts['id'])) {
                                                echo $posts['id'];
                                              } ?>" class="btn btn-danger mt-2">Delete Post</a>
              </div>
            </div>
          </a>
      <?php
        }
      }
      ?>
    </div>
    <?php require "footer.php"; ?>
  </body>
  </html>
<?php

} /* If Admin is not logged in then redirected to login page */    
else {
  header("Location:login.php");
}
?>