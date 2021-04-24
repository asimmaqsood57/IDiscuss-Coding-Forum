<?php


session_start();

// if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ) {
//   # code...
// }

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="index.php">IDiscuss</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Top Categories
        </a>
        
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        ';  
        
$sql = "SELECT `catefory_name`, `category_id` FROM `categories` limit 3";

$result = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($result)) {
  

  echo '<a class="dropdown-item" href="/IforumProject/_threads.php?catid='.$row['category_id'].'">'.$row['catefory_name'].'</a>';
  
}

echo '
</ul>
      <li class="nav-item">
        <a class="nav-link " href="#" tabindex="-1" >Disabled</a>
      </li>
    </ul>
      ';
      
      echo '<form action="search.php" method="GET" class="d-flex">
      <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success mr-3" type="submit">Search</button>
      
      </form>';
      
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ) {
    
    echo    '
    <i  class="mx-3 text-light"> welcome '.$_SESSION['useremail'].' </i>
    <a href="_logout.php" class="btn btn-outline-success mx-2 "  >Log out</a>
    
    
    ';
    
    
    
  }else {
    
    
        echo '
        <div class="d-flex">
        <button class="btn btn-outline-success mx-2 " data-bs-toggle="modal" data-bs-target="#loginmodal" >Log in</button>
        <button class="btn btn-outline-success "  data-bs-toggle="modal" data-bs-target="#signupmodal" >Sign up</button>
   
        </div>
  
  
  ';
      }


  echo ' 
    </div>
  </div>
  </nav>';
      
      

include '_signin.php';
include '_signup.php';


if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You have successfully registered.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}

// if (!isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false")
// {
  
//   echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
//   <strong>Error!</strong>You have written invalid Information.
//   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
// </div>';


// }



?>