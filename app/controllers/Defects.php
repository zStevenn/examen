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
                        <td><a href='" . URLROOT . "/defects/create/$value->Kenteken'><i class='bi bi-bandaid'></i></a></td>
                        </tr>";
        }


        $data = [
        'title' => '<h3>Defects</h3>',
        'Defects' => $rows
        ];
        $this->view('Defects/index', $data);
    }
    public function create() {
        /**
         * Default waarden voor de view create.php
         */

        $data = [
        'title' => '<h3>Voeg een mankement toe</h3>',
        'Kenteken' => '',
        'Mankement' => '',
        'KentekenError' => '',
        'MankementError' => '',
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
            'title' => '<h3>Voeg een mankement toe</h3>',
            'Kenteken' => trim($_POST['Kenteken']),
            'Mankement' => trim($_POST['Mankement']),
            'KentekenError' => '',
            'MankementError' => '',
            ];

            $data = $this->validateCreateForm($data);
        
            if (empty($data['KentekenError']) && empty($data['MankementError']) && empty($data['MankementError'])) {
                if ($this->MankementModel->createMankement($_POST)) {
                    header("Location:" . URLROOT . "/defects/index");
                } else {
                    echo "<div class='alert alert-danger' role='alert'>
                            Er heeft een interne servererror plaatsgevonden<br>probeer het later nog eens...
                        </div>";
                    header("Refresh:3; url=" . URLROOT . "/defects/index");
                }
            }
        } 

        $this->view("defects/create", $data);    
    }

    private function validateCreateForm($data) {
        if (empty($data['Mankement'])) {
        $data['MankementError'] = 'Mankement is leeg';
        }
        return $data;
    }

}


