<?php
    class DBConn
    {
        public static function PDO() : PDO
        {
            static $pdo =  new PDO("mysql:host=sql7.freemysqlhosting.net;dbname=sql7581433", "sql7581433", "Ix31IKMKMk");
            return $pdo;
        }
    }
?>