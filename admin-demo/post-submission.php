<?php
session_start();
require "connection.php";
/* Checks if Admin is logged in or not */
if (isset($_SESSION['id'])) {
    if (isset($_REQUEST['upload-post'])) {
        $heading = mysqli_real_escape_string($conn, $_REQUEST['heading']);
        $short_description = mysqli_real_escape_string($conn, $_REQUEST['post-short-description']);
        $post_description = mysqli_real_escape_string($conn, $_REQUEST['post-description']);
        $timestamp = date("Y-m-d H:i:s");
        $error = "";
        $target_dir = "./uploads/";
        $target_file = $target_dir . basename($_FILES["thumb-image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["thumb-image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $error = $error . "File is not an image.<br>";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["thumb-image"]["size"] > 500000) {
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
            if (move_uploaded_file($_FILES["thumb-image"]["tmp_name"], $target_file)) {
                $url = "http://" . $_SERVER['SERVER_NAME'] . "/industrial/admin-demo/uploads/" . $_FILES["thumb-image"]["name"];
                $query = "INSERT INTO `post`(`heading`, `short_description`, `description`, `thumbnail`) VALUES ('$heading','$short_description','$post_description','$url')";
                $result = mysqli_query($conn, $query);
                if (!$result) {
                    $error = $error . "Post is not uploaded<br>";
                    echo "error";
                } else {
                    $echo = "Post is uploaded";
                    header("Location:posts.php");
                }
            } else {
                $error = $error . "Sorry, there was an error uploading your post.";
            }
        }
    }
} /* If Admin is not logged in then redirected to login page */   
else{
    header("Location:login.php");
}
