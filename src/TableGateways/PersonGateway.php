<?php

namespace Src\TableGateways;

class PersonGateway{


    private $db = null;

    public function __construct($db){

        $this->db = $db;
    }

    public function findAll()
    {
        $statement = "
            SELECT 
                id, firstname, lastname, firstparent_id, secondparent_id
            FROM
                person;
        ";

        try {
            $statement = $this->db->query($statement);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
}