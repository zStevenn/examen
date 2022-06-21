<?php

use TDD\libraries\Database;
class Mileage{
    private $db;

//    This is the constructor to make the connection to the database
    public function __construct(){
        $this->db = new Database();
    }
//    This function gets all the data from the mileage and cars1 tables

    public function findMileage()
    {
        try {
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
        } catch (PDOException $e){
            logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
            return 0;
        }
    }
//    Function to check the database for a single car
    public function findCarMileage($car){
        try {
            $this->db->query("SELECT id, car, mileage from mileage where car = :car");

            $this->db->bind(':car', $car);

            return $this->db->single();
        } catch (PDOException $e){
            logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
            return 0;
        }

    }

//    Funcction to update the mileage table with the new data from the controller
    public function updateMileage($data)
    {
        try {
            $this->db->query("UPDATE mileage 
                        SET mileage = :mileage,
                            date = CURRENT_DATE
                            
                        WHERE id = :id");
            $this->db->bind(':mileage', $data['mileage']);
            $this->db->bind(':id', $data['id']);

            return $this->db->execute();
        } catch(PDOException $e) {
            logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
            return 0;
        }
    }

}