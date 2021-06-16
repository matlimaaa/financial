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

    public function getEmployees(int $per_page)
    {
        return $this->entity->paginate($per_page);
    }

    public function getEmployeeByUuid(string $uuid)
    {
        return $this->entity->where('uuid', $uuid)->first();
    }

    public function createNewEmployee(array $request)
    {
        $employee = $this->entity->create($request);
        return $employee;
    }
    
    public function updateEmployee(array $request, string $uuid)
    {
        if(!$employee = $this->entity->where('uuid', $uuid)->first())
            return response()->json(['message' => 'Not Found'], 404);

        $employee->update($request);

        return $employee;
    }

    public function deleteEmployee(string $uuid)
    {
        $employee = $this->entity->where('uuid', $uuid)->first();
        
        if(!$employee)
            return response()->json(['message' => 'Not Found'], 404 );

        $employee->delete();
        
        return response()->json([], 200);
    }
}