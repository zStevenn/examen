<?php

use TDD\libraries\Database;

class Mileage{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function findMileage(){
        $this->db->query("SELECT  MIL.car,
		                              CAR.type,
		                              MIL.date,
                                      MIL.mileage 
        
                              FROM mileage as MIL

                              INNER JOIN cars1 as CAR
                              ON MIL.car = CAR.license_plate
                              ");

        $result = $this->db->resultSet();
        return $result;
    }

}