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
        <input type="password" name="password" placeholder="Enter Password">
        <p>Confirm Password</p>
        <input type="password" name="confirmpassword" placeholder="Enter Password">
        <input type="submit" name="create" value="create">
    </form>
    </body>
</html>

<?php
if (isset($_POST['create'])){

}
