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
    // Declare current date
    $currentdate = date("Y-m-d");

    // Retrieve all schedule data from database for a specific instructor
    $scheduledata = $this->instructorModel->getInstructorSchedule('konijn@google.com');

    // Generate table with columns date and name of previous lessons
    $schedulerow = '<table class="table">';
    $schedulerow .= '<thead><tr>';
    $schedulerow .= '<th>Date</th><th>Name</th>';
    $schedulerow .= '<th>Subjects</th>';
    $schedulerow .= '</tr></thead><tbody>';
    // Generate a table row for each datarow
    foreach ($scheduledata as $sd) {
      // Execute code if the date is in the past
      if ($sd->datum <= $currentdate) {
        $schedulerow .= '<tr>';
        $schedulerow .= '<td>' . $sd->datum . '</td>';
        $schedulerow .= '<td>' . $sd->naam . '</td>';
        $schedulerow .= '<td><a class="btn btn-primary" href="' . URLROOT . '/instructors/subject/' . $sd->id . '">Subjects</a></td>';
        $schedulerow .= '</tr>';
      } else {
      }
    }



    $data = [
      'scheduleinfo' => $schedulerow
    ];

    $this->view('instructors/index', $data);
  }
}
