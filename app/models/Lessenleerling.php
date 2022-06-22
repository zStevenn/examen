<?php

use TDD\libraries\Database;

class Lessenleerling
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getLesson()
    {
        // try catch to see if we can get the data from the lessons
        try
        {
            //select table for the information that the students can see as an table of information
            $this->db->query(
                "SELECT TAB.Datum, INST.naam, TAB.ID 
                                FROM `tabellessen1` AS TAB 
                                    INNER JOIN instructeur1 AS INST ON (TAB.instructeur = INST.Email) 
                                WHERE TAB.Leerling = 1 AND DATE(TAB.Datum) < CURDATE()"
            );

            $result = $this->db->resultSet();

            return $result;

        }
        catch(PDOException $e)
        {
            logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
            return 0;
        }
    }

    public function getOpmerking($id)
    {
        //try catch for the database connection
        try
        {
            //select the opmerkingen of a lesson with the right ID that is from the lesson ID
            $this->db->query("SELECT OPM.Opmerking 
                                FROM `tabellessen1` AS TAB 
                                    INNER JOIN opmerkingen1 As OPM ON (TAB.ID = OPM.LES) 
                                WHERE TAB.ID = OPM.LES AND TAB.ID = :id");

            $this->db->bind(':id', $id);


            return $this->db->resultSet();

        }catch(PDOException $e)
        {
            logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
            return 0;
        }
    }

    public function getOnderwerp($id)
    {
        //try catch for the database connection
        try
        {
            //select the opmerkingen of a lesson with the right ID that is from the lesson ID
            $this->db->query("SELECT OND.Onderwerp 
                                FROM `tabellessen1` AS TAB 
                                    INNER JOIN onderwerpen1 As OND ON (TAB.ID = OND.LES) 
                                WHERE TAB.ID = OND.LES AND TAB.ID = :id");

            $this->db->bind(':id', $id);


            return $this->db->resultSet();

        }catch(PDOException $e)
        {
            logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
            return 0;
        }
    }
}