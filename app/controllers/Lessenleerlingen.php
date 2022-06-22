<?php

namespace TDD\controllers;

use TDD\libraries\Controller;

class Lessenleerlingen extends Controller
{
    private $numberTabel = 1;

    private $lessenModel;

    public function __construct()
    {
        $this->lessenModel = $this->model('Lessenleerling');
    }

    public function index()
    {
        //get the methode in the model
        $lesData =$this->lessenModel->getLesson();
        // make the row for the data as empty
        $rows = "";
        // get the data that is needed
        foreach ($lesData as $value){
            $rows .= "<tr>
                        <td>" . $this->numberTabel++ . "</td>
                        <td>" . $value->Datum . "</td>
                        <td>" . $value->naam . "</td>
                        <td><a href='" . URLROOT . "/lessenleerlingen/opmerking/$value->ID'><i class='bi bi-pencil-square'></i></a></td>
                        <td><a href='" . URLROOT . "/lessenleerlingen/onderwerp/$value->ID'><i class='bi bi-pencil-square'></i></a></td>
                        </tr>";
        }
        // put the needed data in an array
        $data =
            [
                'row'=>$rows
            ];

        $this->view('lessenleerlingen/index', $data);
    }

    public function opmerking($id = null)
    {
        $onderwerpData = $this->lessenModel->getOpmerking($id);

        $rows = '';

        foreach ($onderwerpData as $value){
            $rows .= "<tr>
                        <td>" . $value->Opmerking . "</td>
                        </tr>";
        }

        $data =
            [
                'row'=>$rows
            ];

        $this->view("lessenleerlingen/opmerking", $data);
    }


    public function onderwerp($id = null)
    {
        $onderwerpData = $this->lessenModel->getOnderwerp($id);

        $rows = '';

        foreach ($onderwerpData as $value){
            $rows .= "<tr>
                        <td>" . $value->Onderwerp . "</td>
                        </tr>";
        }

        $data =
            [
                'row'=>$rows
            ];

        $this->view("lessenleerlingen/onderwerp", $data);
    }
}