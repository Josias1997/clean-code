<?php

namespace CleanCode;
require('Shapes.php');

use PHPUnit\Framework\TestCase;

class ShapesTest extends TestCase{

    /*
     * @var Shapes
     */
    private $shapes;

    /**
     * @before
     */
    public function initWriter()
    {
        $this->shapes = new Shapes();
    }

    /**
     * @test
     */
    public function square()
    {
        $this->shapes->area("SQUARE", "30");
        $this->assertEquals("900\n", $this->shapes->toString());
    }

    /**
     * @test
     */
    public function rectangle()
    {
        $this->shapes->area("RECTANGLE", "50,20");
        $this->assertEquals("1000\n", $this->shapes->toString());
    }

    /**
     * @test
     */
    public function triangle()
    {
        $this->shapes->area("TRIANGLE", "50,20");
        $this->assertEquals("500\n", $this->shapes->toString());
    }

    /**
     * @test
     */
    public function squareAndTriangle()
    {
        $this->shapes->area("SQUARE", "30");
        $this->shapes->area("TRIANGLE", "40,20");
        $this->assertEquals("900\n400\n", $this->shapes->toString());
    }

}
