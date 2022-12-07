<?php
class Register
{
    public function __construct(
        private int $id,
        private string $name, 
        private string $email,
        private string $phone,
        private string $password,
        private string $statusId
    ){}

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getStatusId()
    {
        return $this->statusId;
    }

    public static function CheckEmail(string $email): ?Register
    {
        $params = array(":email"=>$email);
        $sth = DBConn::PDO()->prepare("SELECT * FROM customer WHERE email=:email");
        $sth->execute($params);
        $row = $sth->fetch();

        if ($row != "") {
            echo "email already taken";
        }
        return null;
    }

    public static function emailValidation(string $email) : bool
    {
       return (bool)(preg_match("^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$^",$email));
    }

    public static function insertKlant(string $name, string $email, string $phone, string $password){
        $params =array(":name" =>$name, ":email"=>$email, ":phone"=>$phone, ":password"=>$password, ":customer_status_id"=>1);
        $sth = DBConn::PDO()->prepare("INSERT INTO customer (name, email, phone, password, customer_status_id) VALUES (:name, :email, :phone, :password, :customer_status_id)");
        $sth->execute($params);

        $params= array(":email"=> $email);
        $sth = DBConn::PDO()->prepare("SELECT * FROM `customer` WHERE email = :email");
        $sth-> execute($params);
        $row = $sth->fetch();

        return new Register($row["id"], $row["name"], $row["email"], $row["phone"], $row["password"], $row["customer_status_id"]); 
    }

}