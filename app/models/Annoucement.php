<?php 
  use TDD\libraries\Database;
class Annoucement {
    private $db;

    public function __construct() {
      $this->db = new Database();
    }
    public function annoucement($Announcement) {
      $id = $_GET['id'];
      $a = $Announcement;
  
      //SQL Statement
      $sql = "UPDATE `announcementsin` SET 
                      `Announcement`= $a
                       WHERE `Instructor` = $id";
  
  
      // Prepare sql statement
      $this->db->query($sql);
  
      // Execute sql statement
      $this->db->execute();
  
      // Check if query is executed (1 row made)
      if ($this->db->rowCount() === 1)
      {
          // This happens if query is executed successfully
          return "Success";
      } else {
          // This happens if query fails
          return "Failed";
      }
    } 
    
  
}

  ?>