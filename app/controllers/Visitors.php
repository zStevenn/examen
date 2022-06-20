<?php

namespace TDD\controllers;

use TDD\libraries\Controller;

class Visitors extends Controller
{
  // Constructor
  public function __construct()
  {
    $this->visitorModel = $this->model('Visitor');
  }

  // Call index view
  public function index()
  {
    $data = [
      'title' => "Visitors Index"
    ];
    $this->view('visitors/index', $data);
  }
}
