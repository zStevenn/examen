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
      $this->db->query("INSERT INTO visitor (email, firstname, infix, lastname, lessonpackage) 
                          VALUES(:email, :firstname, :infix, :lastname, :lessonpackage)");

      $this->db->bind(':email', $post["email"], PDO::PARAM_STR);
      $this->db->bind(':firstname', $post["firstname"], PDO::PARAM_STR);
      $this->db->bind(':infix', $post["infix"], PDO::PARAM_STR);
      $this->db->bind(':lastname', $post["lastname"], PDO::PARAM_STR);
      $this->db->bind(':lessonpackage', $post["lessonpackage"], PDO::PARAM_INT);

      return $this->db->execute();
    } catch (PDOException $e) {
      logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
      return 0;
    }
  }
}
