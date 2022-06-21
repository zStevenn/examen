<?php

use TDD\libraries\Database;

class Lessonpackage
{
  // Properties, fields
  private $db;
  private $packagename;
  private $packagedescription;

  public function __construct()
  {
    $this->db = new Database();
  }

  // Method to retrieve all lesson packages
  public function getAllLessonpackages()
  {
    $this->db->query("SELECT * FROM `lessonpackage` ORDER BY `lessonpackageid` ASC;");
    $result = $this->db->resultSet();
    return $result;
  }
}
