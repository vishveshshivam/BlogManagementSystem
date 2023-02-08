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
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $post['short_description']; ?>">
    <meta name="author" content="Vishvesh shivam">
    <title><?php if (isset($post['heading'])) {
                echo $post['heading'];
              } ?></title>
</head>
<body>
    <?php require "loggednav.php"; ?>
    <div class="container">
        <div class="d-flex justify-content-around flex-wrap">
            <!-- First column which includes Post content -->
            <div class="border rounded p-5 w-100">
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
            </div>
        </div>
        <?php
        }
          ?>
        <!-- Second column which includes the 2 latest posts -->
        <div class="border rounded mt-5 p-5 w-100">
            <h5>Latest posts</h5>
            <div class="d-flex justify-content-around flex-wrap">
                <?php
              $query1 = "SELECT * FROM `post` ORDER BY `id` DESC LIMIT 2";
              $result1 = mysqli_query($conn, $query1);
              $row1 = mysqli_num_rows($result1);
              if ($row > 0) {
                while ($latest = mysqli_fetch_assoc($result1)) {
              ?>
                <a href="./view-post.php?id=<?php echo $latest['id'] ?>" class="text-decoration-none text-muted">
                    <div class="card" style="width:400px">
                        <img class="card-img-top" src="<?php echo $latest['thumbnail']; ?>" alt="Thumbnail image">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $latest['heading']; ?></h4>
                            <p class="card-text"><?php echo $latest['short_description'] ?></p>
                            <a href="./view-post.php?id=<?php echo $latest['id'] ?>" class="btn btn-primary mt-3">View
                                Post</a>
                        </div>
                    </div>
                </a>
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
}/* If user is not logged in then redirected to login page */
else{
  header("Location:login.php");
}
  ?>