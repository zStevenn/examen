<?php


/**
 * Dit is de testclass voor de countries controller class
 */


namespace TDD\Test;

require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\controllers\Rijlessen;


 class RijlesTest extends TestCase
 {
    public function testSayMyName()
    {
        $rijlessen = new Rijlessen();
        $output = $rijlessen->getRijlesId();
        $expected = "5";
        $message = "Er moet uitkomen 5";

        $this->assertEquals($expected,
                            $output,
                            $message);

    }
 }