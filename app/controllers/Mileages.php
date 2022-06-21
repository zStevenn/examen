<?php

namespace TDD\controllers;

class Mileages extends \TDD\libraries\Controller
{
    private $mileageModel;

    public function __construct(){
        $this->mileageModel = $this->model('Mileage');
    }

    public function index(){
        $mileage = $this->mileageModel->findMileage();

        $rows ='';

        foreach ($mileage as $value){
            $rows .= "<tr>
                        <td>" . $value->car . "</td>
                        <td>" . $value->type . "</td>
                        <td>" . $value->date . "</td>
                        <td>" . $value->mileage . "</td>
                        </tr>";
        }

        $data = [
           'title'=>'Mileage',
           'Mileage'=>$rows
        ];

        $this->view('mileages/index', $data);
    }

}