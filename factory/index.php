<?php
/**
 * Factory Pattern
 *
 * A class that is responsible for creating instances of another object
 */

class Spaceship
{
    public $color;

    public function __construct($color)
    {
        $this->color = $color;
    }
}

class SpaceshipFactory
{
    public static function create($color)
    {
        return new Spaceship($color);
    }
}

$spaceship = SpaceshipFactory::create('red');

var_dump($spaceship->color);
