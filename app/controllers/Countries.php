<?php
namespace TDD\controllers;

use TDD\libraries\Controller;

class Countries extends Controller 
{
    // Properties, fields
    private $countryModel;

    // Dit is de constructor
    public function __construct()
    {
        $this->countryModel = $this->model('Country');
    }

    public function index()
    {
        /**
         * Haal via de method getCountries() uit de model Country de records op
         * uit de database
         */
        $countries = $this->countryModel->getCountries();

        /**
         * Maak de inhoud voor de tbody in de view
         */
        $rows = '';
        foreach ($countries as $value){
            $rows .= "<tr>
                        <td>" . $value->name . "</td>
                        <td>" . $value->capitalCity . "</td>
                        <td>" . $value->continent . "</td>
                        <td>" . number_format($value->population, 0, ',', '.') . "</td>
                        <td><a href='" . URLROOT . "/countries/update/$value->id'><i class='bi bi-pencil-square'></i></a></td>
                        <td><a href='" . URLROOT . "/countries/delete/$value->id'><i class='bi bi-x-square'></i></a></td>
                        </tr>";
        }


        $data = [
        'title' => '<h3>Landenoverzicht</h3>',
        'countries' => $rows
        ];
        $this->view('countries/index', $data);
    }

    
    public function scanCountry() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $record = $this->countryModel->getSingleCountryByName($_POST["country"]);

        $rowData = "<tr>
                    <td>$record->id</td>
                    <td>$record->name</td>
                    <td>$record->capitalCity</td>
                    <td>$record->continent</td>
                    <td>$record->population</td>
                    </tr>";

        $data = [
        'title' => 'Dit is het gescande land',
        'rowData' => $rowData
        ];

        $this->view('countries/scanCountry', $data);
        } else {
            $data = [
            'title' => 'Scan het land',
            'rowData' => ""
            ];

            $this->view('countries/scanCountry', $data);
        }
    }

    public function sayMyName()
    {
        return "Arjan";
    }
}