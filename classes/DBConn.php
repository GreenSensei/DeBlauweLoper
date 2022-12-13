<?php
class DBConn
{
    public static function PDO() : PDO
    {
        return new PDO("mysql:host=sql7.freemysqlhosting.net;dbname=sql7581433", "sql7581433", "Ix31IKMKMk");
    }
}
?>