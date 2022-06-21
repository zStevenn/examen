<?php

use TDD\libraries\Database;

class Instructor
{
  // Properties, fields
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  // Method to select all car details from table `auto`
  public function getInstructorCars()
  {
    // SQL Statement to select the kenteken, type and naam from tables auto and instructeur
    $this->db->query('SELECT `INS`.`naam`, `AU`.`kenteken`, `AU`.`type` FROM `instructeur` as `INS` LEFT JOIN `auto` as `AU` ON `AU`.`eigenaar` = `INS`.`instructeurid`;');
    $result = $this->db->resultSet();
    return $result;
  }
}
