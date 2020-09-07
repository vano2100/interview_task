<?php

namespace App\Entity;

use App\Repository\EmployeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=EmployeRepository::class)
 */
class Employe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $salary;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $mortgage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSalary(): ?int
    {
        return $this->salary;
    }

    public function setSalary(int $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    public function getMortgage(): ?bool
    {
        return $this->mortgage;
    }

    public function setMortgage(?bool $mortgage): self
    {
        $this->mortgage = $mortgage;

        return $this;
    }

    /**
     * @Assert\IsTrue(message = "Salary with mortgage cannot be less 40000")
     */
    public function isSalaryLegal(): bool
    {
        if ($this->mortgage && $this->salary < 40000)
        {
            return false;
        } else {
            return true;
        }
    }
}
