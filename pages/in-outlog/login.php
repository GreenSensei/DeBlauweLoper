<?php

if (isset($_POST["login"]))
{
    $login = Login::CheckPassEmail($_POST["email"],$_POST["password"]);
    if (isset($login))
    {
        $_SESSION["user"] = $login;
        header("Location: ". ROOT."/profile/profile");
    }
    else
    {
        echo "De email of het wachtwoord is incorrect";
    }
}
?>

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
<!--     Login    -->
<!--        <form action="" autocomplete="off" method="post">-->
<!--            <p>Email</p>-->
<!--            <input type="email" name="email" placeholder="Enter Email">-->
<!--            <p>Password</p>-->
<!--            <input type="password" name="password" placeholder="Enter Password">-->
<!--            <input type="submit" name="login" value="login">-->
<!--        </form>-->
<!--     Login    -->
<form action="" method="post">
    <section class="vh-50 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>

                                <div class="form-outline form-white mb-4">
                                    <input type="email" name="email" id="typeEmailX" class="form-control form-control-lg" />
                                    <label class="form-label" for="typeEmailX">Email</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" />
                                    <label class="form-label" for="typePasswordX">Password</label>
                                </div>

                                <button class="btn btn-outline-light btn-lg px-5" name="login" type="submit">Login</button>

                            </div>

                            <div>
                                <p class="mb-0">Don't have an account? <a href="create" class="text-white-50 fw-bold">Sign Up</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

    </body>
</html>