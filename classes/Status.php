<?php

class Status
{
    function __construct(
        private int $id,
        private string $status
    ){}

    public function getId()
    {
        return $this->id;
    }
    public function getStatus()
    {
        return $this->status;
    }
    
    public static function getStatusById($id): ?Status
    {
        $params = array(":id" => $id);
        $sth = DBConn::PDO()->prepare("SELECT * FROM customer_status WHERE id =:id");
        $sth->execute($params);
        if($row = $sth->fetch())
            return new Status($row["id"], $row["status"]);
        return null;
    }

    public static function getAllStatuses()
    {
        $sth = DBConn::PDO()->prepare("SELECT * FROM customer_status");
        $sth->execute();
        return $sth->fetchAll();
    }

    public static function getStatusByVarchar($status): ?Status
    {
        $params = array(":status" => $status);
        $sth = DBConn::PDO()->prepare("SELECT * FROM customer_status WHERE status =:status");
        $sth->execute($params);
        if($row = $sth->fetch())
            return new Status($row["id"], $row["status"]);
        return null;
    }
}
?>