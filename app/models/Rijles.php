<?php

use TDD\libraries\Database;

class Rijles
{
    private $db;

    public function __construct()
    {
        //make sure we can use the database in our model
        $this->db = new Database();
    }

    public function getLesson()
    {
        // get the data from the database to put in an array to the controller
        $this->db->query("SELECT TAB.ID ,TAB.Datum, TAB.Onderdeel FROM tabellessen AS TAB WHERE TAB.Leerling = 4 AND CURRENT_TIMESTAMP > TAB.Datum");

        //get the data to go in the controller
        return $this->db->resultSet();
    }

    public function createOpmerking($data)
    {
        //select the opmerking table om de info erin te zetten

        $this->db->query("INSERT INTO opmerkingen(`les`, `Opmerking`) VALUES (:les, :opm)");

        //bind the les and opmerking
        $this->db->bind(':les', $data['les']);
        $this->db->bind(':opm', $data['opm']);

        //execute the function
        if ($this->db->execute())
        {
            return true;
        }else {
            return false;
        }
    }

    public function getSingleLes($id)
    {
        //select the lessons ID to send it with the "Opmerking"
        $this->db->query("SELECT TAB.ID FROM tabellessen AS TAB WHERE TAB.ID = :id");
        $this->db->bind(':id', $id);
        //only returns 1 row with the right id
        return $this->db->single();
    }
}