<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreUpdateEmployee;
use App\Http\Resources\EmployeeResource;
use App\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index(Request $request)
    {
        /**
         * $request->get pega o valor do query
         * param, porém se não existir, ele joga 
         * como default o 15
         */

        $per_page = (int) $request->get('per_page', 15);

        $employees = $this->employeeService->getEmployees(
            $per_page
        );

        return EmployeeResource::collection($employees);
    }
    
    public function show($uuid)
    {
        if(!$employee = $this->employeeService->getEmployeeByUuid($uuid))
        {
            return response()->json(['message' => 'Not Found'], 404);
        }
        
        return new EmployeeResource($employee);
    }
    
    public function store(StoreUpdateEmployee $request)
    {
        $employee = $this->employeeService->createNewEmployee($request->all());
        return new EmployeeResource($employee);
    }

    public function update(StoreUpdateEmployee $request, $uuid)
    {
        $employee = $this->employeeService->updateEmployee($request->all(), $uuid);
        return new EmployeeResource($employee);
    }

    public function destroy(string $uuid)
    {
        return $this->employeeService->deleteEmployee($uuid);
    }
}
