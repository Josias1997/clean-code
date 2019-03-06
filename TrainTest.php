<?php
namespace  CleanCode;

require('./Train.php');
use PHPUnit\Framework\TestCase;

class TrainTest extends TestCase{

    /**
     * @test
     */
    public function passengerTrain() {
        $train = new Train("HPP");
        $this->assertEquals("<HHHH::|OOOO|::|OOOO|", $train->print());
    }

    /**
     * @test
     */
    public function restaurantTrain() {
        $train = new Train("HPRP");
        $this->assertEquals("<HHHH::|OOOO|::|hThT|::|OOOO|", $train->print());
    }

    /**
     * @test
     */
    public function cargoTrain() {
        $train = new Train("HCCC");
        $this->assertEquals("<HHHH::|____|::|____|::|____|", $train->print());
        $train->fill();
        $this->assertEquals("<HHHH::|^^^^|::|____|::|____|", $train->print());
        $train->fill();
        $this->assertEquals("<HHHH::|^^^^|::|^^^^|::|____|", $train->print());
        $train->fill();
        $this->assertEquals("<HHHH::|^^^^|::|^^^^|::|^^^^|", $train->print());
        $this->assertFalse($train->fill());
    }

    /**
     * @test
     */
    public function mixedTrain() {
        $train = new Train("HPCPC");
        $this->assertEquals("<HHHH::|OOOO|::|____|::|OOOO|::|____|", $train->print());
        $train->fill();
        $this->assertEquals("<HHHH::|OOOO|::|^^^^|::|OOOO|::|____|", $train->print());
        $train->fill();
        $this->assertEquals("<HHHH::|OOOO|::|^^^^|::|OOOO|::|^^^^|", $train->print());
        $this->assertFalse($train->fill());
    }
}
