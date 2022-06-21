<?php


/**
 * Dit is de testclass voor de countries controller class
 */


namespace TDD\Test;

require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\controllers\Visitors;


class VisitorsTest extends TestCase
{
  public function testSayMyName()
  {
    $visitors = new Visitors();
    $output = $visitors->test();
    $expected = "test";
    $message = "Er moet uitkomen test";

    $this->assertEquals(
      $expected,
      $output,
      $message
    );
  }
}
