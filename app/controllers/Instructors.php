<?php

namespace TDD\controllers;

use TDD\libraries\Controller;

class Instructors extends Controller
{
    private $instructorModel;


    public function __construct(){
        {
            $this->instructorModel = $this->model('Instructor');
        }
    }

    public function index(){
        $instructors = $this->instructorModel->findInstructors();

        $rows='';

        $data = [
            'title'=>'<h3>Instructors</h3>',
            'Instructors'=> $rows
        ];

        foreach ($instructors as $value){
            $rows .= "<tr>
                        <td>" . $value->email . "</td>
                        <td>" . $value->firstname . "</td>
                        <td>" . $value->lastname . "</td>
                        <td>" . $value->phonenumber . "</td>
                        <td>" . $value->address . "</td>
                        <td>" . $value->license_plate . "</td>
                        <td>" . $value->brand . "</td>
                        <td>" . $value->model . "</td>
                        <td>" . $value->electric . "</td>
                        </tr>";
        }

        $this->view('instructors/index', $data);
    }

}