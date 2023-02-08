<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <style>
        .fa-solid { 
        color: white;
        height: 20px;
        width: 20px;
     }
     #nav-pic{
        border: 2px solid Dodgerblue;
     }
        </style>
  </head>
  <body>
  <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start bg-dark mb-md-5">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-10">
          <li><a href="./index.php" class="nav-link px-2 link-light">Home</a></li>
          <li><a class="nav-link px-2 link-light" href="create-post.php">Create New post</a></li>
            <li><a class="nav-link px-2 link-light" href="posts.php">View Posts</a></li>
        </ul>

        <div class="dropdown text-end me-md-5">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
          <span class="text-light"><?php if(isset($_SESSION['name'])){echo $_SESSION['name'];} ?></span> <img src="./images/profile.png" alt="mdo" width="32" height="32" class="rounded-circle" id="nav-pic">
          </a>
          <ul class="dropdown-menu text-small">
            <li><a class="dropdown-item" href="update.php">Update Your details</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
          </ul>
        </div>
      </div>


</div>
</nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>