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
    <form class="form_create" action="" autocomplete="off" method="post">
        <h2>Create an Account</h2>
        <p>Name</p>
        <input type="text" name="name" placeholder="Enter Name" required>
        <p>Email</p>
        <input type="email" name="email" placeholder="Enter Email" required>
        <p>Password</p>
        <input type="number" name="phone" placeholder="Enter Phonenumber" required>
        <p>Password</p>
        <input type="password" name="password" placeholder="Enter Password" required>
        <p>Confirm Password</p>
        <input type="password" name="confirm_password" placeholder="Enter Confirm-Password" required>
        <input type="submit" name="create" value="create">
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
