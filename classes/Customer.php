<?php
// customer functions
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
        return $this->email;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function getStatusId()
    {
        return $this->statusId;
    }

    public static function getAllCustomers()
    {
        $sth = DBConn::PDO()->prepare("SELECT customer.name, customer.email, customer.phone, customer_status.status, customer.id FROM customer 
        JOIN customer_status ON customer.customer_status_id = customer_status.id ORDER BY customer_status_id DESC");
        $sth->execute();
        return $sth->fetchAll();
    }
    
    public static function getCustomerById($id) : ?Customer
    {
        $params = array(":id" => $id);
        $sth = DBConn::PDO()->prepare("SELECT * FROM customer WHERE id =:id");
        $sth->execute($params);
        if($row = $sth->fetch())
            return new Customer($row["id"], $row["name"], $row["email"], $row["phone"],$row["customer_status_id"]);
        return null;
    }

    public function updateCustomer() : ?int
    {
        $params = array(":id"=>$this->id, ":name"=>$this->name, ":email"=>$this->email, ":phone"=>$this->phone, ":customer_status_id"=>$this->statusId);
        $sth = DBConn::PDO()->prepare("UPDATE customer SET name=:name, email=:email, phone=:phone, customer_status_id=:customer_status_id WHERE id = :id");
        $sth->execute($params);
        return $sth->rowcount();
    }
}

?>