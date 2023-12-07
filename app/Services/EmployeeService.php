<?php

namespace App\Services;

use App\Repositories\EmployeeRepository;
use App\Repositories\PracticeRepository;
use App\Http\Requests\EmployeeRequest;

class EmployeeService {

    protected $employeeRepository;
    protected $practiceRepository;

    public function __construct(EmployeeRepository $employeeRepository, PracticeRepository $practiceRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->practiceRepository = $practiceRepository;
    }

    public function getAllEmployees()
    {
        return $this->employeeRepository->all();
    }

    public function storeEmployee(EmployeeRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['practice_id'] = $validatedData['practice'];
        unset($validatedData['practice']);
        return $this->employeeRepository->store($validatedData);
    }

    public function getEmployee(string $id)
    {
        return $this->employeeRepository->getById($id);
    }

    public function updateEmployee(EmployeeRequest $request, string $id)
    {
        $validatedData = $request->validated();
        return $this->employeeRepository->update($id, $validatedData);
    }

    public function deleteEmployee(string $id)
    {
        return $this->employeeRepository->delete($id);
    }
}