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
    $this->db->query('SELECT `INS`.`instructeurid`,`INS`.`naam`, `AU`.`kenteken`, `AU`.`type` FROM `instructeur` as `INS` LEFT JOIN `auto` as `AU` ON `AU`.`eigenaar` = `INS`.`instructeurid`;');
    $result = $this->db->resultSet();
    return $result;
  }

  // Method to retrieve lessonid, date and name from the current instructor
  public function getInstructorSchedule(string $instructor)
  {
    // SQL Statement to select the lessonid, name and date
    $this->db->query('SELECT `LES`.`id`,`LES`.`datum`, `LNG`.`naam` 
                        FROM `lessen` as `LES` 
                        INNER JOIN `leerling` AS `LNG` 
                        ON `LES`.`leerling` = `LNG`.`id` 
                        WHERE `instructeur1` = :instructeur;');
    // Bind type and instructor in query
    $this->db->bind(':instructeur', $instructor, PDO::PARAM_STR);
    $result = $this->db->resultSet();
    return $result;
  }
}
