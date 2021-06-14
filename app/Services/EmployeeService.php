<?php

namespace App\Services;

use App\Repositories\Contracts\EmployeeRepositoryInterface;

class EmployeeService
{
    protected $repository;
    
    public function __construct(EmployeeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getEmployees(int $per_page)
    {
        return $this->repository->getEmployees($per_page);
    }
    
    public function getEmployeeByUuid(string $uuid)
    {
        return $this->repository->getEmployeeByUuid($uuid);
    }

    public function createNewEmployee(array $request)
    {
        return $this->repository->createNewEmployee($request);
    }

    public function updateEmployee(array $request, $uuid)
    {
        return $this->repository->updateEmployee($request, $uuid);
    }
  
    public function deleteEmployee(string $uuid)
    {
        return $this->repository->deleteEmployee($uuid);
    }
}