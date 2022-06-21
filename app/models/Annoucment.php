<?php 
  use TDD\libraries\Database;
class Country {
    private $db;

    public function __construct() {
      $this->db = new Database();
    }
  }
  ?>