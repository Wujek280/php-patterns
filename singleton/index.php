<?php

class Singleton{

  public static $instance;

  public static function getInstance(){
    Singleton::$instance = new Singleton();
    return Singleton::$instance;
  }

  private function __construct(){ }

  public function doSth(){
    return "Some Work";
  }
}

$db = Singleton::getInstance();

echo $db->doSth();