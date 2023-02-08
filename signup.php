<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>form</title>
</head>
<body>
<?php require "./navbar.php";?>
<div class="container">
    <!-- Signup form -->
    <form action="crud.php" method="post">
        <center><h2>Sign Up</h2></center>
        <label for="uname">Name</label><br>
        <input type="text" name="uname" id="uname"required><br>
        <label for="uemail">E-Mail</label><br>
        <input type="email" name="uemail" id="uemail" required><br>
        <label for="upass">Password</label><br>
        <input type="password" name="upass" id="upass" required>
        <i class="bi bi-eye-slash" id="togglePassword"></i><br>
        <div class="message"></div>
        <input type="submit" value="Submit" name="submit"><br>
        <p>Already have an account <a href="./login.php" id="extra">click here</a></p>
    </form>
    <!-- END of signup form -->
    </div>
    <?php require "footer.php";?>
    <script src="./index.js"></script>
</body>
</html>