<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create account DeBlauweLoper</title>
</head>
    <body>
    <form class="form_create" action="" autocomplete="off" method="post">
        <h2>Create an Account</h2>
        <p>Name</p>
        <input type="text" name="name" placeholder="Enter Name">
        <p>Email</p>
        <input type="email" name="email" placeholder="Enter Email">
        <p>Password</p>
        <input type="number" name="phone" placeholder="Enter Phonenumber">
        <p>Password</p>
        <input type="password" name="password" placeholder="Enter Password">
        <p>Confirm Password</p>
        <input type="password" name="confirmpassword" placeholder="Enter Password">
        <input type="submit" name="create" value="create">
    </form>
    </body>
</html>

<?php
$register = new Register();

if (isset($_POST['create'])){
    $result = $register->registration($_POST["name"], $_POST["email"], $_POST["phone"], $_POST["password"], $_POST["confirmpassword"]);
    if($result == 1){
        echo
        "<script> alert('Registration Successful'); </script>";
    }
    elseif($result == 10){
        echo
        "<script> alert('Username or Email Has Already Taken'); </script>";
    }
    elseif($result == 100){
        echo
        "<script> alert('Password Does Not Match'); </script>";
    }
}
