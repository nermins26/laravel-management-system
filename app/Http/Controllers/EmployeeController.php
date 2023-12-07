<?php

namespace App\Http\Controllers;

use App\Services\EmployeeService;
use App\Services\PracticeService;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    protected $employeeService;
    protected $practiceService;

    public function __construct(EmployeeService $employeeService, PracticeService $practiceService)
    {
        $this->employeeService = $employeeService;
        $this->practiceService = $practiceService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = $this->employeeService->getAllEmployees();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $practices = $this->practiceService->getAllPractices();
        return view('employees.create', compact('practices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $this->employeeService->storeEmployee($request);
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = $this->employeeService->getEmployee($id);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $practices = $this->practiceService->getAllPractices();
        $employee = $this->employeeService->getEmployee($id);
        return view('employees.edit', compact('employee', 'practices'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, string $id)
    {
        $this->employeeService->updateEmployee($request, $id);
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->employeeService->deleteEmployee($id);
        return redirect()->route('employees.index');
    }
}
