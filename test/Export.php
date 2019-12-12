<?php
/**
 * Created by PhpStorm.
 * User: Jahedh
 * Date: 12/12/2019
 * Time: 03:04
 */

interface Export
{

    public function export($array, $filename, $delimiter);

}