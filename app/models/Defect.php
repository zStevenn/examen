<?php

  use TDD\libraries\Database;

  class Defect {
    // Properties, fields
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getDefects() {
      $this->db->query("SELECT  Kenteken
                                ,Model
                        FROM    `auto`;");
      $result = $this->db->resultSet();
      return $result;
    }
  }    
