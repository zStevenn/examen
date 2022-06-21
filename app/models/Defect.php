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
        // inserts into database
        try {
            $this->db->query("INSERT INTO `mankement` (`id`, `Auto`, `Datum`, `Mankement`) 
                                VALUES (NULL, :Kenteken, CURRENT_TIMESTAMP, :Mankement);");
        $this->db->bind(':Kenteken', $post["Kenteken"], PDO::PARAM_STR);
        $this->db->bind(':Mankement', $post["Mankement"], PDO::PARAM_STR);

        return $this->db->execute();
        
        } catch (PDOException $e) {
            // if goes wrong
            var_dump();exit();
            logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
            return 0;
        }
    }
    
    public function kentekenGetter($Kenteken)
    {
        $this->db->query("SELECT Kenteken FROM `auto` WHERE Kenteken = ':Kenteken'");
        $this->db->bind(':Kenteken', $Kenteken, PDO::PARAM_STR);
        $row = $this->db->single();
        return $row;
    }
}

