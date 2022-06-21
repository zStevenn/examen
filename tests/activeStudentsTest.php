<?php


/**
 * Dit is de testclass voor de activeStudents controller class
 */


namespace TDD\Test;

require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\controllers\ActiveStudents;


 class ActiveStudentTest extends TestCase
 {
    public function testSayStudentName()
    {
        $ActiveStudent = new ActiveStudents();
        $output = $ActiveStudent->sayStudentName();
        $expected = "student";
        $message = "Er moet uitkomen student";

        $this->assertEquals($expected,
                            $output,
                            $message);

    }
 }