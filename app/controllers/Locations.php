<?php

namespace TDD\controllers;

use TDD\libraries\Controller;

class Locations extends Controller
{
    private $locationModel;

    // Dit is de constructor
    public function __construct()
    {
        $this->locationModel = $this->model('Location');
    }
    public function index()
    {
        $Lessons = $this->locationModel->getLessons();

        /**
         * Maak de inhoud voor de tbody in de view
         */
        $rows = '';
        foreach ($Lessons as $l) {
            $rows .= "<tr>
        <td>" . $l->Datum . "</td>
        <td>" . $l->Woonplaats . "</td>
        <td>" . $l->Straat . "</td>
        <td>" . $l->Name . "</td>

                    </tr>";
        }

        $rows2 = '';
        foreach ($Lessons as $l) {
            $rows2 .= "<tr>
        <td>" . $l->Id . "</td>
        <td>" . $l->Datum . "</td>
        <td>" . $l->Woonplaats . "</td>
        <td>" . $l->Straat . "</td>
        <td>" . $l->Name . "</td>
        <td><a href='" . URLROOT . "/locations/create/$l->Id'><i class='bi bi-pencil-square'></i></a></td>
                    </tr>";
        }

        $data = [
            'alllessons' => $rows,
            'editlessons' => $rows2
        ];
        $this->view('locations/index', $data);
    }
    public function create()
    {
        /**
         * Default waarden voor de view create.php
         */

        $data = [
            'Id' => '',
            'Straat' => '',
            'Woonplaats' => '',
            'StraatError' => '',
            'WoonplaatsError' => ''

        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'Id' => trim($_POST['Id']),
                'Straat' => trim($_POST['Straat']),
                'Woonplaats' => trim($_POST['Woonplaats']),

                'StraatError' => '',
                'WoonplaatsError' => ''

            ];

            $data = $this->validateCreateForm($data);

            if (empty($data['StraatError']) && empty($data['WoonplaatsError'])) {
                if ($this->locationModel->ChangePickup($_POST)) {
                    header("Location:" . URLROOT . "/locations/index");
                } else {
                    // echo "<div class='alert alert-danger' role='alert'>
                    //     Er heeft een interne servererror plaatsgevonden<br>probeer het later nog eens...
                    // </div>";
                    // header("Refresh:3; url=" . URLROOT . "/countries/index");
                }
            }
        }

        $this->view("locations/create", $data);
    }
    private function validateCreateForm($data)
    {
        if (empty($data['Straat'])) {
            $data['StraatError'] = 'Je hebt geen geen straat ingevuld!';

        }

        if (empty($data['Woonplaats'])) {
            $data['WoonplaatsError'] = 'Je hebt geen woonplaats ingevuld';
   
        }
    }
}
