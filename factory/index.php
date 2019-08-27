<?php

require("./ShapeUtils.php");

class RectangleShape extends ShapeUtils\Shape implements ShapeUtils\ShapeChildInterface
{
    public function setBody(){
       return "[]";
    }
}

class CircleShape extends ShapeUtils\Shape implements ShapeUtils\ShapeChildInterface
{
    public function setBody(){
       return "O";
    }
}

class ShapeFactory{
    public static function create(string $type){
        if($type === "rectangle"){
            return new RectangleShape();
        }
        if($type === "circle"){
            return new CircleShape();
        }
    }
}


$rect001 = ShapeFactory::create("rectangle");
$circ001 = ShapeFactory::create("circle");

$rect001->draw();
$circ001->draw();