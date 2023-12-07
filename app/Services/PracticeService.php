<?php

namespace App\Services;

use App\Http\Requests\PracticeRequest;
use App\Repositories\PracticeRepository;
use Illuminate\Support\Facades\Storage;

class PracticeService {

    protected $practiceRepository;

    public function __construct(PracticeRepository $practiceRepository)
    {
        $this->practiceRepository = $practiceRepository;
    }

    public function getAllPractices()
    {
        return $this->practiceRepository->all();
    }

    public function storePractice(PracticeRequest $request)
    {
        $validatedData = $request->validated();
        return $this->practiceRepository->store($validatedData);
    }

    public function getPractice(string $id)
    {
        return $this->practiceRepository->getById($id);
    }

    public function updatePractice(PracticeRequest $request, string $id)
    {
        $validatedData = $request->validated();
        return $this->practiceRepository->update($id, $validatedData);
    }

    public function deletePractice(string $id)
    {
        return $this->practiceRepository->delete($id);
    }
}