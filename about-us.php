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
    <div>

<h1>About <b>demo</b></h1><br/><br/>


</p>Welcome to demo <span class="text-success"><?php if(isset($_SESSION['name'])){echo $_SESSION['name'];} else {echo "visitor";}?></span>, your number one source for all of queries related to anything. We're dedicated to giving you the very best of Services, with a focus on reliability, Accuracy and faithfulness.<p><br/>
</p>Founded in 2022 by vishvesh , demo has come a long way from its beginnings in india. When vishvesh  first started out, his passion for Demonstration to everyone drove them to quit day job, do tons of research, etc. so that demo can offer you the world's best Demo purposes. We now serve customers all over the world and are thrilled that we're able to turn our passion into our own website.<p><br/>
</p>we hope you enjoy our Services as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.
<p><br/>
</p>Sincerely, vishvesh <p><br/>

<button class="btn btn-primary btn-lg px-4 me-md-2" ><a href="./contact-us.php" class="text-light text-decoration-none">Contact us</a></button>

<br/>

</div>
    </div>
  </div>
  <?php require "footer.php";?>
    <script src="./index.js"></script>
</body>
</html>
