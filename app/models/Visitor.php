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
  public function signupForLessonpackage()
  {
  }
}
