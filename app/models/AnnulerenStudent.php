<?php

use TDD\libraries\Database;

class AnnulerenStudent {
    // Properties, fields
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAnnulerenStudents() {
        $this->db->query("SELECT  LES.id
        ,LES.datum
        ,INS.naam
        ,LES.status
FROM        lessen AS LES
INNER JOIN  instructeur AS INS
        ON  LES.instructeur = INS.email
INNER JOIN  leerling AS LLG
        ON  LES.leerling = LLG.id
        WHERE LES.leerling = 3 AND CURRENT_TIMESTAMP < LES.datum AND LES.status = 'd';");
        $result = $this->db->resultSet();
        return $result;
    }
    public function createReden($post) {
        try {
            // insert query
            $this->db->query("INSERT INTO `annulerenlessen` (`id`, `les`, `reden`) 
                                        VALUES (NULL ,:Les ,:Reden)");
        // binds
        $this->db->bind(':Les', $post["id"], PDO::PARAM_INT);
        $this->db->bind(':Reden', $post["Reden"], PDO::PARAM_STR);
        
        $this->db->execute();
        // update query
        $this->db->query("UPDATE `lessen` SET `status` = 'z'
                        WHERE `id` = :Les");

        $this->db->bind(':Les', $post["id"], PDO::PARAM_INT);
        return $this->db->execute();

        } catch (PDOException $e) {
            // if goes wrong
            logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
            return 0;
        }
    }
}    