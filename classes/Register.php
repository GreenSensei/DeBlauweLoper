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
//    public function registration($name, $email, $phone, $password, $confirmpassword)
//    {
//        $conn = new DBConn();
//
//        $create = $conn->connect();
//        $duplicate = $create->prepare("SELECT * FROM customer WHERE name = '$name' OR email = '$email'");
//        $duplicate -> execute([$_POST['email'], ['name']]);
//        if (mysqli_num_rows($duplicate) > 0) {
//            return 10;
//            // Username or email has already taken
//        } else {
//            if ($password == $confirmpassword) {
//                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
//                $query = "INSERT INTO customer VALUES('$name', '$email', '$phone', '$password',)";
//                PDO:$query;
//                return 1;
//                // Registration successful
//            } else {
//                return 100;
//                // Password does not match
//            }
//        }
//    }

    public static function CheckEmail(string $email, string $password): ?Customer
    {
        $sth = DBConn::PDO()->prepare("SELECT * FROM customer WHERE email=?");
        $sth->execute([$_POST['email']]);
        $row = $sth->fetch();

        if ($row != "") {
            echo "email already taken";
        } else {
            if ($password == $confirmpassword) {
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                DBConn::PDO()->prepare("INSERT INTO customer VALUES('$name', '$email', '$phone', '$password','1')";
                echo "registration successful";
            } else {
                echo "password does not match";
            }
        }

    }
}
//    public static function CreateAccount(string $email, string $password): ?Customer
//    {
//        $parameters = array(":Email" => $email);
//        $sth = DBConn::PDO()->prepare("SELECT * FROM `customer` WHERE email = :Email");
//        $sth->execute($parameters);
//        $row = $sth->fetch();
//
//        if ($sth->rowCount() > 0) {
//            if (password_verify($password, $row["password"])) {
//                return new Customer($row["id"], $row["name"], $row["email"], $row["phone"], $row["password"]);
//            }
//        }
//        return null;
//
//    }
//}

