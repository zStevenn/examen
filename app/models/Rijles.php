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
        $this->db->query("SELLECT TAB.Datum, TAB.Onderdeel FROM tabellessen AS TAB ");
        //get the data to go in the controller
        return $this->db->resultSet();
    }
}