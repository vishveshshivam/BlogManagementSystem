<?php
session_start();
require "connection.php";
/* Checks if Admin is logged in or not */
if (isset($_SESSION['id'])) {
    if (isset($_REQUEST['update-post'])) {

        $id = mysqli_real_escape_string($conn, $_REQUEST['id']);
        $heading = mysqli_real_escape_string($conn, $_REQUEST['heading']);
        $short_description = mysqli_real_escape_string($conn, $_REQUEST['post-short-description']);
        $post_description = mysqli_real_escape_string($conn, $_REQUEST['post-description']);
        /* Checks if new thumbnail image is submitted with the form then uploads it to server */
        if (!empty($_FILES["image"]["name"])) {
            $error = "";
            $target_dir = "./uploads/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $error = $error . "File is not an image.<br>";
                $uploadOk = 0;
            }
            if ($_FILES["image"]["size"] > 500000) {
                $error = $error . "Sorry, your file is too large.<br>";
                $uploadOk = 0;
            }
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" && $imageFileType != "webp"
            ) {
                $error = $error . "Sorry, only JPG, JPEG, WEBP,  PNG & GIF files are allowed.<br>";
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                $error = $error . "Sorry, your file was not uploaded.<br>";
            } else {
                /* Uploading image to the folder */
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $url = "http://" . $_SERVER['SERVER_NAME'] . "/industrial/admin-demo/uploads/" . $_FILES["image"]["name"];
                    $query = "UPDATE `post` SET `heading`='$heading',
                                      `short_description`='$short_description',
                                      `description`='$post_description',
                                      `thumbnail`='$url' 
                                      WHERE 
                                      `id`=$id";
                    $result = mysqli_query($conn, $query);
                    if (!$result) {
                        $error = $error . "Post is not updated<br>";
                        echo "error";
                    } else {
                        $echo = "Post is updated";
                        header("Location:update-post.php?id=$id&result=$echo");
                    }
                } else {
                    $error = $error . "Sorry, there was an error uploading your post.";
                    echo "error";
                }
            }
        } else {
            $query = "UPDATE `post` SET `heading`='$heading',
                                  `short_description`='$short_description',
                                  `description`='$post_description'
                                   WHERE 
                                   `id`=$id";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                $error = $error . "Post is not updated<br>";
            } else {
                $echo = "Post is updated";
                header("Location:update-post.php?id=$id&result=$echo");
            }
        }
    }
} /* If Admin is not logged in then redirected to login page */   
else {
    header("Location:login.php");
}
