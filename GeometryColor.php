<?php
include 'Colorable.php';
include 'Shape.php';

class Circle extends Shape
{
    public $radius;

    public function __construct($name, $radius)
    {
        parent::__construct($name);
        $this->radius = $radius;
    }

    public function calculateArea()
    {
        return pi() * pow($this->radius, 2);
    }

    public function resize($percent)
    {
        $this->radius *= $percent / 100;
    }
}

class Rectangle extends Shape
{
    private $width;
    private $height;

    public function getWidths()
    {
        return $this->width;
    }

    public function getHeights()
    {
        return $this->height;
    }

    public function __construct($name, $width, $height)
    {
        parent::__construct($name);
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea()
    {
        return $this->width * $this->height;
    }

}

class Square extends Rectangle implements Colorable
{
    public function __construct($name, $height)
    {
        parent::__construct($name, $height, $height);
    }

    public function howToColor()
    {
        echo 'Color all four sides';
    }
}

$geometrys[0] = new Circle('circle', 50);
$geometrys[1] = new Rectangle('rectangle', 120, 220);
$geometrys[2] = new Square('square', 120);

foreach ($geometrys as $geometry) {
    if ($geometry instanceof Colorable) {
        $geometry->howToColor();
    } else {
        echo $geometry->show() . ' Area: ' . $geometry->calculateArea() . '<br>';
    }
}



