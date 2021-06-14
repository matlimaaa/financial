<?php

namespace App\Repositories\Contracts;

interface EmployeeRepositoryInterface
{
    public function getEmployees(int $per_page);
    public function getEmployeeByUuid(string $uuid);
    public function createNewEmployee(array $request);
    public function updateEmployee(array $request, string $uuid);
    public function deleteEmployee(string $uuid);
}