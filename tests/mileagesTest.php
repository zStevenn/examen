<?php

namespace TDD\Test;

require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';


use TDD\controllers\Mileages;
use PHPUnit\Framework\TestCase;

class mileagesTest extends TestCase
{
    public function testUpdate(){
        $mileages = new Mileages();
        $output = $mileages->index();
        $expected = null;
        $message = "Er hoort niets terug gegeven te worden";

        $this->assertEquals($expected,
                            $output,
                            $message
        );
    }
}
