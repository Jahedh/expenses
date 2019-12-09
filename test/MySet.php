<?php
/**
 * Created by PhpStorm.
 * User: Jahedh
 * Date: 28/11/2019
 * Time: 10:23
 */

class MySet
{

    public $mySet;


    public function __construct()
    {

        $this->mySet = [];

    }

    public function add($int)
    {

        $isDuplicate = $this->isDuplicate($int);

        if ($isDuplicate === true) {
            array_push($this->mySet, $int);
        }

    }

    public function length()
    {
        return count($this->mySet);
    }

    public function isDuplicate($int) :bool
    {

        if(in_array($int, $this->mySet) ){

            return false;
        }

        return true;
    }


}