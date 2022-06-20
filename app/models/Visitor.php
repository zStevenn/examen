<?php

use TDD\libraries\Database;

class Visitor
{
  // Properties, fields
  private $db;
  public $email;
  public $firstname;
  public $infix;
  public $lastname;
  public $birthdate;
  public $lessonpackage;

  public function __construct()
  {
    $this->db = new Database();
  }

  // Function to sign up for a lesson package
  public function signupForLessonpackage($post)
  {
    try {
      $this->db->query("INSERT INTO country (id, name, capitalCity, continent, population) 
                          VALUES(:id, :name, :capitalCity, :continent, :population)");

      $this->db->bind(':id', NULL, PDO::PARAM_INT);
      $this->db->bind(':name', $post["name"], PDO::PARAM_STR);
      $this->db->bind(':capitalCity', $post["capitalCity"], PDO::PARAM_STR);
      $this->db->bind(':continent', $post["continent"], PDO::PARAM_STR);
      $this->db->bind(':population', $post["population"], PDO::PARAM_INT);

      return $this->db->execute();
    } catch (PDOException $e) {
      logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
      return 0;
    }
  }
}
