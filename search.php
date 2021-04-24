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
<style>

</style>

</head>

<body>

  <?php

  include '_navbar.php';

  ?>




<div class="container my-3">







<h1>Search Results for <?php echo $_GET['search'] ?> </h1>


<?php

$query = $_GET['search'];


$sql = "SELECT * FROM `threads` WHERE MATCH(`thread_title`,`thread_description`) against ('$query')";

$noResult =true;

$result = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($result)) {
  
    $noResult = false;
  $title = $row['thread_title'];
  $desc = $row['thread_description'];
  $th_id = $row['thread_id'];

$url = "/IforumProject/thread.php?threadid=$th_id";

echo '

<div class="result">

<h3><a class="text-dark" href="'.$url.'"> '.$title.'</a>  </h3>

<p>
'.$desc.'

</p>
</div>';


}


if ($noResult) {
    echo '<div class="jumbotron my-4">
    <h1 class="display-4">No Result Found</h1>
    <p class="lead"> Python is an interpreted high-level general-purpose programming language. Pythons design philosophy emphasizes code readability with its notable use of significant indentation </p>
    
    
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