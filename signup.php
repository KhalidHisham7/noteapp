<?php

session_start();
include("connection.php");
$missingUsername = '<p>Please enter a username!</p>';
$missingEmail = '<p>Please enter your email address!</p>';
$InvalidEmail = '<p>Please enter a valid email address!</p>';
$missingPassword = '<p>Please enter a password!</p>';
$InvalidPassword = '<p>Your password should ne at least 6 characters long and include one capital letter and one number!</p>';
$differentPassword = '<p>Passwords don\'t match!</p>';
$missingPassword2 = '<p>Please confirm your password!</p>';
$errors = "";
$username = "";
$email = "";
$password = "";
$results = "";

if (empty($_POST["username"])){
    $errors .= $missingUsername;
}
else{
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
}
if(empty($_POST["email"])){
    $errors .= $missingEmail;
}
else{
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
        $errors .= $InvalidEmail;
    }
}

if(empty($_POST["password"])){
    $errors .= $missingPassword;
}
else if(!(strlen($_POST["password"])>6 and preg_match('/[A-Z]/',$_POST["password"]) and preg_match('/[0-9]/',$_POST["password"]))){
    $errors .= $InvalidPassword;
}
        else{
            $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
            if(empty($_POST["password2"])){
                $errors .= $missingPassword2;
            }else{
                $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
                if($password !== $password2){
                    $errors .= $differentPassword;
                }
            }
        }
        
        
        //if there are any errors print it!
        if($errors){
            $resultMessage = '<div class="alert alert-danger">'. $errors .'</div>';
            echo $resultMessage;
        }

$username = mysqli_real_escape_string($link, $username);
$email = mysqli_real_escape_string($link, $email);
$password = mysqli_real_escape_string($link, $password);
$password = md5($password);//hashed password

//if username exists in the users table print an error

$sql = "SELECT * FROM users WHERE user_name = '$username' ";
$result = mysqli_query($link, $sql);
if (!$result) {
    echo '<div class="alert alert-danger">Error running the query</div>';
    exit;
}
$results = mysqli_num_rows($result);
if ($results){
    echo '<div>That username is already registered, Do you want to log in?</div>'; exit;
}

//if email exists in the users table print an error

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the second query!</div>'; exit;
}
$results = mysqli_num_rows($result);
if ($results){
    echo '<div>That email is already registered, Do you want to log in?</div>'; exit;
}


//creating new activation code
$activationkey = bin2hex(openssl_random_pseudo_bytes(16));


$sql = "INSERT INTO users (`user_name` , `email` , `password` , `activation`) VALUES ('$username' , '$email' , '$password' , '$activationkey') ";

$result = mysqli_query($link, $sql);
if (!$result){
    echo '<div class="alert alert-danger">There was an error inserting user details in the database</div>';
    exit;
}



//send the user an email with a link to activate.php with their email and activation code
$message = "Please click on this link to activate your account:\n\n";
$message .= "http://localhost/activate.php?email=" . urlencode($email) . "&key = $activationkey";
if (mail($email, 'Confirm your registration' , $message, 'From:'.'thetrio')){
    echo "<div class='alert alert-success'>Thank you for registering! A confirmation email has been sent to $email. Please click on the activation link to activate your account.</div>";
}
?>



















