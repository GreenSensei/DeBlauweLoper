<?php

class Register
{
    public function registration($name, $email, $password, $confirmpassword){
        $duplicate = DBConn::PDO()->prepare("SELECT * FROM `customer` WHERE name = '$name' OR email = '$email'");
        if (PDORow($duplicate) > 0){
            echo "naam of email is al in gebruik!";
        } else{
            if ($password == $confirmpassword){

            } else{
                echo "wachtwoord is al in gebruik!";
            }
        }
    }
}