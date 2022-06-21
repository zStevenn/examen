<?php 
  use TDD\libraries\Database;
class ViewTable {
    private $db;

    public function __construct() {
      $this->db = new Database();
    }
    public function ViewInstructor(){
        $sql = "SELECT `Name`, `Phonenumber`, `Id`, `Gender` FROM `instructor`";
                       

        $this->db->query($sql);
        
        $result = $this->db->resultSet();

        return $result;
    }
    public function ViewStudent(){
        $sql = "SELECT `id`, `Name` FROM `student`";
                       

        $this->db->query($sql);
        
        $result = $this->db->resultSet();

        return $result;
    }
  }
  ?>