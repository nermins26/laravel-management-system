<?php

namespace App\Http\Controllers;

use App\Http\Requests\FieldOfPracticeRequest;
use App\Services\FieldOfPracticeService;

class FieldOfPracticeController extends Controller
{
    protected $fieldOfPracticeService;

    public function __construct(FieldOfPracticeService $fieldOfPracticeService)
    {
        $this->fieldOfPracticeService = $fieldOfPracticeService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fieldsOfPractice = $this->fieldOfPracticeService->getAllFieldsOfPractice();
        return view('fields-of-practices.index', compact('fieldsOfPractice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fields-of-practices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FieldOfPracticeRequest $request)
    {
        $this->fieldOfPracticeService->storeFieldOfPractice($request);
        return redirect()->route('fields-of-practice.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fieldOfPractice = $this->fieldOfPracticeService->getFieldOfPractice($id);
        return view('fields-of-practices.show', compact('fieldOfPractice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fieldOfPractice = $this->fieldOfPracticeService->getFieldOfPractice($id);

        return view('fields-of-practices.edit', compact('fieldOfPractice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FieldOfPracticeRequest $request, string $id)
    {
        $this->fieldOfPracticeService->updateFieldOfPractice($request, $id);
        return redirect()->route('fields-of-practice.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->fieldOfPracticeService->deleteFieldOfPractice($id);
        return redirect()->route('fields-of-practice.index');
    }
}
