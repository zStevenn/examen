<?php

use TDD\libraries\Database;

class Instructor
{
    //create a database variable
    private $db;

    public function __construct()
    {
        //initiate the database in the model
        $this->db = new Database;
    }

    public function checkemail($data)
    {
        $this->db->query("SELECT * FROM instructor WHERE `email` = :email");

        $this->db->bind(':email', $data['email']);

        if($this->db->execute())
        {
            return true;
        }else
        {
            return false;
        }
    }
}