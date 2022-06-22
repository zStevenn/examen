<?php 
  use TDD\libraries\Database;
class Annoucement {
    private $db;

    public function __construct() {
      $this->db = new Database();
    }
    public function annoucement($id){
    
      $sql = "SELECT `an` .Announcement, `in` .Id  FROM `announcementsin`as `an` INNER JOIN `instructor` as `in` WHERE `in` .Id = $id";

      $this->db->query($sql);
      // Returns 1 data row
      $data = $this->db->single();
      // Return data
      return $data;

    }
    public function createannoucement($post) {
      var_dump($post);
    
     $this->db->bind(':ID', NULL, PDO::PARAM_INT);
     $this->db->bind(':Instructor', $post["id"], PDO::PARAM_STR);
     $this->db->bind(':announcement', $post["announcement"], PDO::PARAM_STR);

      $sql = "INSERT INTO `announcementsin`( `Instructor`, `Announcement`) VALUES (:Instructor, ':announcement')";
      
   
     

      // Prepare sql statement
      $this->db->query($sql);
  
      // Execute sql statement
     return $this->db->execute();
  
     
  
    } 
    
  
}

  ?>