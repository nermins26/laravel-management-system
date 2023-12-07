<?php

namespace App\Services;

use App\Repositories\FieldOfPracticeRepository;
use App\Http\Requests\FieldOfPracticeRequest;


class FieldOfPracticeService {

    protected $fieldOfPracticeRepository;

    public function __construct(FieldOfPracticeRepository $FieldOfPracticeRepository)
    {
        $this->fieldOfPracticeRepository = $FieldOfPracticeRepository;
    }

    public function getAllFieldsOfPractice()
    {
        return $this->fieldOfPracticeRepository->all();
    }

    public function storeFieldOfPractice(FieldOfPracticeRequest $request)
    {
        $validatedData = $request->validated();
        return $this->fieldOfPracticeRepository->store($validatedData);
    }

    public function getFieldOfPractice(string $id)
    {
        return $this->fieldOfPracticeRepository->getById($id);
    }

    public function updateFieldOfPractice(FieldOfPracticeRequest $request, string $id)
    {
        $validatedData = $request->validated();
        return $this->fieldOfPracticeRepository->update($id, $validatedData);
    }

    public function deleteFieldOfPractice(string $id)
    {
        return $this->fieldOfPracticeRepository->delete($id);
    }
}