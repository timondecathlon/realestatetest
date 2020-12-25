<?php

require '../Core/Entities/Employee.php'; 

class EmployeeTest extends \PHPUnit\Framework\TestCase
{
    private $employee;

    public function setUp(): void
    {

    }

    public function tearDown(): void
    {

    }

    /**
     * @dataProvider salaryProvider
     */
    public function testGetFinalSalary($salary, $age, $kids, $usingCar, $expected)
    {
        $employee = new \Bitkit\Core\Entities\Employee($salary, $age, $kids, $usingCar);
        $result = $employee->getFinalSalary();
        $this->assertEquals($expected, $result);
    }


    public function salaryProvider()
    {
        return [
            [6000, 26, 2, false, 4800],
            [4000, 52, 0, true, 3024],
            [5000, 36, 3, true, 3600]

        ];
    }

}