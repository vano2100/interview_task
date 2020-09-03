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
        $this->salary = $salary;        
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