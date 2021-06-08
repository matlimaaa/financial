<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Repositories\Contracts\EmployeeRepositoryInterface;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    protected $entity;

    public function __construct(Employee $employee)
    {
        $this->entity = $employee;
    }

    public function getEmployees()
    {
        return $this->entity->all();
    }
}