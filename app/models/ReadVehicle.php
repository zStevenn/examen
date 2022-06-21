<?php 
 use TDD\libraries\Database;
class ReadVehicle {
    private $db;

    public function __construct(){

        $this->db = new Database;
    }
    // A function to get data out of the vehicles and instructor table
    public function viewVehicle(){
        $sql = "SELECT `VE` .brand, 
                       `VE` .type, 
                       `VE` .license_plate, 
                       `VE` .electric, 
                       `IN` .instructor_name  
                       from  `vehicles` as `VE`
                       INNER JOIN `instructor` as `IN`
                       ON `IN` .license_plate = `VE` .license_plate ";

        $this->db->query($sql);
        
        $result = $this->db->resultSet();

        return $result;
    }
}

?>