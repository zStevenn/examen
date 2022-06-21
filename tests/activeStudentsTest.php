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
    public function testSayMyName()
    {
        $ActiveStudent = new ActiveStudents();
        $output = $ActiveStudent->sayMyName();
        $expected = "Arjan";
        $message = "Er moet uitkomen Arjan";

        $this->assertEquals($expected,
                            $output,
                            $message);

    }
 }