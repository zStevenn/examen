<?php

use TDD\libraries\Database;

class callSick
{
    //create a database variable
    private $db;

    public function __construct()
    {
        //initiate the database in the model
        $this->db = new Database;
    }

    //sick reports binding
    private function bindSickreports($data)
    {
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':reason', $data['reason']);
    }

    public function createSicknes($data)
    {
        //insert for the data
        $this->db->query("INSERT INTO sickreports 
                            (
                                `insemail`,
                                `reason`
                            )
                            VALUES
                            (
                                :email,
                                :reason
                            ) 
                        ");

        //bind the sick reports and put it in the right values
        $this->bindSickreports($data);

        //execute the function and looking if it works
        if($this->db->execute())
        {
            return true;
        }else
        {
            return false;
        }
    }
}