<?php
    if (!empty($_POST))
    {
        print_r($_POST);
        $email = strtolower($_POST['email']);
        $klant = Register::CheckEmail($email);
        if (isset($klant))
        {
            echo "Deze email is al in gebruik!";
        } 
        else 
        {
            echo 1;
            if ($_POST["password"] == $_POST["confirm_password"] && strlen($_POST["password"])>=8)
            {
                echo 2;
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $valid = Register::emailValidation($email);
                echo $valid;
                if ($valid)
                {
                    echo 2;
                    $klant = Register::insertKlant($_POST['name'], $email, $_POST['phone'], $password);
                    $msg ="Uw \rUw inlog mail:".$_POST["email"]."\rBezoek de website: http://localhost/DeBlauweLoper/home";
                    mail($email, "Registratie",$msg, "From:info@deblauweloper.nl"); 
                    header("Location: ". ROOT . "/profile/profile");
                } 
                else
                {
                    echo "Deze email is ongeldig!";
                }
            }
            elseif ($_POST["password"] == $_POST["confirm_password"] && strlen($_POST["password"])<8)
            {
                echo "het wachtwoord is te kort";
            }
            elseif ($_POST["password"] != $_POST["confirm_password"])
            {
                echo "het wachtwoord is niet hetzelfde";
            }
            $_SESSION["user"] = $klant;
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
    <title>Create account DeBlauweLoper</title>
</head>
    <body>
<!--    <form class="form_create" action="" autocomplete="off" method="post">-->
<!--        <h2>Create an Account</h2>-->
<!--        <p>Name</p>-->
<!--        <input type="text" name="name" placeholder="Enter Name" required>-->
<!--        <p>Email</p>-->
<!--        <input type="email" name="email" placeholder="Enter Email" required>-->
<!--        <p>Password</p>-->
<!--        <input type="number" name="phone" placeholder="Enter Phonenumber" required>-->
<!--        <p>Password</p>-->
<!--        <input type="password" name="password" placeholder="Enter Password" required>-->
<!--        <p>Confirm Password</p>-->
<!--        <input type="password" name="confirm_password" placeholder="Enter Confirm-Password" required>-->
<!--        <input type="submit" name="create" value="create">-->
<!--    </form>-->

    <form class="" action="" method="post">
        <section class="vh-10 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-50">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <div class="mb-md-5 mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-2 text-uppercase">Create</h2>
                                    <p class="text-white-50 mb-5">Please fill in all <fields></fields></p>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="name" id="typeEmailX" class="form-control form-control-lg" />
                                        <label class="form-label" for="typeEmailX">Name</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="email" name="email" id="typeEmailX" class="form-control form-control-lg" />
                                        <label class="form-label" for="typeEmailX">Email</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="phone" id="typeEmailX" class="form-control form-control-lg" />
                                        <label class="form-label" for="typeEmailX">Phone number</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" />
                                        <label class="form-label" for="typePasswordX">Password</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" name="confirm_password" id="typePasswordX" class="form-control form-control-lg" />
                                        <label class="form-label" for="typePasswordX">Confirm Password</label>
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" name="login" type="submit">Login</button>

                                </div>

                                <div>
                                    <p class="mb-0">Already have an account? <a href="login" class="text-white-50 fw-bold">Go back</a>
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

<?php

// if (isset($_POST['create'])){
//     $email = strtolower($_POST['email']);
//     $klant = Register::CheckEmail($email);
//     if (isset($klant)){
//         echo "Deze email is al in gebruik!";
//     } else {
//         echo "1";
//         if ($_POST["password"] == $_POST["confirm_password"] && strlen($_POST["password"])>8){
//             $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
//             $valid_email = Register::emailValidation($email);
//             if ($valid_email){
//                 $data = Register::insertKlant($_POST['name'], $email, $_POST['phone'], $password);
//                 header("Location: ". ROOT . "/profile/profile");
//             } else{
//                 echo "Deze email is ongeldig!";
//             }
//         }
//         elseif ($_POST["password"] == $_POST["confirm_password"] && strlen($_POST["password"])<8){
//             echo "het wachtwoord is te kort";
//         }
//         elseif ($_POST["password"] != $_POST["confirm_password"]){
//             echo "het wachtwoord is niet hetzelfde";
//         }
//         $_SESSION["user"] = $data;
//     }
// }
