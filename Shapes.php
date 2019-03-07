<?php
namespace CleanCode;
/**
 * Created by PhpStorm.
 * User: bjykologo
 * Date: 07/03/2019
 * Time: 09:21
 */
class Shapes {

    const RECTANGLE_SHAPE = "RECTANGLE";
    const SQUARE_SHAPE = "SQUARE";
    const TRIANGLE_SHAPE = "TRIANGLE";


    private $area = '';

    public function area($type, $dimensions)
    {
        if ($type !== self::SQUARE_SHAPE) {
            $dimensions = $this->convertToArray($dimensions);
        }
        switch($type)
        {
            case self::RECTANGLE_SHAPE:
                $this->areaRectangle($dimensions);
                break;

            case self::SQUARE_SHAPE:
                $this->areaSquare($dimensions);
                break;

            case self::TRIANGLE_SHAPE:
                $this->areaTriangle($dimensions);
                break;

        }
    }

    public function areaRectangle($dimensions)
    {
        $this->area .= (intval($dimensions[0]) * intval($dimensions[1]))."\n";
    }

    public function areaSquare($dimensions)
    {
        $this->area .= (intval($dimensions) * intval($dimensions))."\n";
    }

    public function areaTriangle($dimensions)
    {
        $this->area .= ((floatval($dimensions[0]) * floatval($dimensions[1]))/2)."\n";
    }

    public function convertToArray($dimensions)
    {
        return explode(',', $dimensions);
    }

    public function toString()
    {
        return $this->area;
    }
}