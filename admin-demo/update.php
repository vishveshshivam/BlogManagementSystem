<?php
session_start();
require "connection.php";
/* Checks if Admin is logged in or not */
if(isset($_SESSION['id']))
{
    $id=$_SESSION['id'];
    $query="SELECT * FROM `admin` WHERE `id`=$id";
    $result=mysqli_query($conn,$query);
    if(isset($result))
    {
        $row=mysqli_fetch_assoc($result);
        $name=$row['name'];
        $email=$row['email'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
</head>
<body>
<?php require "loggednav.php";?>
    <div class="container">
		<div class="main-body">
			<div class="row">
				<!-- Displaying the details of the Admin -->
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="<?php if(isset($_SESSION['pic'])){echo $_SESSION['pic'];} else{ echo './images/profile.png';}?>" alt="<?php if(isset($name)){echo $name;} else{ echo"";}?>-profile pic" class="rounded p-1 bg-primary" width="200">
								<div class="mt-3">
									<h4><?php if(isset($name)){echo $name;} else{ echo"";}?></h4>
								</div>
							</div>
							<hr class="my-4">
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0">Name</h6>
									<span class="text-secondary"><?php if(isset($name)){echo $name;} else{ echo"";}?></span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0">Email</h6>
									<span class="text-secondary"><?php if(isset($email)){echo $email;} else{ echo"";}?></span>
								</li>
							</ul>
						</div>
					</div>
				</div>
                <!-- Displaying the details of the Admin with the input box to  update them -->
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
                        <form action="crud.php" method="post">
							<div class="row mb-3">
								<div class="col-sm-3">
									<label for="name"><h6 class="mb-0">Full Name</h6></label>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="name" id="name" class="form-control" value="<?php if(isset($name)){echo $name;} else{ echo"";}?>" tabindex="1">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<label for="email"><h6 class="mb-0">Email</h6></label>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="email" id="email" class="form-control" value="<?php if(isset($email)){echo $email;} else{ echo"";}?>" tabindex="2">
								</div>
							</div>
							
							
							
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4" value="Save Changes" name="update" tabindex="7">
								</div>
							</div>
						</div>
					</div>
				</div>
            </form>
			</div>
		</div>
	</div>
	<?php require "footer.php";?>
    <script src="./index.js"></script>
</body>
</html>
<?php
}
else{
    echo "An error occurred.";
}
/* If Admin is not logged in then redirected to login page */ 
} else{
    header("Location:login.php");
}
?>