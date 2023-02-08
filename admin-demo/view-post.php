<?php
session_start();
require "connection.php";
/* Checks if user is logged in or not */
if (isset($_SESSION['id'])) {
  $id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $query = "SELECT * FROM `post` WHERE `id`=$id";
  $result = mysqli_query($conn, $query);
  $row = mysqli_num_rows($result);

  if ($row == 1) {
    $post = mysqli_fetch_assoc($result);
    $date = strtotime($post['date']);


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?php if (isset($post['heading'])) {
                echo $post['heading'];
              } ?></title>
    </head>

    <body>
      <?php require "loggednav.php"; ?>
     
      <div class="container">
      <div class="d-flex justify-content-between sticky-top" ><a href="./delete-post.php?id=<?php if (isset($post['id'])) {
                                              echo $post['id'];
                                            } ?>" class="btn btn-danger mt-2">Delete Post</a><a href="./update-post.php?id=<?php if (isset($post['id'])) {
                                              echo $post['id'];
                                            } ?>" class="btn btn-success mt-2">Update Post</a>  
      </div>
        <div class="d-flex justify-content-around flex-wrap">
        
          <!-- First column which includes Post Content -->
          <div class="border rounded p-1   w-100">
            <h1><?php if (isset($post['heading'])) {
                  echo $post['heading'];
                } ?>
            </h1>
            <small>
            <dl class="row small-text">
              <dt class="col-sm-3">Published By</dt>
              <dd class="col-sm-9">Vishvesh (Admin)</dd>
              <dt class="col-sm-3">Published on</dt>
              <dd class="col-sm-9"><?php echo date("d-m-Y", $date); ?></dd>

            </dl>
              </small>
              
            <div class="container-fluid d-flex justify-content-center" style="height:250px; width:inherit;">
              <img src="<?php echo $post['thumbnail']; ?>" class="img-fluid" alt="Thumbnail image">
            </div>
            <div class="container-fluid">
              <?php echo $post['description']; ?>
            </div>
            <div class="author mt-5">
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      About Author
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>I am pursuing diploma in Computer Science Engineering.</strong> I am PHP Developer. I lives in Himachal Pradesh.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <?php
        }
          ?>

          <!-- Second column which includes 2 latest post -->
          <div class="border rounded mt-5 p-1 w-100">
            <h2>Latest posts</h2>
            <div class="d-flex justify-content-around flex-wrap">
              <?php
              $query1 = "SELECT * FROM `post` ORDER BY `id` DESC LIMIT 2";
              $result1 = mysqli_query($conn, $query1);
              $row1 = mysqli_num_rows($result1);
              if ($row > 0) {
                while ($latest = mysqli_fetch_assoc($result1)) {

              ?>
                  <a href="./view-post.php?id=<?php echo $latest['id'] ?>" class="text-decoration-none text-muted"><div class="card" style="width:400px">
                    <img class="card-img-top" src="<?php echo $latest['thumbnail']; ?>" alt="Thumbnail image">
                    <div class="card-body">
                      <h4 class="card-title"><?php echo $latest['heading']; ?></h4>
                      <p class="card-text"><?php echo $latest['short_description'] ?></p>

                      <a href="./view-post.php?id=<?php echo $latest['id'] ?>" class="btn btn-primary mt-3  ">View Post</a>
                    </div>
                  </div></a>
              <?php
                }
              }
              ?>
            </div>
          </div>
          </div>
        </div>
        <br><br>
        <?php require "footer.php"; ?>
    </body>

    </html>
  <?php

}else{
  header("Location:login.php");
}
  ?>