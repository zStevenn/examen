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
    $data = null;

    $this->view('drivingschoolowners/index', $data);
  }
}
