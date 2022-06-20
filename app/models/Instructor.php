<?php

namespace TDD\models;

use TDD\libraries\Database;

class Instructor
{
    private $db;
//    This is the constructor to make the connection to the database
    public function __construct(){
        $this->db = new Database();
    }
//    This function gets all the data from the instructors and cars tables
    public function findInstructors(){
        $this->db->query("SELECT    INS.email,
		                                INS.firstname,
                                        INS.lastname,
                                        INS.phonenumber,
                                        INS.address,
                                        CAR.license_plate,
                                        CAR.brand,
                                        CAR.model,
                                        CAR.electric
                            FROM instructors as INS

                            INNER JOIN cars as CAR
                            on INS.license_plate = CAR.license_plate");
// sets the variable result with the help of PDO resultSet
        return $this->db->resultSet();
    }
}