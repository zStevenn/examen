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
    $this->db->query("SELECT * FROM `auto` ORDER BY `kenteken` ASC;");
    $result = $this->db->resultSet();
    return $result;
  }
}
