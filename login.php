<?php
session_start();

include('connection.php');
$missingEmail = '<p>Please enter your email address!</p>';
$missingPassword = '<p>Please enter your password!</p>';
$errors="";
$email="";
$password = "";


if(empty($_POST["loginemail"])){
    $errors .= $missingEmail;
}
else{
    $email = filter_var($_POST["loginemail"], FILTER_SANITIZE_EMAIL);
}

if(empty($_POST["loginpassword"])){
    $errors .= $missingPassword;
}
else{
    $password = filter_var($_POST["loginpassword"], FILTER_SANITIZE_STRING);
}


if($errors){
        $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
        echo $resultMessage;
   }else{
    $email = mysqli_real_escape_string($link, $email);
    $password = mysqli_real_escape_string($link, $password);
    $password = md5($password);//hashed password



    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result =mysqli_query($link , $sql);
    if (!$result) {
        echo '<div class="alert alert-danger">Error running the query</div>';
        exit;
    }

    $count = mysqli_num_rows($result);
    if ($count !== 1){
        echo '<div class="alert alert-danger">Wrong user name or password!</div>';
    } else {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['email'] = $row['email'];
    }
}
?>
