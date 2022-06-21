<?php

use TDD\libraries\Database;

class Mileage{
    private $db;

//    This is the constructor to make the connection to the database
    public function __construct(){
        $this->db = new Database();
    }
//    This function gets all the data from the mileage and cars1 tables

    public function findMileage(){
        $this->db->query("SELECT  MIL.car,
		                              CAR.type,
		                              MIL.date,
                                      MIL.mileage 
        
                              FROM mileage as MIL

                              INNER JOIN cars1 as CAR
                              ON MIL.car = CAR.license_plate
                              ");

//          sets the variable result with the help of PDO resultSet
        return $this->db->resultSet();
    }
//    Function to check the database for a single car
    public function findCarMileage($car){
        $this->db->query("SELECT id, car, mileage from mileage where car = :car");

        $this->db->bind(':car', $car);

        return $this->db->single();

    }

//    Funcction to update the mileage table with the new data from the controller
    public function updateMileage($data){
        $this->db->query("UPDATE mileage 
                        SET mileage = :mileage,
                            date = CURRENT_DATE
                            
                        WHERE id = :id");
        $this->db->bind(':mileage', $data['mileage']);
        $this->db->bind(':id', $data['id']);

        return $this->db->execute();
    }

}