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
            $rows .= "<td> . <a class='btn btn-xs btn-info' href=" . URLROOT . "/announcements/create?id=$I->Id>Edit . </td>";
            # $rows .= "<td>" .  . "</td>";
            $rows .= "</tr>";
        }
        $InstructorRows = $rows;
        $Student = $this->ViewTableModel->ViewStudent();
        $rows = "";
        foreach ($Student as $S) {
            $rows .= "<tr>";
            $rows .= "<td>" . $S->Name . "</td>";
            $rows .= "<td> . <a class='btn btn-xs btn-info' href=" . URLROOT . "/announcements/create?id=$S->id>Edit . </td>";
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
        // $data = [
        //     'id' =>   $id,    
        //     'announcement' => $_POST['announcement'],
        //     'announcementError' => ''

        //     ];
  
        $this->view('announcements/create');
    }
    public function CreateAnnoucement()
    {   
        
     $id = $_GET['id'];
   

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $_POST = filter_input_array(INPUT_POST);

            $data = [
            'id' =>   $id,    
            'announcement' => $_POST['announcement'],
            'announcementError' => ''

            ];
            if (empty($data['announcementError']))
                {
                if ($this->AnnouncementModel->createannoucement($_POST)) {
                    /**
                     * Dan een melding dat de gegevens zijn gewijzigd
                     */
                    echo "<div class='alert alert-success' role='alert'>
                            Uw gegevens zijn gewijzigd.
                        </div>";
                    // header("Refresh:3; url=" . URLROOT . "/announcements/index");
                } else {
                    /**
                     * Anders de melding dat er een interne servererror heeft plaatsgevonden
                     */
                    echo "<div class='alert alert-danger' role='alert'>
                            Er heeft een interne servererror plaatsgevonden<br>probeer het later nog eens...
                        </div>";
                     // header("Refresh:3; url=" . URLROOT . "/announcements/index");
                }   
            }
            $this->view('announcements/create', $data);
            
        }else 
        {

                $row = $this->AnnouncementModel->annoucement($id);
                $data = [
                    'id' =>   $row->Id,    
                    'announcement' => $row->Announcement,
                    'announcementError' => ''
                ];
                $this->view('announcements/create', $data);
            }
        
            
        
      
        
    }
  

}
