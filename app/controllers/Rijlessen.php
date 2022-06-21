<?php

namespace TDD\controllers;

use TDD\libraries\Controller;

class Rijlessen extends Controller
{
    private $Rijles;

    public function __construct()
    {
        //use model RijLes
        $this->Rijles = $this->model('Rijles');
    }

    public function index()
    {
        //get the methode in the model
        $Rijdata =$this->Rijles->getLesson();
        // make the row for the data as empty
        $rows = "";
        // get the data that is needed
        foreach ($Rijdata as $value){
            $rows .= "<tr>
                        <td>" . $value->Datum . "</td>
                        <td>" . $value->Onderdeel . "</td>
                        </tr>";
        }
        // put the needed data in an array
        $data =
            [
                'row'=>$rows
            ];

        $this->view('rijlessen/index', $data);
    }
}