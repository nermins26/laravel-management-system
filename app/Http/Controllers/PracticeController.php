<?php

namespace App\Http\Controllers;

use App\Http\Requests\PracticeRequest;
use App\Services\FieldOfPracticeService;
use App\Services\PracticeService;

class PracticeController extends Controller
{
    protected $practiceService;
    protected $fieldOfPracticeService;

    public function __construct(PracticeService $practiceService, FieldOfPracticeService $fieldOfPracticeService)   
    {       
        $this->practiceService = $practiceService;
        $this->fieldOfPracticeService = $fieldOfPracticeService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $practices = $this->practiceService->getAllpractices();
        return view('practices.index', compact('practices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fieldsOfPractice = $this->fieldOfPracticeService->getAllFieldsOfPractice();
        return view('practices.create', compact('fieldsOfPractice'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PracticeRequest $request)
    {
        $this->practiceService->storePractice($request);
        return redirect()->route('practices.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $practice = $this->practiceService->getPractice($id);
        return view('practices.show', compact('practice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $practice = $this->practiceService->getPractice($id);
        $fieldsOfPractice = $this->fieldOfPracticeService->getAllFieldsOfPractice();
        return view('practices.edit', compact('practice', 'fieldsOfPractice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PracticeRequest $request, string $id)
    {
        $this->practiceService->updatePractice($request, $id);
        return redirect()->route('practices.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->practiceService->deletePractice($id);
        return redirect()->route('practices.index');
    }

    /**
     * Public api endpoint for all practices
     */
    public function indexJson()
    {
        $practices = $this->practiceService->getAllpractices();
        return response()->json($practices);
    }
}