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
    // Retrieve all schedule data from database for a specific instructor
    $scheduledata = $this->instructorModel->getInstructorSchedule('konijn@google.com');

    foreach ($scheduledata as $sd) {
    }

    $scheduleinfo = "";

    $data = [
      'scheduleinfo' => $scheduleinfo
    ];

    $this->view('instructors/index', $data);
  }
}
