<?php
namespace TDD\controllers;

use TDD\libraries\Controller;

class Instructors extends Controller
{
    private $instructorModel;

//The constructor binds the controller to the model
    public function __construct(){
        {
            $this->instructorModel = $this->model('Instructor');
        }
    }
//Index method builds the table body for the view
    public function index(){
        $instructors = $this->instructorModel->findInstructors();

        $rows='';


        foreach ($instructors as $value){
//        Checks the value of electric and changes the value to yes or no
            if($value->electric == 1){
                $electric = "Yes";
            } else {
                $electric = "No";
            }
//        sets the rows variable to return the values from the database
            $rows .= "<tr>
                        <td>" . $value->email . "</td>
                        <td>" . $value->firstname . "</td>
                        <td>" . $value->lastname . "</td>
                        <td>" . $value->phonenumber . "</td>
                        <td>" . $value->address . "</td>
                        <td>" . $value->license_plate . "</td>
                        <td>" . $value->brand . "</td>
                        <td>" . $value->model . "</td>
                        <td>" . $electric . "</td>
                        </tr>";
        }



        $data = [
            'title'=>'<h3>Instructors</h3>',
            'instructors'=> $rows
        ];

        $this->view('instructors/index', $data);
    }
}