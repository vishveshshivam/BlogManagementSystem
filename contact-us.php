<?php
session_start();
require "connection.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<?php require "loggednav.php";?>
    <div class="container col-xxl-8 px-4 py-5 rounded-3 border shadow-lg mb-md-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="./images/homepage-hero.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3">Hey, <span class="text-success"><?php if(isset($_SESSION['name'])){echo $_SESSION['name'];} ?></span></h1>
        <p class="lead">You can contact us by the methods mentioned  below : </p>
        <p class="lead">email : <a href="mailto:vishvesh482003@gmail.com" style="text-decoration-line: none;">vishvesh482003@gmail.com</a></p>
        <p class="lead">Phone : (+91) 9876543210</p>
        <p class="lead">Address : Sarkaghat, Mandi, Himachal Pradesh, India (175024)</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        </div>
      </div>
    </div>
  </div>
  <?php require "footer.php";?>
    <script src="./index.js"></script>
</body>
</html>
