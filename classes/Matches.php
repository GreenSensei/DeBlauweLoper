<?php
    class Matches
    {
        public function __construct(
            private int $id,
            private string $scores,
            private int $player_1, 
            private int $player_2, 
            private string $start_time,
            private string $end_time,  
        ){}
    
        public function getId()
        {
            return $this->id;
        }
        public function getScores()
        {
            return $this->scores;
        }
        public function getPlayer_1()
        {
            return $this->player_1;
        }
        public function getPlayer_2()
        {
            return $this->player_2;
        }
        public function getStart_time()
        {
            return $this->start_time;
        }
        public function getEnd_time()
        {
            return $this->end_time;
        }
        public static function getAllMatches()
        {
            $sth = DBConn::PDO()->prepare("SELECT matches.id, player_1, player_2, scores, start_time, end_time FROM matches JOIN customer ON matches.player_1 = customer.id ORDER BY matches.start_time");
            $sth->execute();
            return $sth->fetchAll();
        }

        public static function getMatchById($id) : ?Matches
        {
            $params = array(":id" => $id);
            $sth = DBConn::PDO()->prepare("SELECT * FROM matches WHERE id =:id");
            $sth->execute($params);
            if($row = $sth->fetch())
                return new Matches($row["id"], $row["scores"], $row["player_1"], $row["player_2"], $row["start_time"], $row["end_time"]);
            return null;
        }

        public function updateMatch() : ?int
        {
            $params = array(":id"=>$this->id, ":scores"=>$this->scores,":player_1"=>$this->player_1, ":player_2"=>(int)$this->player_2, ":start_time"=>$this->start_time, ":end_time"=>$this->end_time);
            $sth = DBConn::PDO()->prepare("UPDATE matches SET scores=:scores, player_1=:player_1, player_2=:player_2, start_time=:start_time, end_time=:end_time WHERE id = :id");
            $sth->execute($params);
            return $sth->rowcount();
        }

        public static function insertMatch(string $scores, string $player_1, string $player_2, string $start_time, string $end_time)
        {
            $parameters = array(":scores" => $scores, ":player_1" => $player_1, ":player_2" => $player_2, ":start_time" => $start_time, ":end_time"=> $end_time);
            $sth = DBConn::PDO()->prepare("INSERT INTO matches (scores, player_1, player_2, start_time, end_time) VALUES (:scores, :player_1, :player_2, :start_time, :end_time)");
            $sth->execute($parameters);
        }

        public function deleteMatch(): ?int
        {
            $params = array(':id' => $this->id);
            $sth = DBConn::PDO()->prepare("DELETE FROM matches WHERE id = :id");
            $sth->execute($params);
            return 1;
        }
    }
?>