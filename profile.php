<?php
session_start();
require "connection.php";
/* Checks if user is logged in or not */
if(isset($_SESSION['id']))
{
    $id=$_SESSION['id'];
    $query="SELECT * FROM `user` WHERE `id`=$id";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1)
    {
        $row=mysqli_fetch_assoc($result);
        $name=$row['name'];
        $email=$row['email'];
        $pass=$row['pass'];
        $pic=$row['profilepic'];
        $dob=$row['dob'];
        $gender=$row['gender'];
    }
    /* Function to delete previous image from the database and  file system using url */
    function delete_image($url)
    {   require "connection.php";
        $id=$_SESSION['id'];
        /* unlink() function is used to delete file from the folder */
        if (!unlink($url)) {
            echo ("$url cannot be deleted due to an error");
        }
        $query="UPDATE `user` SET `profilepic`='NULL' WHERE `id`=$id";
        $result=mysqli_query($conn,$query);
    }
    if(isset($_REQUEST['save']))
    {       
        

        
            $error="";
            $target_dir = "./images/";
            
            $filename_without_ext = substr($_FILES["pic"]["name"], 0, strrpos($_FILES["pic"]["name"], "."));
            $OriginalFilename = $FinalFilename = preg_replace('`[^a-z0-9-_.]`i','',$_FILES['pic']['name']);
            /*pathinfo() returns the information about the file path like pathinfo_dirname, BASENAME, EXTENSION, FILENAME. */
            $parts=pathinfo($FinalFilename);
            /*getting the extension of the file */
            $Extension = $parts['extension'];
            /*creating unique filename by salting current date and time inside the file name*/
            $image_name = $filename_without_ext . date("dmyhis") ."." . $Extension;
            $target_file = $target_dir .$image_name;
            $uploadOk = 1;
            /*getting the extension of the file to determine the type of file
            */
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            
            $check = getimagesize($_FILES["pic"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $error= $error."File is not an image.<br>";
                $uploadOk = 0;
            }
            

            // Check file size less than 500kb
            if ($_FILES["pic"]["size"] > 500000) {
                $error= $error."Sorry, your file is too large.<br>";
            $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && $imageFileType != "webp" ) {
                $error= $error."Sorry, only JPG, JPEG, PNG & GIF Webp files are allowed.<br>";
            $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $error= $error."Sorry, your file was not uploaded.<br>";
            // if everything is ok, try to upload file
            } else {
            if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
                delete_image("$pic");
                $query="UPDATE `user` SET `profilepic`='$target_file' WHERE `id`=$id";
                $result=mysqli_query($conn,$query);
                if(!$result)
                {
                    $error= $error."Profile pic is not updated<br>";
                }
                else{
                    $success="Profile pic is updated.";
                    header("Location:./profile.php");
                }
                
            } else {
                $error= $error."Sorry, there was an error uploading your file.";
            }
            }
        
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
    <style>
        #profilepic {
	height: 200px;
	width: 200px;
    border-radius: 50%;
    object-fit: cover;
    border:5px solid Dodgerblue;
	
}
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: white;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform: scale(0.1)} 
  to {transform: scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
.error-form {
	color: red;
}
.success-form{
	color: rgb(1, 116, 35);
}
        </style>

</head>
<body>
<?php require "loggednav.php";?>
<!-- Popup Modal for larger view of the profile picture -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption">Click X to close popped view</div>
</div>
<!-- END of popup view -->
<div class="container">
  <!-- Form for showing details and updating the profile pic -->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
        <center><img src="<?php if(isset($pic)){echo $pic;} else{ echo './images/profile.png';}?>" alt="Click on X to close" id="profilepic"><center><br>
        <span>Click on picture to see full profile pic</span><br><br>
        <label for="pic">Update Profile picture</label><br>
        <input type="file" name="pic" id="pic"><br>
        <label for="uname">Name</label><br>
        <input type="text" name="uname" id="uname" value="<?php if(isset($name)){echo $name;} else{ echo"";}?>" disabled><br>
        <label for="uemail">E-Mail</label><br>
        <input type="text" name="uemail" id="uemail" value="<?php if(isset($email)){echo $email;} else{ echo"";}?>" disabled><br>
        <label for="dob">DOB</label><br>
        <input type="text" name="dob" id="dob" value="<?php if(isset($dob)){echo $dob;} else{ echo"N/A";}?>" disabled><br>
        <label for="gender">Gender</label><br><?php if(isset($gender)){if($gender=="male") {echo "Male";}}?>
         <?php if(isset($gender)){if($gender=="female") {echo "Female";}}?>
         <?php if(isset($gender)){if($gender=="other") {echo "Other";}} else { echo "N/A";}?><br><br>
        <div class="message"><?php if(isset($error)){echo "<p class='error-form'>".$error."</p>";} else{ echo"";}?>
            <?php if(isset($success)){echo "<p class='success-form'>".$success."</p>";} else{ echo"";}?>
        </div><br>
        
        <input type="submit" value="Update Profile pic" name="save"><br>
    </form>

    </div> 
    <!-- END of form -->
  <?php require "footer.php";?>
    <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('profilepic');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
 <script src="./index.js"></script>
</body>
</html>
