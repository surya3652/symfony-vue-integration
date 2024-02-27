<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmployeeRepository::class)
 */
class Employee
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $emp_id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $emp_name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $emp_designation;


    public function getEmpId(): int
    {
        return $this->emp_id;
    }

    public function setEmpId(int $emp_id): self
    {
        $this->emp_id = $emp_id;

        return $this;
    }

    public function getEmpName(): string
    {
        return $this->emp_name;
    }

    public function setEmpName(string $emp_name): self
    {
        $this->emp_name = $emp_name;

        return $this;
    }

    public function getEmpDesignation(): string
    {
        return $this->emp_designation;
    }

    public function setEmpDesignation(string $emp_designation): self
    {
        $this->emp_designation = $emp_designation;

        return $this;
    }
}
