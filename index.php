<?php
session_start();
require "connection.php";
/* Checks if user is logged in or not */
if(isset($_SESSION['id']))
{
    $id=$_SESSION['id'];
    $query="SELECT * FROM `user` WHERE `id`=$id";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0)
    {
        $row=mysqli_fetch_assoc($result);
        $email=$row['email'];
        $name_array=explode(' ',$row['name']);
        $name=$name_array[0];
        $_SESSION['name']=$name;
        $_SESSION['email']=$email;
        $_SESSION['pic']=$row['profilepic'];
        $_SESSION['gender']=$row['gender'];
        $_SESSION['dob']=date("Y-m-d",strtotime($row['dob']));
    }
}
/* If user is not logged in then redirected to login page */
else{
    header("Location:login.php");
}
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
        <img src="./images/homepage-header.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3">Welcome <span class="text-success"><?php if(isset($_SESSION['name'])){echo $_SESSION['name'];} ?></span>   to our demo website.</h1>
        <p class="lead">This website is for only demo purpose.Any content here is not reliable.We have just tried to create a  website as a backend developer.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <p class="lead">we want that you must have correct and large technological knowledge as compared to other websites offering same type of services.So, be with us and stay tuned everyday.</p>
        </div>
        <button class="btn btn-primary btn-lg px-4 me-md-2" ><a href="./posts.php" class="text-light text-decoration-none">View Blog</a></button>
      </div>
    </div>
  </div><?php require "footer.php";?>
  <script src="./index.js"></script>
</body>
</html>
