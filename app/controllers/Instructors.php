<?php

namespace TDD\controllers;

use TDD\libraries\Controller;

class Instructors extends Controller
{
  // Constructor
  public function __construct()
  {
    // Call models Instructor
    $this->instructorModel = $this->model('Instructor');
  }

  // Call index view
  public function index()
  {
    $data = null;

    $this->view('visitors/index', $data);
  }
}
