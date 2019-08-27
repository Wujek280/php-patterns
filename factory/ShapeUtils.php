<?php

namespace ShapeUtils;

interface ShapeChildInterface {
    public function setBody();
}

abstract class Shape
{
    public $body = null;

    public function draw(){
        echo $this->body . "\n";
    }

    public function __construct(){
        $this->body = $this->setBody();
    }
}
