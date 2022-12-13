<?php
class Login
    {

            private string $id;
            private string $name;
            private string $email;
            private string $phone;
            private string $password;
            private string $statusId;

            public function __construct(string $id, string $name, string $email, string $phone, string $password, string $statusId)
        {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->phone = $phone;
            $this->password = $password;
            $this->statusId = $statusId;
        }
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

        public function delete(): ?int
        {
            $params = array(":id" => $this->id);
            $sth = DBConn::PDO()->prepare("DELETE FROM customer WHERE id = :id");
            $sth->execute($params);
            return $sth->rowCount();
        }

        public function updateCustomer(): ?int
        {
            $params = array(":id" => $this->getId(), ":name" => $this->getName(), ":email" => $this->getEmail(),
                ":phone" => $this->getPhone(), ":password" => $this->getPassword());
            $sth = DBConn::PDO()->prepare("UPDATE customer SET name=:name, email=:email, phone=:phone, password=:password WHERE id = :id");
            $sth->execute($params);
            return $sth->rowcount();
        }

        public static function getAllCustomers(): array
        {
            $sth = DBConn::PDO()->prepare("SELECT id, name, email, phone FROM customer ");
            $sth->execute();
            return $sth->fetchAll();
        }

        public static function getCutomerById(string $id): ?Login
        {
            $params = array(":id" => $id);
            $sth = DBConn::PDO()->prepare("SELECT * FROM customer WHERE id = :id");
            $sth->execute($params);

            if ($row = $sth->fetch())
                return new Login($row["id"], $row["name"], $row["email"], $row["phone"], $row["password"], $row["customer_status_id"]);
            return null;
        }

        public static function CheckPassEmail(string $email, string $password): ?Login
        {
            $parameters = array(":Email" => $email);
            $sth = DBConn::PDO()->prepare("SELECT * FROM `customer` WHERE email = :Email");
            $sth->execute($parameters);
            $row = $sth->fetch();

            if ($sth->rowCount() > 0) {
                if (password_verify($password, $row["password"])) {
                    return new Login($row["id"], $row["name"], $row["email"], $row["phone"], $row["password"], $row["customer_status_id"]);
                }
            }
            return null;
        }

        public static function checkEmail(string $email): ?Login
        {
            $parameters = array(":Email" => $email);
            $sth = DBConn::PDO()->prepare("SELECT * FROM `customer` WHERE email = :Email");
            $sth->execute($parameters);
            $row = $sth->fetch();

            if ($sth->rowCount() > 0) {
                return new Login($row["id"], $row["name"], $row["email"], $row["phone"],  $row["password"], $row["customer_status_id"]);
            }
            return null;
        }

        public static function insertCustomer(string $name, string $email, string $phone, string $password)
        {
            $parameters = array(":name" => $name, ":email" => $email, ":phone" => $phone, ":password" => $password);
            $sth = DBConn::PDO()->prepare("INSERT INTO customer (name, email, phone, password) VALUES (:name, :email, :phone, :password)");
            $sth->execute($parameters);

            $parameters = array(":Email" => $email);
            $sth = DBConn::PDO()->prepare("SELECT * FROM `customer` WHERE email = :Email");
            $sth->execute($parameters);
            $row = $sth->fetch();

            return new Login($row["id"], $row["name"], $row["email"], $row["phone"], $row["password"], $row["customer_status_id"]);
        }

        public static function emailValidation(string $email): bool
        {
            return (bool)(preg_match("^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$^", $email));
        }

        // profiel
        public function updateCustomerById() : ?int
        {
            $params = array(":id"=>$this->id, ":name"=>$this->name, ":email"=>$this->email, ":phone"=>$this->phone, ":password"=>$this->password, ":customer_status_id"=>$this->statusId);
            $sth = DBConn::PDO()->prepare("UPDATE customer SET name=:name, email=:email, phone=:phone, password=:password. customer_status_id=:customer_status_id WHERE id = :id");
            $sth->execute($params);
            return $sth->rowcount();
        }
    }
?>