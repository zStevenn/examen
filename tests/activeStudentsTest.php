<?php


/**
 * Dit is de testclass voor de countries controller class
 */


namespace TDD\Test;

require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\controllers\ActiveStudents;

// opgegeven
class ActiveStudentTest extends TestCase
{
   public function testActiveStudentName()
   {
      $ActiveStudent = new ActiveStudents();
      $output = $ActiveStudent->SuperCooleTest();
      $expected = "supercooleretest";
      $message = "Er moet uitkomen supercooleretest";

      $this->assertEquals($expected,
                           $output,
                           $message);

   }
}