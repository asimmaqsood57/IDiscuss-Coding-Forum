

<?php

$method = $_SERVER['REQUEST_METHOD'];

$showError = "false";
if ($method == 'POST') {
// echo $method;
include '_connect_to_database.php';


$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

$emailExistsql = "select * from `users` where user_email = '$email'";

$result = mysqli_query($con, $emailExistsql);

$numRows = mysqli_num_rows($result);


if ($numRows > 0) {
    $showError = "This email already exist";

}else {
    if ($password == $cpassword) {
        
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `users` ( `user_email`, `user_pass`, `timestamp`) VALUES ( '$email', '$hash', current_timestamp());";

        $results = mysqli_query($con , $sql);
        // echo $results;

        if ($results) {
            $showAlert = true;
            header("location:/IforumProject/index.php?signupsuccess=true");
            exit();
        }
        
        
        
        
    }else {
        $showError = "Password don't match";
        
    }
    header("location:/IforumProject/index.php?signupsuccess=false&error=$showError");
}





}



?>