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

  // Check if the ID is a valid lessonID
  public function checkValidLesson($id)
  {
    $this->db->query('SELECT * 
                      FROM `lessen` AS `LES`
                      WHERE `LES`.`id` = :id;');
    $this->db->bind(':id', $id, PDO::PARAM_STR);
    $this->db->execute();
    $amount = $this->db->rowCount();
    // If there is 1 row in the database, return true
    if ($amount === 1) {
      return true;
      // If there are 0 rows in the database, return false
    } elseif ($amount === 0) {
      return false;
    }
  }

  // Get all subjects by lesson id
  public function getSubjectsByLessonid($id)
  {
    // Retrieve all data from table `onderwerpen`
    $this->db->query('SELECT * FROM `onderwerpen` AS `OMK` WHERE `OMK`.`les` = :id');
    $this->db->bind(':id', $id, PDO::PARAM_STR);
    return $this->db->resultSet();
  }

  // Add a subject to the database
  public function addSubject(array $data)
  {
    // Try to execute a query
    try {
      // Create SQL query
      $this->db->query('INSERT INTO `onderwerpen` (`id`, `les`, `onderwerp`) VALUES (NULL, :id, :subject);');
      $this->db->bind(':subject', $data['subject'], PDO::PARAM_STR);
      $this->db->bind(':id', $data['id'], PDO::PARAM_STR);
      // Return true if successfully executed
      return $this->db->execute();
    } catch (PDOException $e) {
      // Return a logger if 
      logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
      return 0;
    }
  }
}
