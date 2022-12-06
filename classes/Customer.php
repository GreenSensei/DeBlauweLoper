<?php
class Customer
{
    public function __construct(
        private int $id,
        private string $name, 
        private string $email,
        private string $phone,
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
        return $this->phone;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function getStatusId()
    {
        return $this->statusId;
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
        $sth = DBConn::PDO()->prepare("SELECT customer.name, customer.email, customer.phone, customer_status.status, customer.id FROM customer 
        JOIN customer_status ON customer.customer_status_id = customer_status.id ORDER BY customer_status.status");
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

    //eerste
    // public function updateCustomerBy($id, $name, $email, $phone, $customer_status_id)
    // {
    //     $params = array(
    //         ":id" => $id, 
    //         ":name" => $name, 
    //         ":email" => $email, 
    //         ":phone" => $phone, 
    //         ":customer_status_id" => $customer_status_id);
    //     $sth = DBConn::PDO()->prepare("UPDATE customer SET name = :name, email = :email, phone = :phone, customer_status_id = :customer_status_id WHERE id = :id");
    //     $sth->execute($params);
    //     return $sth->rowCount();
    // }
    
    //van andere projecten nagemaakt
    public function updateCustomer() : ?int
    {
        $params = array(":id"=>$this->id, ":name"=>$this->name, ":email"=>$this->email, ":phone"=>$this->phone, ":customer_status_id"=>$this->statusId);
        $sth = DBConn::PDO()->prepare("UPDATE customer SET name=:name, email=:email, phone=:phone, customer_status_id=:customer_status_id WHERE id = :id");
        $sth->execute($params);
        return $sth->rowcount();
    }
    
    // public function updateStatus(string $status)
    // {
    //     $params = array(":customer_status_id" => $this->statusId, ":status" => $status);
    //     $sth = DBConn::PDO()->prepare("UPDATE status FROM customer_status");
    //     $sth->execute();
    //     return $sth->fetchAll();
    // }

}

?>