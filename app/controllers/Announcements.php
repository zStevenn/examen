<?php

namespace TDD\controllers;

use TDD\libraries\Controller;

class Announcements extends Controller
{

    // Properties, fields

    private $AnnouncementModel;
    private $ViewTableModel;
    public function __construct()
    {

        $this->ViewTableModel = $this->model('ViewTable');
        $this->AnnouncementModel = $this->model('Annoucement');
    }


    public function index()
    {
        $Instructor = $this->ViewTableModel->ViewInstructor();
        $rows = "";
        foreach ($Instructor as $I) {
            $rows .= "<tr>";
            $rows .= "<td>" . $I->Name . "</td>";
            $rows .= "<td> . <a class='btn btn-xs btn-info' href=/Announcements/annoucement?id=$I->Id>Edit . </td>";
            # $rows .= "<td>" .  . "</td>";
            $rows .= "</tr>";
        }
        $InstructorRows = $rows;
        $Student = $this->ViewTableModel->ViewStudent();
        $rows = "";
        foreach ($Student as $S) {
            $rows .= "<tr>";
            $rows .= "<td>" . $S->Name . "</td>";
            $rows .= "<td> . <a class='btn btn-xs btn-info' href=\Announcements\annoucement?id=$S->id>Edit . </td>";
            # $rows .= "<td>" .  . "</td>";
            $rows .= "</tr>";
        }
        $StudentRows = $rows;


        
        $this->view('announcements/index', $data = [
            'InstructorData' => $InstructorRows,
         
            'StudentData' => $StudentRows
        ]);
       
    }
    public function annoucement()
    {   
        if (isset($_POST)) {
            // Check if submit button is pressed
            if (isset($_POST["submit"])) {
              // Put post values into variables
              $Announcement = $_POST["inputAnnouncement"];
             
      
              //Check if variables are not empty
            
            }
          }
      
        $this->AnnouncementModel->annoucement($Announcement);
        $this->view('announcements/annoucement');
    }
  

}
