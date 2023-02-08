<?php
session_start();
require "connection.php";
/* Checks if Admin is logged in or not */
if (isset($_SESSION['id'])) {
  $id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  /* Getting the data from the database of the post to be updated*/ 
  $data_query = "SELECT * FROM `post` WHERE `id`=$id";
  $result = mysqli_query($conn, $data_query);
  $row = mysqli_num_rows($result);
  if ($row == 1) {
    $data_row = mysqli_fetch_assoc($result);
    $heading = $data_row['heading'];
    $short_description = $data_row['short_description'];
    $post_description = $data_row['description'];
    $thumbnail = $data_row['thumbnail'];
  } else {
    echo "Not updated";
  }
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
    $check = getimagesize($_FILES["post-image"]["tmp_name"]);
    if ($check !== false) {
      $uploadOk = 1;
    } else {
      $error = $error . "File is not an image.<br>";
      $uploadOk = 0;
    }
    if ($_FILES["post-image"]["size"] > 500000) {
      $error = $error . "Sorry, your file is too large.<br>";
      $uploadOk = 0;
    }
    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" && $imageFileType != "webp"
    ) {
      $error = $error . "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
      $uploadOk = 0;
    }
    if ($uploadOk == 0) {
      $error = $error . "Sorry, your file was not uploaded.<br>";
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
    <title>Update post</title>
<body>
    <?php require "loggednav.php"; ?>
    <br><br>
    <?php
    if (isset($_REQUEST['result'])) {
    ?>
    <div class="d-flex justify-content-center">
        <div class="alert">
            <div class="alert alert-success" role="alert">
                <?php echo $_REQUEST['result']; ?>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <!-- Modal to upload new image-->
    <div id="uploadimage" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload image</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                        enctype="multipart/form-data">
                        <div class="mb-3">
                            <input class="form-control" type="text" name="id" id="id"
                                value="<?php if(isset($id)) {echo $id;}?>" hidden>
                            <label for="post-image" class="form-label">Select image</label>
                            <input class="form-control" type="file" name="post-image" id="post-image">
                        </div>
                        <div class="mb-3">
                            <input class="btn btn-primary" type="submit" name="upload-post-image">
                            <!-- upload image button -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Modal to Show uploaded images -->
    <div id="showimage" class="modal fade " role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">All the images uploaded</h4>
                </div>
                <div class="modal-body">
                    <?php
                    /* Selecting all the images from `image` table */ 
            $show_image_query = "SELECT * FROM `images` ORDER BY `id` DESC";
            $show_image_result = mysqli_query($conn, $show_image_query);
            $no_of_images = mysqli_num_rows($show_image_result);
            if ($no_of_images > 0) {
              while ($image = mysqli_fetch_assoc($show_image_result)) {
                echo "<figure>";
                echo "<img src='" . $image['url'] . "' height='100' width='100'> &nbsp;";
                echo "<figcaption><pre><code id='image-url'>&lt;div class='container-fluid d-flex justify-content-center' style='height:250px; width:inherit;'&gt;
                &lt;img src='".$image['url']."' class='img-fluid' alt='Thumbnail image'&gt;
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
        <!-- Form to update the post with prefilled existing content in the various fields of the post -->
        <form action="update-post-submission.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="text" class="form-control" id="id" name="id" value="<?php if (isset($id)) { echo $id; } ?>" hidden>
            </div>
            <div class="mb-3">
                <label for="heading" class="form-label">Heading</label>
                <input type="text" class="form-control" id="heading" name="heading"
                    placeholder="Do you know who is john doe?"
                    value="<?php if (isset($heading)) { echo $heading;  } ?>">
            </div>
            <div class="mb-3">
                <label for="short-description" class="form-label">Short Description</label>
                <textarea class="form-control" id="short-description" name="post-short-description" rows="3"><?php if (isset($short_description)) { echo $short_description; } ?></textarea>
            </div>
            <div class="mb-3">
                <label for="post" class="form-label">Post Description</label>
                <textarea class="form-control" id="post" name="post-description" rows="15"><?php if (isset($post_description)) {  echo $post_description;  } ?></textarea>
            </div>
            <div class="mb-3">
                <label for="thumb-image" class="form-label">Thumbnail image</label>
                <input class="form-control" type="file" name="image" id="thumb-image">
                <div class="mb-3">
                    <?php if (isset($thumbnail)) {
              echo "<p>Uploaded thumbnail<p><img src='" . $thumbnail . "' height='200' width='250'>";
            } else {
              echo "<p>Image is not uploaded yet.</p>";
            } ?>
                </div>
            </div>
            <button class="btn btn-primary mb-3" type="submit" name="update-post">Update post</button>
            <!-- update post button -->
    </div>
    </form>
    <?php require "footer.php";?>
</body>
</html>
<?php
}/* If Admin is not logged in then redirected to login page */  
else {
  header("Location:login.php");
}
?>