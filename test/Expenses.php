<?php
/**
 * Created by PhpStorm.
 * User: Jahedh
 * Date: 05/12/2019
 * Time: 23:45
 */

class Expenses
{
    private $year;

    public function __construct(int $year = null)
    {

        if ($year == null) {
            $year = date("Y");
        }

        $this->year = $year;
    }

    public function lastDayOfMonth(int $month) :string {

        $date = date("Y-m-t", strtotime($this->year."-".$month."-1"));

        return $date;

    }

    public function firstWorkingDay(int $month) :string {

        $date = $this->year . "-" . $month . "-1";
        $firstWorkingDay = date('l', strtotime($date));

        if($firstWorkingDay == "Saturday") {
            $newdate = strtotime ('+2 day', strtotime($date));
            $firstWorkingDay = date ('Y-m-d', $newdate);
        }
        elseif($firstWorkingDay == "Sunday") {
            $newdate = strtotime ('+1 day', strtotime($date));
            $firstWorkingDay = date ( 'Y-m-d' , $newdate );
        } else {
            $firstWorkingDay = date ( 'Y-m-d' , strtotime($date ) );
        }

        return $firstWorkingDay;
    }

    public function getMidMonthExpense($firstWorkingDay) {

//        echo $firstWorkingDay;die;
//        $date = $this->year . "-" . $month . "-1";

        $newdate = strtotime ('+14 day', strtotime($firstWorkingDay));
        $midMonthExpenses = date ( 'Y-m-d' , $newdate );

        return $midMonthExpenses;
    }

    public function getLastWorkingDay($month){

        $date = $this->lastDayOfMonth($month);

        $lastworkingday = date('l', strtotime($date));

        if($lastworkingday == "Saturday") {
            $newdate = strtotime ('-1 day', strtotime($date));
            $lastworkingday = date ('Y-m-d', $newdate);
        }
        elseif($lastworkingday == "Sunday") {
            $newdate = strtotime ('-2 day', strtotime($date));
            $lastworkingday = date ( 'Y-m-d' , $newdate );
        } else {
            $lastworkingday = date ( 'Y-m-d' , strtotime($date ));
        }

        return $lastworkingday;
    }

    public function getMonthName($month){

        $dateObj   = DateTime::createFromFormat('!m', $month);
        $monthName = $dateObj->format('F'); // March

        return $monthName;
    }

}