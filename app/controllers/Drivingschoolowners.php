<?php

namespace TDD\controllers;

use TDD\libraries\Controller;

class Drivingschoolowners extends Controller
{
  // Constructor
  public function __construct()
  {
    // Call models car and instructor
    $this->carModel = $this->model('Car');
    $this->instructorModel = $this->model('Instructor');
  }

  // Method to display view visitors/index with data
  public function index()
  {
    // Retrieve all cardata and instructordata
    $cardata = $this->carModel->getCars();
    $instructorcardata = $this->instructorModel->getInstructorCars();
    // Generate a table with columns : name(instructor), car, type
    $instructorrow = '<table class="table"><thead><tr><th>Name</th><th>Car</th><th>Type</th></tr></thead><tbody>';
    // Generate a table row and table data for every row of information in the database
    foreach ($instructorcardata as $ins) {
      $instructorrow .= '<td>' . $ins->naam . '</td>';
      // If there is a license available, put this into the table data.
      if (isset($ins->kenteken)) {
        $instructorrow .= '<td>' . $ins->kenteken . '</td>';
        $instructorrow .= '<td>' . $ins->type . '</td></tr>';
        // If there is not a license available, return none in the table data.
      } else {
        $instructorrow .= '<td>None</td>';
        $instructorrow .= '<td>None</td></tr>';
      }
    }
    $instructorrow .= '</tbody></table>';

    // Generate a table with available cars (License number and type)
    $availablecars = '<table class="table"><thead><tr><th>Licence Number</th><th>Type</th></tr></thead><tbody>';
    // Generate a table row and table data for every row of information in the database
    foreach ($cardata as $cd) {
      if ($cd->eigenaar == NULL) {
        $availablecars .= '<tr><td>' . $cd->kenteken . '</td>';
        $availablecars .= '<td>' . $cd->type . '</td>';
      }
    }
    $availablecars .= '</tbody></table>';

    $data = [
      'title' => 'Driving school owner Index',
      'instructordata' => $instructorrow,
      'availablecars' => $availablecars
    ];

    $this->view('drivingschoolowners/index', $data);
  }
}