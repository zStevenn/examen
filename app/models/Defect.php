<?php

    use TDD\libraries\Database;

    class Defect {
    // Properties, fields
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getDefects() {
        $this->db->query("SELECT  Kenteken
                                ,Model
                        FROM    `auto`;");
        $result = $this->db->resultSet();
        return $result;
    }
    public function createMankement($post) {
        try {
            $this->db->query("INSERT INTO Mankement (id, Kenteken, Datum, Mankement, ) 
                            VALUES(:id, :Kenteken, :Datum, :Mankement, :)");
        $this->db->bind(':id', NULL, PDO::PARAM_INT);
        $this->db->bind(':Kenteken', $post["Kenteken"], PDO::PARAM_STR);
        $this->db->bind('Datum', NULL,PDO::PARAM_STR);
        $this->db->bind(':Mankement', $post["Mankement"], PDO::PARAM_STR);

        return $this->db->execute();
        
        } catch (PDOException $e) {
            logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
            return 0;
        }
    }
}

