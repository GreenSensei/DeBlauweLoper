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
    public function getPhone()
    {
        return $this->phone;
    }
    public function getStatusId()
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

    public static function getAllCustomers()
    {
        $sth = DBConn::PDO()->prepare("SELECT customer.name, customer.email, customer.phone, customer_status.status FROM customer JOIN customer_status ON customer.customer_status_id = customer_status.id ORDER BY customer_status.status");
        $sth->execute();
        return $sth->fetchAll();
    }
    
    public static function getCustomerById($id) : ?Customer
    {
        $params = array(":id" => $id);
        $sth = DBConn::PDO()->prepare("SELECT * FROM customer WHERE id =:id");
        $sth->execute($params);
        if($row = $sth->fetch())
            return new Customer($row["id"], $row["name"], $row["email"], $row["phone"], $row["customer_status_id"]);
        return null;
    }
}

?>