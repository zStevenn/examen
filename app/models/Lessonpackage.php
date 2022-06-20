<?php

use TDD\libraries\Database;

class Country
{
  // Properties, fields
  private $db;
  private $packagename;
  private $packagedescription;

  public function __construct()
  {
    $this->db = new Database();
  }
}
