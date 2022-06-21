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
    // Default values for view visitors/index.php
    $forminputs = [
      'firstname' => '',
      'infix' => '',
      'lastname' => '',
      'email' => '',
      'lessonpackage' => null,
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
        'lessonpackage' => (int)trim($_POST['lessonpackage']),
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
        empty($forminputs['firstnameError']) &&
        empty($forminputs['lastnameError']) &&
        empty($forminputs['infixError']) &&
        empty($forminputs['emailError']) &&
        empty($forminputs['lessonpackageError'])
      ) {
        // Call signupForLessonpackage function in model Visitor.php
        if ($this->visitorModel->signupForLessonpackage($_POST)) {
          echo "Thank you for choosing Easy Drive 4 All, " . $forminputs["firstname"] . "!";
          echo "<br> You have successfully signed up at our school. You will be redirected to our homepage shortly.";
          header("Refresh:5; url=" . URLROOT . "/homepages/index");
          exit;
        } else {
        }
      } else {
        // Give the error details to the view to display.
      }
    } else {
      // Nothing happens due to there being no POST values.
    }

    // Retrieve all lesson packages from the lessonpackage database
    $lessonpackages = $this->lessonpackageModel->getAllLessonpackages();

    // Turn all lesson packages into HTML Options for a select form
    $packageoptions = "";
    foreach ($lessonpackages as $lpnames) {
      // If lessonpackageid does not match with form input, print a non selected option
      if ($lpnames->lessonpackageid != $forminputs['lessonpackage']) {
        $packageoptions .= "<option value='" . $lpnames->lessonpackageid . "'>" . $lpnames->packagename . "</option>";
      } else {
        // If lessonpackageid matches with form input, print a selected option
        $packageoptions .= "<option selected value='" . $lpnames->lessonpackageid . "'>" . $lpnames->packagename . "</option>";
      }
    }

    // Give data to view
    $data = [
      'title' => "Lesson Packages",
      'packageoptions' => $packageoptions,
      'firstname' => $forminputs['firstname'],
      'infix' => $forminputs['infix'],
      'lastname' => $forminputs['lastname'],
      'email' => $forminputs['email'],
      'firstnameError' => $forminputs['firstnameError'],
      'lastnameError' => $forminputs['lastnameError'],
      'infixError' => $forminputs['infixError'],
      'emailError' => $forminputs['emailError'],
      'lessonpackageError' => $forminputs['lessonpackageError']
    ];
    $this->view('visitors/index', $data);
  }

  // Extra validation after data has been trimmed and removed of special characters
  private function validatePackageForm($data)
  {
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
    } elseif (!is_numeric($data['lessonpackage'])) {
      $data['lessonpackageError'] = 'Something went wrong selecting the lesson package.';
    }
    return $data;
  }

  public function test()
  {
    return "test";
  }
}
