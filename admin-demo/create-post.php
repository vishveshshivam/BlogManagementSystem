<?php
session_start();
require "connection.php";
/* Checks if Admin is logged in or not */
if (isset($_SESSION['id'])) {
    /*Checks if the the admin is uploading a new image */
  if (isset($_REQUEST['upload-post-image'])) {
    $error = "";
    $target_dir = "./uploads/";
    $filename_without_ext = substr($_FILES["post-image"]["name"], 0, strrpos($_FILES["post-image"]["name"], "."));
    $OriginalFilename = $FinalFilename = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['post-image']['name']);
    $parts=pathinfo($FinalFilename);
    $Extension = $parts['extension'];
    $image_name = $filename_without_ext . date("dmyhis") ."." . $Extension;
    $target_file = $target_dir .$image_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["post-image"]["tmp_name"]);
    if ($check !== false) {
      $uploadOk = 1;
    } else {
      $error = $error . "File is not an image.<br>";
      $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["post-image"]["size"] > 500000) {
      $error = $error . "Sorry, your file is too large.<br>";
      $uploadOk = 0;
    }
    // Allow certain file formats
    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" && $imageFileType != "webp"
    ) {
      $error = $error . "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
      $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      $error = $error . "Sorry, your file was not uploaded.<br>";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["post-image"]["tmp_name"], $target_file)) {
        $url = "http://" . $_SERVER['SERVER_NAME'] . "/industrial/admin-demo/uploads/" . $image_name;
        $query = "INSERT INTO `images` (`url`) VALUES ('$url')";
        $result = mysqli_query($conn, $query);
        if (!$result) {
          $error = $error . "Image is not uploaded<br>";
        } else {
          $success = "Image is uploaded.";
        }
      } else {
        $error = $error . "Sorry, there was an error uploading your image.";
      }
    }
  }
?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create post</title>
  <body>
    <?php require "loggednav.php"; ?>
    <br><br>
    <!-- Modal to Upload image -->
    <div id="uploadimage" class="modal fade" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Upload image</h4>
          </div>
          <div class="modal-body">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="post-image" class="form-label">Select image</label>
                <input class="form-control" type="file" name="post-image" id="post-image" required>
              </div>
              <div class="mb-3">
                <input class="btn btn-primary" type="submit" name="upload-post-image" required>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Show images -->
    <div id="showimage" class="modal fade " role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">All the images uploaded</h4>
          </div>
          <div class="modal-body">
            <?php
            $show_image_query = "SELECT * FROM `images` ORDER BY `id` DESC";
            $show_image_result = mysqli_query($conn, $show_image_query);
            $no_of_images = mysqli_num_rows($show_image_result);
            if ($no_of_images > 0) {
              while ($image = mysqli_fetch_assoc($show_image_result)) {
                echo "<figure>";
                echo "<img src='" . $image['url'] . "' height='100' width='100'> &nbsp;";
                echo "<figcaption><pre><code id='image-url'>&lt;div class='container-fluid d-flex justify-content-center' style='height:250px; width:inherit;'&gt;
                &lt;img src='" . $image['url'] . "' class='img-fluid' alt='Thumbnail image'&gt;
              &lt;/div&gt;</code></pre></figcaption>";
                echo "</figure>";
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="d-flex flex-row justify-content-around">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadimage">Upload image</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#showimage">View images</button>
      </div>
      <!-- Form for Uploading new post -->
      <form method="post" action="post-submission.php" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="heading" class="form-label">Heading</label>
          <input type="text" class="form-control" id="heading" name="heading" placeholder="Do you know who is john doe?" required>
        </div>
        <div class="mb-3">
          <label for="short-description" class="form-label">Short Description</label>
          <textarea class="form-control" id="short-description" name="post-short-description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
          <label for="post" class="form-label">Post Description</label>
          <textarea class="form-control" id="post" name="post-description" rows="15" required></textarea>
        </div>
        <div class="mb-3">
          <label for="thumb-image" class="form-label">Thumbnail image</label>
          <input class="form-control" type="file" name="thumb-image" id="thumb-image" required>
        </div>
        <button class="btn btn-primary mb-3" type="submit" name="upload-post">Upload post</button>
    </div>
    </form>
    <?php require "footer.php"; ?>
  </body>
  </html>
<?php
} /* If Admin is not logged in then redirected to login page */    
else {
  header("Location:login.php");
}
?>