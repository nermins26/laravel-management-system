<?php

namespace App\Repositories;

use App\Models\Employee;

class EmployeeRepository {

    protected $employee;

    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }
    
    public function all() {
        return $this->employee->paginate(10);
    }

    public function store(array $data) {
        return $this->employee->create($data);
    }

    public function getById(string $id)
    {
        return $this->employee->findOrFail($id);
    }

    public function update(string $id, array $data) 
    {
        $employee = $this->employee->findOrFail($id);
        $employee->update($data);
        return $employee;
    }

    public function delete(string $id)
    {
        return $this->employee->destroy($id);
    }
}