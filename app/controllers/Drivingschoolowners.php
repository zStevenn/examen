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

  // Method to display view drivingschoolowners/index with data
  public function index()
  {
    // Retrieve all cardata and instructordata
    $cardata = $this->carModel->getCars();
    $instructorcardata = $this->instructorModel->getInstructorCars();

    // Generate a table with columns : name(instructor), car, type
    $instructorrow = '<table class="table">';
    $instructorrow .= '<thead><tr>';
    $instructorrow .= '<th>Name</th><th>License</th>';
    $instructorrow .= '<th>Type</th><th>Assign</th>';
    $instructorrow .= '</tr></thead><tbody>';
    // Generate a table row and table data for every row of information in the database
    foreach ($instructorcardata as $ins) {
      // If there is a license available, put this into the table data.
      if (isset($ins->kenteken)) {
        $instructorrow .= '<td>' . $ins->naam . '</td>';
        $instructorrow .= '<td>' . $ins->kenteken . '</td>';
        $instructorrow .= '<td>' . $ins->type . '</td>';
        $instructorrow .= '<td>-</td></tr>';
        // If there is not a license available, return none in the table data.
      } else {
        $instructorrow .= '<td>' . $ins->naam . '</td>';
        $instructorrow .= '<td>None</td>';
        $instructorrow .= '<td><form action="' . URLROOT . '/drivingschoolowners/assign" method="POST"><select name="type">';
        foreach ($cardata as $cd) {
          if ($cd->eigenaar === NULL) {
            $instructorrow .= '<option value="' . $cd->kenteken . '">' . $cd->type . '</option>';
          }
        }
        $instructorrow .= '</select><input type="hidden" name="instructor" value="' . $ins->instructeurid . '"></td>';
        $instructorrow .= '<td><button type="submit" name="assign">Assign</button></form></td></tr>';
      }
    }
    $instructorrow .= '</tbody></table>';

    // Generate a table with available cars (License number and type)
    $availablecars = '<table class="table">';
    $availablecars .= '<thead><tr>';
    $availablecars .= '<th>Licence Number</th><th>Type</th>';
    $availablecars .= '</tr></thead><tbody>';
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

  // Method to display view drivingschoolowners/assign
  public function assign()
  {
    // Declare data as array
    $data = [];

    // Check if a POST request has been send
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Check if the POST request includes an assign
      if (isset($_POST["assign"])) {
        // Filter POST inputs on special characters
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // Create a new array with post values
        $assignCar = [
          'type' => trim($_POST['type']),
          'instructor' => trim($_POST['instructor'])
        ];

        // Check if type or instructor values are empty
        if (empty($assignCar['type'] &&
          empty($assignCar['instructor']))) {
          // Initiate update method with assignCar values
          if ($this->carModel->updateCarOwner($assignCar)) {
            echo 'The car has been added successfully.<br> You will be redirected to the overview page shortly.';
            header('Refresh:3; url=' . URLROOT . '/drivingschoolowners/index');
          } else {
            echo 'The car failed to update. Please try again later. <br> You will be redirected to the overview page shortly.';
            header('Refresh: 3; url=' . URLROOT . '/drivingschoolowners/index');
          }
        } else {
          echo 'You did not select an instructor or car. Please try again<br>You will be redirected to the overview page shortly.';
          header('Refresh: 3; url=' . URLROOT . '/drivingschoolowners/index');
        }
      } else {
        // User did not send an assign request
        echo "It appears you did not submit an assign request...<br>We will redirect you to the overview.";
        header("Refresh:3; url=" . URLROOT . "/drivingschoolowners/index");
      }
    } else {
      // User did not request a POST method, he should not be on this page
      echo "It appears something went wrong...<br>We will redirect you to the overview.";
      header("Refresh:3; url=" . URLROOT . "/drivingschoolowners/index");
    }


    $this->view('drivingschoolowners/assign', $data);
  }
}
