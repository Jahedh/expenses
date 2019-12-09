<?php
/**
 * Created by PhpStorm.
 * User: Jahedh
 * Date: 09/12/2019
 * Time: 02:57
 */

include __DIR__ . "/Expenses.php";

$filename = $_POST['filename'];
$year = (isset($_POST['year']) ? $year = $_POST['year'] : null);
$expenses = new Expenses($year);

$excelArray = [
    0 => [
        "Month Name",
        "1st expenses day",
        "2nd expenses day",
        "Salary day"
    ]];

for($i = 1; $i <= 12; $i++){

    $monthName = $expenses->getMonthName($i);
    $firstWorkingDay = $expenses->firstWorkingDay($i);
    $midMonth = $expenses->getMidMonthExpense($firstWorkingDay);
    $lastWorkingDay = $expenses->getLastWorkingDay($i);
    $excelArray[$i] = [$monthName,$firstWorkingDay,$midMonth,$lastWorkingDay];
}

$expenses->arrayToCSV($excelArray, $filename);