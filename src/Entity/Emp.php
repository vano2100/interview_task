<?php

namespace App\Entity;

class Emp
{
    protected $name;
    protected $salary;
    protected $mortgage;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary)
    {
        $intSalary = (int)$salary;
        if ($intSalary <= 50000){
            $this->salary = $intSalary * 0.87;
        } else {
            $this->salary = ($intSalary - 50000) * 0.82 + 50000 * 0.87;
        }
    }

    public function getMortgage()
    {
        return $this->mortgage;
    }

    public function setMortgage($mortgage)
    {
        $this->mortgage = $mortgage;
    }
}