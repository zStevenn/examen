<?php

use TDD\libraries\Database;



class SickReport
{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
//Vinds all data from sickreports where the date is not today
    public function findSickReports(){
        try {
            $this->db->query('SELECT SR.id,
                                         SR.intructor,
                                         I.Name,
                                         I.Phonenumber,
                                         SR.date_time,
                                         SR.reason,
                                         SR.better
                                  FROM `sick_reports` as SR
                                  INNER JOIN instructors1 AS I on SR.intructor = I.Email
                                  WHERE DATE(date_time) != CURDATE() ORDER BY SR.date_time DESC');

            return $this->db->resultSet();

        } catch (PDOException $e){
            logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
            return 0;
        }

    }
//Vinds all data from sickreports where the date is today
    public function findNewSickReports(){
        try {
            $this->db->query('SELECT SR.id,
                                         SR.intructor,
                                         I.Name,
                                         I.Phonenumber,
                                         SR.date_time,
                                         SR.reason,
                                         SR.better
                                  FROM `sick_reports` as SR
                                  INNER JOIN instructors1 AS I on SR.intructor = I.Email
                                  WHERE DATE(date_time) = CURDATE() ORDER BY SR.date_time DESC');

            return $this->db->resultSet();

        } catch (PDOException $e){
            logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
            return 0;
        }
    }
//Finds a single sick report
    public function findSingleSickReport($id){
        try {
            $this->db->query("SELECT id, intructor from sick_reports where id = :id");

            $this->db->bind(':id', $id);

            return $this->db->single();
        } catch (PDOException $e){
            logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
            return 0;
        }
    }
//Inserts an action
    public function addAction($sick_report){
        try{
            $this->db->query('INSERT INTO sick_reports_actions (id, sick_report, date, action) values (:id, :sick_report, CURRENT_DATE, :action)');

            $this->db->bind(':id', NULL);
            $this->db->bind(':sick_report', $sick_report['id']);
            $this->db->bind(':action', $sick_report['action']);

            return $this->db->execute();



        } catch (PDOException $e){
            logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
            return 0;
        }
    }
//Finds all sick report for the instructor
    public function findInstructorSickReports($intructor){
        try{
            $this->db->query('SELECT SR.id ,SR.intructor, SRA.date, SRA.action 
                                        FROM sick_reports as SR
                                  INNER JOIN sick_reports_actions as SRA 
                                        ON SR.id = SRA.sick_report 
                                        WHERE intructor = :intructor');

            $this->db->bind(':intructor', $intructor);

            return $this->db->resultSet();

        } catch (PDOException $e){
            logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
            return 0;
        }
    }




}