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

    public function arrayToCSV($array, $filename = 'expenses.csv', $delimiter = ',', $enclosure = '"', $escape_char = "\\"){

        // open raw memory as file so no temp files needed, you might run out of memory though
        $f = fopen('php://memory', 'w');
        // loop over the input array
        foreach ($array as $line) {
            // generate csv lines from the inner arrays
            fputcsv($f, $line, $delimiter);
        }
        // reset the file pointer to the start of the file
        fseek($f, 0);
        // tell the browser it's going to be a csv file
        header('Content-Type: application/csv');
        // tell the browser we want to save it instead of displaying it
        header('Content-Disposition: attachment; filename="'.$filename.'";');
        // make php send the generated csv lines to the browser
        fpassthru($f);

    }

}