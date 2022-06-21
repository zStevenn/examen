<?php

namespace TDD\controllers;

class Mileages extends \TDD\libraries\Controller
{
    private $mileageModel;

//The constructor binds the controller to the model
    public function __construct(){
        $this->mileageModel = $this->model('Mileage');
    }
    //Index method builds the table body for the view
    public function index(){
//        Sets a variable to the data from the Modal
        $mileage = $this->mileageModel->findMileage();

        $rows ='';

        foreach ($mileage as $value){
            $rows .= "<tr>
                        <td>" . $value->car . "</td>
                        <td>" . $value->type . "</td>
                        <td>" . $value->date . "</td>
                        <td>" . $value->mileage . "<a href='" . URLROOT . "/mileages/update/$value->car'><i class='bi bi-pencil-square'></i></a></td>
                        <td></td>
                        </tr>";
        }

        $data = [
           'title'=>'Mileage',
           'Mileage'=>$rows
        ];

        $this->view('mileages/index', $data);
    }

    public  function update($car = null)
    {
//  Checks if superglobal sever method is post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//    Sets data to the values from the POST Array
            $data = [
                'title' => "Add the new mileage",
                'id'=> $_POST['id'],
                'car'=> $_POST['car'],
                'mileage' => $_POST['mileage'],
                'mileageError' => ''
            ];

//            var_dump($data['mileage']);
//            var_dump($this->mileageModel->findCarMileage($_POST['car'])->mileage);

//            Checks if the mileage has been added
            if(empty($data['mileage'])){
                $data['mileageError'] = 'You have to add a mileage';
            }
//            Checks if the mileage isnt the same or lower as before
            if ($data['mileage'] <= $this->mileageModel->findCarMileage($_POST['car'])->mileage){
                $data['mileageError'] = 'Your mileage may not be the same or lower then it already was';
            }
//            Checks if there are no Errors
            if(
                empty($data['mileageError'])
            ){
//                Sendt the data to the model
                if($this->mileageModel->updateMileage($data)){
                    echo "<div class='alert alert-success' role='alert'>
                            Ur mileage has been added.
                        </div>";
                    header("Refresh:2; url=" . URLROOT . "/mileages/index");
                } else {
                    echo "<div class='alert alert-danger' role='alert'>
                            There was a error adding your mileage<br>Please try again later
                        </div>";
                    header("Refresh:2; url=" . URLROOT . "/countries/index");
                }
            }

            $this->view('mileages/update', $data);

        } else {
//            Sets a checks the database for the data
            $row = $this->mileageModel->findCarMileage($car);
//            Sets the data to that whats in the database
            $data = [
                'title' => "Add the new mileage",
                'id'=> $row->id,
                'car'=> $row->car,
                'mileage' => $row->mileage,
                'mileageError' => ''
            ];
            $this->view('mileages/update', $data);
        }
    }
    public function test(){
        return "Test";
    }
}