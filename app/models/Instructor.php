<?php

use TDD\libraries\Database;

class Instructor {
    private $db;
//    This is the constructor to make the connection to the database
    public function __construct(){
        $this->db = new Database();
    }
//    This function gets all the data from the instructors and cars tables
    public function findInstructors()
    {
        try{
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
        //        var_dump($result);
        return $this->db->resultSet();
    }catch (PDOException $e){
            logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
            return 0;
        }
    }
}
