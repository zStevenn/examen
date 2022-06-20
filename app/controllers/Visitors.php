<?php

namespace TDD\controllers;

use TDD\libraries\Controller;

class Visitors extends Controller
{
  // Constructor
  public function __construct()
  {
    // Call models visitor and lessonpackage
    $this->visitorModel = $this->model('Visitor');
    $this->lessonpackageModel = $this->model('Lessonpackage');
  }

  // Call index view
  public function index()
  {
    // Retrieve all lesson packages from the lessonpackage database
    $lessonpackages = $this->lessonpackageModel->getAllLessonpackages();

    // Turn all lesson packages into HTML Options for a select form
    $packageoptions = "";
    foreach ($lessonpackages as $lpnames) {
      $packageoptions .= "<option value='" . $lpnames->lessonpackageid . "'>" . $lpnames->packagename . "</option>";
    }

    // Give data to view
    $data = [
      'title' => "Lesson Packages",
      'packageoptions' => $packageoptions
    ];
    $this->view('visitors/index', $data);
  }

  // Call signup view
  public function signup()
  {
    $data = [
      'title' => "Visitors Signup"
    ];
    $this->view('visitors/signup', $data);
  }
}
