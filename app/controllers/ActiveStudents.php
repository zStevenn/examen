<?php
namespace TDD\controllers;

use TDD\libraries\Controller;

class ActiveStudents extends Controller 
{
    // Properties, fields
    private $ActiveStudentModel;

    // Dit is de constructor
    public function __construct()
    {
        $this->ActiveStudentModel = $this->model('ActiveStudent');
    }

    public function index()
    {
        /**
         * Haal via de method getActiveStudents() uit de model ActiveStudent de records op
         * uit de database
         */
        $ActiveStudents = $this->ActiveStudentModel->getActiveStudents();

        /**
         * Maak de inhoud voor de tbody in de view
         */
        $rows = '';
        foreach ($ActiveStudents as $value){
            $rows .= "<tr>
                        <td>" . $value->studentname . "</td>
                        <td>" . $value->instructorname . "</td>
                        <td>" . $value->streetname . "</td>
                        <td>" . $value->lessondate . "</td>
                        <td>" . $value->studentemail . "</td>
                        <td>" . $value->instructoremail . "</td>
                        </tr>";
        }


        $data = [
        'title' => '<h3>ActiveStudents</h3>',
        'ActiveStudents' => $rows
        ];
        $this->view('ActiveStudents/index', $data);
    }
}