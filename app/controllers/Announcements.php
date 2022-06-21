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
    public function annoucement() {
        $data =$this->AnnouncementModel->annoucement();
        $this->view('announcements/annoucement', $data);
  
    }
    public function updateannoucement()
    {   
        $data =[
                
                    'instructor' => 'announcement'
                  
                ];
        
        

        if (isset($_POST)) {
            // Check if submit button is pressed
            if (isset($_POST["submit"])) {
              // Put post values into variables
              $data = [
                'instructor' => $_POST['announcement']
              ];
              $id = $_GET["id"];
             
              $this->AnnouncementModel->updateannoucement($id, $data);
      
              //Check if variables are not empty
            
            }
          }
      
        $this->AnnouncementModel->updateannoucement($id, $data);
       
    }
  

}
