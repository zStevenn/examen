<?php

use TDD\libraries\Database;

class Car
{
  // Properties, fields
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  // Method to select all car details from table `auto`
  public function getCars()
  {
    // Try to retrieve all information from table auto
    try {
      $this->db->query("SELECT * FROM `auto` ORDER BY `kenteken` ASC;");
      $result = $this->db->resultSet();
      return $result;
      // Return a log if it doesn't work
    } catch (PDOException $e) {
      logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
      return 0;
    }
  }

  // Method to update car owner in table `auto`
  public function updateCarOwner($post)
  {
    // Try to update the car owner
    try {
      // SQL statement to update car owner
      $this->db->query("UPDATE auto 
                        SET eigenaar = :eigenaar 
                        WHERE kenteken = :kenteken;");

      // Bind type and instructor in query
      $this->db->bind(':kenteken', $post["type"], PDO::PARAM_STR);
      $this->db->bind(':eigenaar', $post["instructor"], PDO::PARAM_STR);

      // Execute SQL statement
      return $this->db->execute();
    } catch (PDOException $e) {
      logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
      return 0;
    }
  }
}
