<?php

namespace App\Repositories;

use App\Models\FieldOfPractice;


class FieldOfPracticeRepository {

    protected $fieldOfPractice;

    public function __construct(FieldOfPractice $fieldOfPractice)
    {
        $this->fieldOfPractice = $fieldOfPractice;
    }
    
    public function all() {
        return $this->fieldOfPractice->paginate(10);
    }

    public function store(array $data)
    {
        return $this->fieldOfPractice->create($data);
    }

    public function getById(string $id)
    {
        return $this->fieldOfPractice->findOrFail($id);
    }

    public function update(string $id, array $data)
    {
        $fieldOfPractice = $this->fieldOfPractice->findOrFail($id);
        $fieldOfPractice->update($data);
        return $fieldOfPractice;
    }

    public function delete(string $id)
    {
        return $this->fieldOfPractice->destroy($id);
    }
}