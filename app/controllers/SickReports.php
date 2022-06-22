<?php

namespace TDD\controllers;

class SickReports extends \TDD\libraries\Controller
{
    private $sickReportsModel;
    public function __construct(){
        $this->sickReportsModel = $this->model('SickReport');
    }

    public function index(){
        $sickReports = $this->sickReportsModel->findSickReports();
        $newSickReports = $this->sickReportsModel->findNewSickReports();

        $rows = '';
        $newRows = '';
        foreach ($sickReports as $value){
            if($value->better == NULL){
                $value->better = 'Not yet';
            }

//        sets the rows variable to return the values from the database
            $rows .= "<tr>
                        <td>" . $value->Name . " <a href='" . URLROOT . "/sickreports/viewsickreports/$value->intructor'><i class='bi bi-eye'></i></a></td>
                        <td>" . $value->Phonenumber . "</td>
                        <td>" . $value->intructor . " </td>
                        <td>" . $value->date_time . "</td>
                        <td>" . $value->reason . "</td>
                        <td>" . $value->better . "</td>
                        <td><a href='" . URLROOT . "/sickreports/addaction/$value->id'><i class='bi bi-pencil-square'></i></a></td>
                        <td></td>
                        </tr>";
        }
        foreach ($newSickReports as $value){
            $newRows .= "<tr>
                        <td>" . $value->Name . " <a href='" . URLROOT . "/sickreports/viewsickreports/$value->intructor'><i class='bi bi-eye'></i></a></td>
                        <td>" . $value->Phonenumber . "</td>
                        <td>" . $value->intructor . " <a href='" . URLROOT . "/sickreports/viewsickreports/$value->intructor'><i class='bi bi-eye'></i></a></td>
                        <td>" . $value->date_time . "</td>
                        <td>" . $value->reason . "</td>
                        <td><a href='" . URLROOT . "/sickreports/addaction/$value->id'><i class='bi bi-pencil-square'></i></a></td>
                        <td></td>
                        </tr>";
        }


        $data = ['title'=>'Sick Report',
                 'sickreports'=> $rows,
                 'newsickreports' => $newRows
        ];
        $this->view('sickreports/index', $data);
    }

    public function addAction(?int $id = null){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//    Sets data to the values from the POST Array

            $data = [
                'title' => "Add Action",
                'intructor'=>$_POST['intructor'],
                'id'=> $_POST['id'],
                'sick_report'=> $_POST['id'],
                'action' => $_POST['action'],
                'actionError' => ''
            ];

            if(empty($data['action'])){
                $data['actionError'] = "<div class='alert alert-danger' role='alert'>Action was not added for: " . $data['intructor'] . " action empty</div>";
            }

//            Checks if there are no Errors
            if(
                empty($data['actionError'])
            ){
//                Sendt the data to the model
                if($this->sickReportsModel->addAction($data)){
                    echo "<div class='alert alert-success' role='alert'>Action was added for: " . $data['intructor'] . "</div>";
                    header("Refresh:2; url=" . URLROOT . "/sickreport/index");
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Action was not added for: " . $data['intructor'] . " action empty</div>";
                    header("Refresh:2; url=" . URLROOT . "/sickreport/index");
                }
            }

            $this->view('sickreports/addaction', $data);

        } else {
//            Sets a checks the database for the data
            $row = $this->sickReportsModel->findSingleSickReport($id);

//            Sets the data to that whats in the database
            $data = [
                'title' => "Add Action",
                'id'=> $row->id,
                'intructor'=>$row->intructor,
                'action' => '',
                'actionError' => ''
            ];
            $this->view('sickreports/addaction', $data);
        }
    }
//    Loads the data of all sick reports per instructor
    public function viewSickReports($intructor){
        $viewsickreports = $this->sickReportsModel->findInstructorSickReports($intructor);
        $rows = '';

        foreach ($viewsickreports as $value){
            $rows .= "<tr>
                        <td>" . $value->id . "</td>
                        <td>" . $value->date . "</td>
                        <td>" . $value->action . "</td>
                        <td></td>
                        </tr>";
        }

        $data = ['title'=>'View Sick Reports',
            'viewsickreports'=> $rows,
        ];
        $this->view('sickreports/viewsickreports', $data);
    }

}