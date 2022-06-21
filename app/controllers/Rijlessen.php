<?php

namespace TDD\controllers;

use TDD\libraries\Controller;

class Rijlessen extends Controller
{
    private $Rijless;

    public function __construct()
    {
        //use model RijLes
        $this->Rijless = $this->model('Rijles');
    }

    public function index()
    {
        //get the methode in the model
        $Rijdata =$this->Rijless->getLesson();
        // make the row for the data as empty
        $rows = "";
        // get the data that is needed
        foreach ($Rijdata as $value){
            $rows .= "<tr>
                        <td>" . $value->Datum . "</td>
                        <td>" . $value->Onderdeel . "</td>
                        <td><a href='" . URLROOT . "/rijlessen/create/$value->ID'><i class='bi bi-pencil-square'></i></a></td>
                        </tr>";
        }
        // put the needed data in an array
        $data =
            [
                'row'=>$rows
            ];

        $this->view('rijlessen/index', $data);
    }

    public function create($id = null)
    {
        //put data in an array
        $data =
            [
                'les' => '',
                'opm' => '',
                'opmError' => ''
            ];

        //look if there is a post send
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST);
            $data =
                [
                    'les' => $_POST['les'],
                    'opm' => $_POST['opm']
                ];

            $data = $this->validateCreateForm($data);

            if (empty($data['opmError'])) {
                if ($this->Rijless->createOpmerking($data))
                {
                    echo 'opmerking toegevoegd';
                    header("refresh:3;url=" . URLROOT . "/rijlessen/index");
                }
            }else
            {
                    echo "<div class='alert alert-danger' role='alert'>
                            opmerking leeg
                        </div>";
                    header("Refresh:3; url=" . URLROOT . "/rijlessen/index");

            }

        } else {
            $row = $this->Rijless->getSingleLes($id);
            $data = [
                'title' => '<h1> create opmerking </h1>',
                'row' => $row
            ];

            $this->view("rijlessen/create", $data);
        }



    }
    private function validateCreateForm($data)
    {
        if (empty($data['opm'])) {
            $data['opmError'] = 'opmerking is leeg';
        }
        return $data;
    }
}