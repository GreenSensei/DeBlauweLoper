<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login DeBlauweLoper</title>
</head>
    <body>
    <!--    Login    -->
        <form action="" autocomplete="off" method="post">
            <p>Email</p>
            <input type="email" name="email" placeholder="Enter Email">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" name="login" value="login">
        </form>
    <!--    Login    -->

    </body>
</html>

<?php
$error = null;
if (isset($_POST["sign_in"]))
{
    $inlog = Login::CheckPassEmail($_POST["email"],$_POST["password"]);
    if (isset($inlog))
    {
        $_SESSION['user'] = $inlog;
        echo "jow";
        $error = " ";
    }
    else
    {
        $error = "De email of het wachtwoord is incorrect";
    }
}
?>