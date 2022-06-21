<?php
namespace TDD\controllers;

use TDD\libraries\Controller;

class Defects extends Controller 
{
    // Properties, fields
    private $DefectModel;

    // Dit is de constructor
    public function __construct()
    {
        $this->DefectModel = $this->model('Defect');
    }

    public function index()
    {
        /**
         * Haal via de method getDefects() uit de model Defect de records op
         * uit de database
         */
        $Defects = $this->DefectModel->getDefects();

        /**
         * Maak de inhoud voor de tbody in de view
         */
        $rows = '';
        foreach ($Defects as $value){
            $rows .= "<tr>
                        <td>" . $value->Kenteken . "</td>
                        <td>" . $value->Model . "</td>
                        <td><a href='" . URLROOT . "/defects/create/$value->Kenteken'><i class='bi bi-hospital'></i></a></td>
                        </tr>";
        }


        $data = [
        'title' => '<h3>Defects</h3>',
        'Defects' => $rows
        ];
        $this->view('Defects/index', $data);
    }
}