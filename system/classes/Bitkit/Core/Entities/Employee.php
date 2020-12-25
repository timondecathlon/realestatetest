<?php

namespace Bitkit\Core\Entities;

class Employee
{
    protected $salary;
    protected $kidsAmount = 0;
    protected $age = 0;
    protected $usingCar = false;
    protected $taxAmount;
    protected static $baseTax = 0.2;
    protected static $ageOverPay = 50;
    protected static $ageOverPayAmount = 0.07;
    protected static $kidsTaxReduceValue = 0.02;
    protected static $minKidsAmountForTaxReduce = 2;
    protected static $carLeasePrice = 500;


    /**
     * Employee constructor.
     * @param float $salary
     * @param int $age
     * @param int $kidsAmount
     * @param bool $usingCar
     */
    public function __construct(float $salary, int $age, int $kidsAmount, bool $usingCar)
    {
        $this->salary = $salary;
        $this->age = $age;
        $this->usingCar = $usingCar;
        $this->taxAmount = static::$baseTax;
    }

    /**
     * getting the final salary for current employee
     *
     * @return float
     */
    public function getFinalSalary(): float
    {

        $this->kidsTaxReduce();

        $this->ageOverPay();

        $this->usingCompanyCar();

        $this->taxDeduct();

        return $this->salary;

    }


    /**
     * deduct final tax after all features
     */
    protected function taxDeduct()
    {
        $this->salary = $this->salary * (1 - $this->taxAmount);
    }

    /**
     * if employee has more than 2 kids his tax should be descreased
     */
    protected function kidsTaxReduce()
    {
        if ($this->kidsAmount > static::$minKidsAmountForTaxReduce) {

            $this->taxAmount = $this->taxAmount - static::$kidsTaxReduceValue;

        }
    }

    /**
     * if employee older than 50 years he gets extra cash
     */
    protected function ageOverPay()
    {
        if ($this->age > static::$ageOverPay) {

            $this->salary = $this->salary * (1 + static::$ageOverPayAmount);

        }
    }

    /**
     * Final salary decrease is employee using a company car
     */
    public function usingCompanyCar()
    {
        if ($this->usingCar) {

            $this->salary = $this->salary - static::$carLeasePrice;

        }

    }


}