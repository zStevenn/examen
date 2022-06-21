<?php

  use TDD\libraries\Database;

  class ActiveStudent {
    // Properties, fields
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getActiveStudents() {
      $this->db->query("SELECT  LES.les_id
                                ,STT.studentname
                                ,INS.instructorname
                                ,STT.streetname
                                ,LES.lessondate
                                ,STT.studentemail
                                ,INS.instructoremail
                        FROM        les AS LES
                        INNER JOIN  student AS STT
                              ON  LES.les_id = STT.les_id
                        INNER JOIN  instructor AS INS
                              ON  LES.les_id = INS.les_id 
                              ORDER BY `les_id` ASC;");
      $result = $this->db->resultSet();
      return $result;
    }
  }    
