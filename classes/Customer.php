<?php
class Customer
{
    public function __construct(
        private int $id,
        private string $name, 
        private string $email,
        private string $phone,
        private string $status
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
        return $this->phone;
    }
    public function getStatus()
    {
        return $this->status;
    }

    // public function delete(): ?int
    // {
    //     $params = array(":id" => $this->id);
    //     $sth = DBConn::Pdo()->prepare("DELETE FROM customer WHERE id = :id");
    //     $sth->execute($params);
    //     return $sth->rowCount();
    // }

    public static function GetAllCustomers()
    {
        $sth = DBConn::PDO()->prepare("SELECT name, email, phone, customer_status_id FROM customer");
        $sth->execute();
        return $sth->fetchAll();
    }
    
}

?>