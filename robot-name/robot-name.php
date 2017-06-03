<?php

class Robot{
    private $name;
    private $nameList = [];
    static $prevNames = [];

    public function __construct() {
        $this->generateName();
   }

    public function getName()
    {
        if (!isset($this->name)) {
            $this->generateName();
        }
        return $this->name;
    }

    public function reset()
    {
        unset($this->name);
    }

    private function generateName()
    {
        //need a name in this format: [A-Z][A-Z][0-9][0-9][0-9]
        $num = str_pad(rand(0,999), 3, "0", STR_PAD_LEFT);
        $a1 = chr(rand(65,90));
        $a2 = chr(rand(65,90));
        $newName = $a1 . $a2  . $num;
        if(!$this->addNamesToList($newName)) {
            $this->generateName();
        }
    }

    private function addNamesToList($name){
        if(!in_array($name, $this->nameList) && !in_array($name, static::$prevNames)){
            $this->nameList[] = $name;
            static::$prevNames[] = $name;
            $this->name = $name;
           return true;
        } 
        return false;
    }

}
