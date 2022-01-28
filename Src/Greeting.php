<?php

namespace Src;

class Greeting{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllGreetings(){
        $query = "SELECT id, texte, langue FROM salutations;";

        $statement = $this->db->query($query);
        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }
}