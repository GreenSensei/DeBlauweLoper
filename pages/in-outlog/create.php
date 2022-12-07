<?php

    $regi_arr = array("sign_up_name","sign_up_email","sign_up_phone");
    for ($i=0; $i < Count($regi_arr) ; $i++) 
    { 
        if (isset($_POST[$regi_arr[$i]])) 
        {
            $_SESSION[$regi_arr[$i]] = $_POST[$regi_arr[$i]];
        }
        else 
        {
            $_SESSION[$regi_arr[$i]] = "";
        }
    }
    

    if (isset($_POST['create'])){
        $email = strtolower($_POST['email']);
        $klant = Register::CheckEmail($email);
        if (isset($klant)){
            echo "Deze email is al in gebruik!";
        } else {
            echo "1";
            if ($_POST["password"] == $_POST["confirm_password"] && strlen($_POST["password"])>8){
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $valid_email = 1;
                //Register::emailValidation($email);
                if ($valid_email == 1){
                    $klant = Register::insertKlant($_POST['name'], $email, $_POST['phone'], $password);
                    $msg ="Uw status is gewijzigd naar: ".$_POST["status"].".\rUw inlog mail:".$_POST["email"]."\rBezoek de website: http://localhost/DeBlauweLoper/home";
                    mail($email, "Registratie",$msg, "From:info@deblauweloper.nl"); 
                    header("Location: ". ROOT . "/profile/profile");
                } else{
                    echo "Deze email is ongeldig!";
                }
            }
            elseif ($_POST["password"] == $_POST["confirm_password"] && strlen($_POST["password"])<8){
                echo "het wachtwoord is te kort";
            }
            elseif ($_POST["password"] != $_POST["confirm_password"]){
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
        <input type="text" name="name" placeholder="Enter Name">
        <p>Email</p>
        <input type="email" name="email" placeholder="Enter Email">
        <p>Password</p>
        <input type="number" name="phone" placeholder="Enter Phonenumber">
        <p>Password</p>
        <input type="password" name="password" placeholder="Enter Password">
        <p>Confirm Password</p>
        <input type="password" name="confirm_password" placeholder="Enter Confirm-Password">
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
