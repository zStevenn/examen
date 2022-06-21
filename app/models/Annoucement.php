<?php 
  use TDD\libraries\Database;
class Annoucement {
    private $db;

    public function __construct() {
      $this->db = new Database();
    }
    public function annoucement(){
      $id = $_GET['id'];
      $sql = "SELECT `an` .ID, `an` .Instructor, `an` .Announcement, `in` .Id  FROM `announcementsin`as `an` INNER JOIN `instructor` as `in` WHERE `in` .Id = $id";

      $this->db->query($sql);
      // Returns 1 data row
      $data = $this->db->single();
      // Return data
      return $data;

    }
    public function updateannoucement($data, $id) {
  
      //SQL Statement
      
      
   
      $this->db->bind(':instructor' , $data['announcement']);

      // Prepare sql statement
      $this->db->query("INSERT INTO announcementsin( Instructor, Announcement) VALUES ($id, :announcement)");
  
      // Execute sql statement
     return $this->db->execute();
  
     
  
    } 
    
  
}

  ?>