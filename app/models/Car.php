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
}
