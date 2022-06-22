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

  // Call subject view
  public function subject($id)
  {
    // Declare empty variables
    $error = '';
    $subjecturl = '';

    // Check if $id is not empty and numeric
    if (!empty($id) && is_numeric($id)) {
      // Check if lesson id exists in database
      $idexists = $this->instructorModel->checkValidLesson($id);

      // If id exists in database, create a table of all lesson subjects
      if ($idexists) {
        // Request all subjects based on lesson ID
        $subjectdata = $this->instructorModel->getSubjectsByLessonid($id);

        $subjecturl = URLROOT . '/instructors/createSubject';

        // Generate table with subjects
        $subjectTable = '<table class="table">';
        $subjectTable .= '<thead><tr>';
        $subjectTable .= '<th>Subjects</th>';
        $subjectTable .= '</tr></thead><tbody>';

        // Create table rows based on returned data from $subjectdata
        if (!empty($subjectdata)) {
          // Generate a table row for every subject data in the database
          foreach ($subjectdata as $sd) {
            $subjectTable .= '<tr><td>' . $sd->onderwerp . '</td></tr>';
          }
          // Return default table row if there are no subjects in the database
        } else {
          $subjectTable .= '<tr><td>There are no subjects assigned to this lesson</td></tr>';
        }
      } else {
        $subjectTable = '';
        $error = 'This lesson ID does not exist. <br> You will be redirected to the lesson overview.';
        header("Refresh:0; url=" . URLROOT . "/instructors/index");
      }
    } else {
      $subjectTable = '';
      $error = 'The lesson subjects you are trying to find do not exist.<br> You will be redirected to the lesson overview.';
      header("Refresh:0; url=" . URLROOT . "/instructors/index");
    }

    $data = [
      'title' => 'Subject',
      'id' => $id,
      'error' => $error,
      'subjectTable' => $subjectTable,
      'subjecturl' => $subjecturl
    ];

    $this->view('instructors/subject', $data);
  }

  // Function to create a subject
  public function createSubject()
  {
  }
}
