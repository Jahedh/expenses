<?php
/**
 * Created by PhpStorm.
 * User: Jahedh
 * Date: 27/11/2019
 * Time: 21:23
 */
//include __DIR__ . "/Expenses.php";
//
//$expenses = new Expenses(2021);
//
//$excelArray = [
//    0 => [
//        "Month Name",
//        "1st expenses day",
//        "2nd expenses day",
//        "Salary day"
//        ]];
//
//for($i = 1; $i <= 12; $i++){
//
//    $monthName = $expenses->getMonthName($i);
//    $firstWorkingDay = $expenses->firstWorkingDay($i);
//    $midMonth = $expenses->getMidMonthExpense($firstWorkingDay);
//    $lastWorkingDay = $expenses->getLastWorkingDay($i);
//    $excelArray[$i] = [$monthName,$firstWorkingDay,$midMonth,$lastWorkingDay];
//}
//
////$expenses->arrayToCSV($excelArray);

?>

<!DOCTYPE html>
<html>
<body>

<form action="download.php" method="post">
    File name:<br>
    <input type="text" name="filename">
    <br>
    Year:<br>
    <input type="number" name="year">
    <br><br>
    <input type="submit" value="Download">
</form>

</body>
</html>

