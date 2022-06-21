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
}
