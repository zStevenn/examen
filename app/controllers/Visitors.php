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

    // Default values for view visitors/index.php
    $forminputs = [
      'firstname' => '',
      'infix' => '',
      'lastname' => '',
      'email' => '',
      'lessonpackage' => '',
      'firstnameError' => '',
      'lastnameError' => '',
      'infixError' => '',
      'emailError' => '',
      'lessonpackageError' => ''
    ];

    // Check if POST value has been send
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      // Sanitize all POST values on HTML Chars
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

      // Trim all POST values and put them in the array
      $forminputs = [
        'firstname' => trim($_POST['firstname']),
        'infix' => trim($_POST['infix']),
        'lastname' => trim($_POST['lastname']),
        'email' => trim($_POST['email']),
        'lessonpackage' => trim($_POST['lessonpackage']),
        'firstnameError' => '',
        'lastnameError' => '',
        'infixError' => '',
        'emailError' => '',
        'lessonpackageError' => ''
      ];

      // Initiate validatePackageForm
      $forminputs = $this->validatePackageForm($forminputs);

      // Check if there are errors.
      if (
        empty($data['firstnameError']) &&
        empty($data['lastnameError']) &&
        empty($data['infixError']) &&
        empty($data['emailError']) &&
        empty($data['lessonpackageError'])
      ) {
        // Call signupForLessonpackage function in model Visitor.php
        if ($this->visitorModel->signupForLessonpackage($_POST)) {
        } else {
          
        }
      } else {
        // Give the error details to the view to display.
      }
    } else {
      // Nothing happens due to there being no POST values.
    }

    // Give data to view
    $data = [
      'title' => "Lesson Packages",
      'packageoptions' => $packageoptions,
      'formvalues' => $forminputs
    ];
    $this->view('visitors/index', $data);
  }

  // Extra validation after data has been trimmed and removed of special characters
  private function validatePackageForm($data)
  {
    var_dump($data);
    if (empty($data['firstname'])) {
      $data['firstnameError'] = 'You did not fill in a first name.';
    } elseif (filter_var($data['firstname'], FILTER_VALIDATE_EMAIL)) {
      $data['firstnameError'] = 'You filled in an email address.';
    } elseif (!preg_match('/^[a-zA-Z]*$/', $data['firstname'])) {
      $data['firstnameError'] = 'You used invalid characters in your first name.';
    }

    if (empty($data['lastname'])) {
      $data['lastnameError'] = 'You did not fill in a last name.';
    } elseif (filter_var($data['lastname'], FILTER_VALIDATE_EMAIL)) {
      $data['lastnameError'] = 'You entered an email address.';
    } elseif (!preg_match('/^[a-zA-Z]*$/', $data['lastname'])) {
      $data['lastnameError'] = 'You used invalid characters in your last name.';
    }

    if (filter_var($data['infix'], FILTER_VALIDATE_EMAIL)) {
      $data['infixError'] = 'You entered an email address.';
    } elseif (!preg_match('/^[a-zA-Z]*$/', $data['infix'])) {
      $data['infixError'] = 'You used invalid characters in your infix.';
    }

    if (empty($data['email'])) {
      $data['emailError'] = 'You did not fill in an email address.';
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
      $data['emailError'] = 'You did not fill in a correct email address.';
    }

    if (empty($data['lessonpackage'])) {
      $data['lessonpackageError'] = 'You have not selected a lesson package.';
    }
    return $data;
  }
}
