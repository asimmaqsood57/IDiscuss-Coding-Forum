<?php

include '_connect_to_database.php';

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <title>IDiscuss Coding</title>
</head>

<body>

  <?php

  include '_navbar.php';

  ?>


  <?php

  $id = $_GET['catid'];

  $sql = "SELECT * FROM `categories` WHERE `category_id` = $id";

  $result = mysqli_query($con, $sql);

  while ($row = mysqli_fetch_assoc($result)) {

    $catname = $row['catefory_name'];
    $catdesc = $row['category_description'];
  }





  ?>



  <?php


  $method = $_SERVER['REQUEST_METHOD'];

  $showAlert = false;
  if ($method == 'POST') {
    //inserting thread into db

    $th_title = $_POST['title'];


    $th_desc = $_POST['desc'];

    //saving website from xx-attack
    $th_desc = str_replace("<","&lt;",$th_desc);
  $th_desc = str_replace(">","&gt;",$th_desc);

    
    $userid = $_POST['userid'];


    $sql = "INSERT INTO `threads` ( `thread_title`, `thread_description`, `thread_user`, `thread_catid`, `created`) VALUES ( '$th_title', '$th_desc', '$userid', '$id', current_timestamp());";

    $result = mysqli_query($con, $sql);

    // $showAlert = true;


  }





  ?>




  <div class="container">


    <div class="jumbotron my-4">
      <h1 class="display-4">Welcome to <?php echo $catname ?> forums</h1>
      <p class="lead"> <?php echo $catdesc ?> </p>
      <hr class="my-4">
      <h5 class="text-center">Forum Rules</h5>
      <p>No Spam / Advertising / Self-promote in the forums.
        Do not post copyright-infringing material.
        Do not post “offensive” posts, links or images.
        Do not cross post questions.
        Do not PM users asking for help.
        Remain respectful of other members at all times.</p>
      <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>




  </div>










<?php

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ) {
  
echo '<div class="container my-3 ">


      <h3>Start a Discussion</h3>
      <form action="'.$_SERVER['REQUEST_URI'].'" method="POST">
        <div class="form-group">
          <label for="exampleInputEmail1">Problem Title</label>
          <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
          <input type="hidden" class="form-control" value="'.$_SESSION["userid"].'"  id="title" name="userid" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">Please keep your title simple and crisp.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Elaborate your Problem</label>
          <textarea name="desc" class="form-control" id="catid" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-success my-3">Submit</button>
      </form>

    </div>
</div>';


}else {
  echo '
  <div class="container">
  <h2 class="my-3 text-center">You are not logged in yet. Please login to start a discussion</h2>
  </div>
   ';
}  
  ?>



  <div class="container">

    <h2 class="text-center"><?php echo $catname ?> | Browse Questions</h2>

  </div>





<div class="container">




    <?php

$id = $_GET['catid'];

    $sql = "SELECT * FROM `threads` WHERE `thread_catid` = $id";
    
    $results = mysqli_query($con, $sql);
    $noResult = true;
    while ($row = mysqli_fetch_assoc($results)) {
      $noResult = false;
      
      $threadid = $row['thread_id'];
      $title = $row['thread_title'];
      $desc = $row['thread_description'];
      $threadtime = $row['created'];
      $threaduserid = $row['thread_user'];
      $time = $row['created'];
      $user_id = $row['thread_user'];
      $sql2 = "SELECT * FROM `users` WHERE user_id = '$user_id'";      
      $result2 = mysqli_query($con,$sql2);
      $row2 = mysqli_fetch_assoc($result2);




      echo '
      
            
      <div class="media my-3 " style="display: flex;" >
      <img src="defaultuser.png" width="60px" height="60px" class="m-2 " alt="...">
    <div class="media-body">
      <h5 class="m-1"><a href="thread.php?threadid=' . $threadid . '">' . $title . '</a></h5>
      <h6 class="m-1" ><b>'.$row2['user_email'].'</b></h6> at '.$time.'

      <p class="pl-2" > 
      ' . $desc . '
      </p>
    </div>
    </div>
    ';
  }
  
  
  
  
    if ($noResult) {
      echo '<div class="jumbotron jumbotron-fluid">
      <div class="container">
      <p class="display-6">No 
      Threads Found.</p>
      <p class="lead">Be the first person to ask a question.</p>
      </div>
  </div>';
}

?>

  </div>
  




  <?php

  include '_footer.php';

  ?>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>