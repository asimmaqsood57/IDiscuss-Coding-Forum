<?php


$method = $_SERVER['REQUEST_METHOD'];

$showError = "false";
if ($method == 'POST') {
// echo $method;
include '_connect_to_database.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "select * from `users` where user_email='$email'";

$result = mysqli_query($con, $sql);

$numRows = mysqli_num_rows($result);



if ($numRows == 1) {
    

    $row = mysqli_fetch_assoc($result);

        $userid = $row['user_id'];


            if (password_verify($password, $row['user_pass'])) {
            
            session_start();

            $_SESSION['loggedin'] = true;
            $_SESSION['useremail'] = $email;
            $_SESSION['userid'] = $userid;

            // echo $email. "  ". $userid ." you are logged in";
            header("location:/IforumProject/index.php");
            
        }else {
            
            
            header("location:/IforumProject/index.php");
            
        }
         

        


    // echo "You are logged in successfully";
}else {
    
}







}


?>