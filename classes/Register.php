<?php

//class Register
//{
//    public function registration($name, $email, $password, $confirmpassword){
//        $duplicate = DBConn::PDO()->prepare("SELECT * FROM `customer` WHERE name = '$name' OR email = '$email'");
//        if (PDORow($duplicate) > 0){
//            echo "naam of email is al in gebruik!";
//        } else{
//            if ($password == $confirmpassword){
//
//            } else{
//                echo "wachtwoord is al in gebruik!";
//            }
//        }
//    }
//}

class Register
{
    public function registration($name, $email, $phone, $password, $confirmpassword)
    {
        $duplicate = mysqli_query("SELECT * FROM customer WHERE name = '$name' OR email = '$email'");
        if (mysqli_num_rows($duplicate) > 0) {
            return 10;
            // Username or email has already taken
        } else {
            if ($password == $confirmpassword) {
                $query = "INSERT INTO customer VALUES('', '$name', '$email', '$phone', '$password',)";
                PDO:$query;
                return 1;
                // Registration successful
            } else {
                return 100;
                // Password does not match
            }
        }
    }
}