<?php
/**
 * Created by PhpStorm.
 * User: Jahedh
 * Date: 27/11/2019
 * Time: 22:17
 */

use PHPUnit\Framework\TestCase;
include __DIR__ . "/../../Expenses.php";

class FirstTest extends TestCase {

    public function testJan(){

        $expenses = new Expenses();

        $var = $expenses->lastDayOfMonth(1);

        $this->assertEquals("2019-01-31", $var);

    }

    public function testFeb(){

        $expenses = new Expenses();

        $var = $expenses->lastDayOfMonth(2);

        $this->assertEquals("2019-02-28", $var);

    }

    public function testLeapYearFebruary(){

        $expenses = new Expenses(2020);

        $var = $expenses->lastDayOfMonth(2);

        $this->assertEquals("2020-02-29", $var);

    }

    public function testGetLastWorkingDayJan(){

        $expenses = new Expenses(2021);

        $lastWorkingDay = $expenses->getLastWorkingDay(1);

        $this->assertEquals("2021-01-29", $lastWorkingDay);
        
    }

    public function testLastWorkingDayFebLeapYear(){

        $expenses = new Expenses(2032);

        $lastWorkingDay = $expenses->getLastWorkingDay(2);

        $this->assertEquals("2032-02-27", $lastWorkingDay);

    }

    public function testGetFirstDayOfMonth(){

        $expenses = new Expenses(2022);

        $firstWorkingDay = $expenses->firstWorkingDay(1);

        $this->assertEquals("2022-01-03", $firstWorkingDay);

    }

    public function testGetMidMonthExpense(){

        $expenses = new Expenses(2022);

        $firstWorkingDay = $expenses->firstWorkingDay(1);
        $midMonthExpense = $expenses->getMidMonthExpense($firstWorkingDay);

        $this->assertEquals("2022-01-17", $midMonthExpense);
    }

    public function testGetMonthName() {

        $expenses = new Expenses();

        $monthName = $expenses->getMonthName(7);

        $this->assertEquals("July", $monthName);
    }

    public function testGetJanuaryArray2021() {

        $expenses = new Expenses(2021);

        $monthName = $expenses->getMonthName(1);
        $firstWorkingDay = $expenses->firstWorkingDay(1);
        $midMonth = $expenses->getMidMonthExpense($firstWorkingDay);
        $lastWorkingDay = $expenses->getLastWorkingDay(1);
        $array = [$monthName,$firstWorkingDay,$midMonth,$lastWorkingDay];

        $this->assertEqualsCanonicalizing(['January', '2021-01-01', '2021-01-15', '2021-01-29'], $array);
    }


}