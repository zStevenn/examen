<?php
namespace TDD\controllers;

use TDD\libraries\Controller;

class Vehicles extends Controller
{
public function __construct() {
    $this->readmodel = $this->model('ReadVehicle');
   
}

public function index(){
    $vehicle = $this->readmodel->viewVehicle();
    
    $rows = "";
    // Makes a for loop for every row from the function ViewVehicle()
    foreach ($vehicle as $v) {
      // Changes the bool output to a 'ja' or 'nee' depending if it is true or false 
      if ($v->electric == 1){
        $v->electric =  "Ja";
      } else {
        $v->electric =  "Nee";
      } 
      $rows .= "<tr>";
      $rows .= "<td scope='row'>" . $v->brand . "</td>";
      $rows .= "<td>" . $v->type  . "</td>";
      $rows .= "<td>" . $v->license_plate  . "</td>";
      $rows .= "<td>" . $v->electric . "</td>";
      $rows .= "<td>" . $v->instructor_name . "</td>";
      
      $rows .= "</tr>";
    }
   
    $VehicleRows = $rows;
    
    $this->view('vehicles/index', $VehicleRows);
}

}


?>