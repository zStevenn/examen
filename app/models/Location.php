<?php

use TDD\libraries\Database;

class Location
{
    // Properties, fields
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function getLessons()
    {
        $this->db->query("SELECT `LS` .Id,
                                 `LS` .Datum, 
                                 `LS` .Leerling, 
                                 `LS` .Instructeur,
                                 `LE` .ID, 
                                 `LE` .Woonplaats, 
                                 `LE` .Straat, 
                                 `IN` .Name,
                                 `IN` .Email 
                                 FROM lessen as `LS`
                                  -- Inner join table Lessen ON Leerling
                                 INNER JOIN `Leerling` as `LE`
                                 ON `LE`.ID = `LS`.Leerling
                                 INNER JOIN `Instructeur` as `IN`
                                 ON `IN` .Email  = `LS` .Instructeur 
                                 WHERE `LE` .ID = 1 AND CURRENT_TIMESTAMP < `LS` .Datum   ");
        $result = $this->db->resultSet();
        return $result;
    }

    public function ChangePickup($post)
    {
        var_dump($post);
        try {
            $this->db->query("INSERT INTO `altophaallocatie`(
                                                         
                                                            `LES`, 
                                                            `Straat`, 
                                                            `Woonplaats`) 
                                                            VALUES (
                                                               
                                                                :les,
                                                                :Straat,
                                                                :Woonplaats");

        
            $this->db->bind(':les', $post["Id"], PDO::PARAM_INT);
            $this->db->bind(':Straat', $post["Straat"], PDO::PARAM_STR);
            $this->db->bind(':Woonplaats', $post["Woonplaats"], PDO::PARAM_STR);


            return $this->db->execute();
        } catch (PDOException $e) {
            logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
            return 0;
        }
    }
}
