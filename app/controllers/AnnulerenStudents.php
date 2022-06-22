<?php
namespace TDD\controllers;

use TDD\libraries\Controller;

class AnnulerenStudents extends Controller 
{
    // Properties, fields
    private $AnnulerenStudentModel;

    // Dit is de constructor
    public function __construct()
    {
        $this->AnnulerenStudentModel = $this->model('AnnulerenStudent');
    }

    public function index()
    {
        /**
         * Haal via de method getAnnulerenStudents() uit de model AnnulerenStudent de records op
         * uit de database
         */
        $AnnulerenStudents = $this->AnnulerenStudentModel->getAnnulerenStudents();

        /**
         * Maak de inhoud voor de tbody in de view
         */
        $rows = '';
        foreach ($AnnulerenStudents as $value){
            $rows .= "<tr>
                        <td>" . $value->datum . "</td>
                        <td>" . $value->naam . "</td>
                        <td>" . $value->status . "</td>
                        <td><a href='" . URLROOT . "/annulerenstudents/create/$value->id'><i class='bi bi-bandaid'></i></a></td>
                        </tr>";
        }


        $data = [
        'title' => '<h3>AnnulerenStudents</h3>',
        'AnnulerenStudents' => $rows
        ];
        $this->view('annulerenstudents/index', $data);
    }
    
    public function create($id = null) {
        
        /**
         * Default waarden voor de view create.php
         */

        $data = [
        'title' => '<h3>Voeg een Reden toe</h3>',
        'Reden' => '',
        'id' => $id,
        'RedenError' => '',
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
            'title' => '<h3>Voeg een Reden toe</h3>',
            'Reden' => trim($_POST['Reden']),
            'id' => trim($_POST['id']),
            'RedenError' => '',
            ];
            $data = $this->validateCreateForm($data);
            // if empty error
            if (empty($data['RedenError'])) {
                if ($this->AnnulerenStudentModel->createReden($_POST)) {
                    header("refresh:5;url=" . URLROOT . "/annulerenstudents/index");
                    echo "<div class='alert alert-succes' role='alert'>
                        les is  geannuleerd .
                        </div>";
                    
                } else {
                    echo "<div class='alert alert-danger' role='alert'>
                            Er heeft een interne servererror plaatsgevonden<br>probeer het later nog eens...
                        </div>";
                    header("Refresh:3; url=" . URLROOT . "/annulerenstudents/index");
                }
            }
        } 

        $this->view("annulerenstudents/create", $data);    
    }

    private function validateCreateForm($data) {
        if (empty($data['Reden'])) {
        $data['RedenError'] = 'Reden is leeg';
        }
        return $data;
    }

}