<?php

namespace App\Repositories;

use App\Models\Practice;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PracticeRepository {

    protected $practice;

    public function __construct(Practice $practice)
    {
        $this->practice = $practice;
    }
    
    public function all() {
        return $this->practice->paginate(10);
    }

    public function store(array $data)
    {
        $fieldsOfPracticeIds = $data['fields_of_practice'];
        unset($data['fields_of_practice']);

        $imageUrl = null;
        if (isset($data['image'])) {
            $imagePath = $data['image']->store('public');
            $imageUrl = Storage::url($imagePath);
            unset($data['image']);
        }

        try {
            DB::transaction(function () use ($data, $fieldsOfPracticeIds, $imageUrl, &$practice) {
                $practice = $this->practice->create($data);
                $practice->fieldsOfPractice()->attach($fieldsOfPracticeIds);
    
                if ($imageUrl) {
                    $practice->images()->create(['url' => $imageUrl]);
                    // TODO: implement storing additional metadata for image
                }
            });
        } catch (Exception $e) {
            if ($imageUrl) {
                Storage::delete($imagePath);
            }
            throw $e;
        }
    
        return $practice;
    }

    public function getById(string $id)
    {
        return $this->practice->findOrFail($id);
    }

    public function update(string $id, array $data)
    {
        $fieldsOfPracticeIds = $data['fields_of_practice'];
        unset($data['fields_of_practice']);

        $newImageUrl = null;
        if (isset($data['image'])) {
            $newImagePath = $data['image']->store('public');
            $newImageUrl = Storage::url($newImagePath);
            unset($data['image']);
        }

        try {
            DB::transaction(function () use ($id, $data, $fieldsOfPracticeIds, $newImageUrl, &$practice) {
                $practice = $this->practice->findOrFail($id);
                $practice->update($data);

                $practice->fieldsOfPractice()->sync($fieldsOfPracticeIds);

                if($newImageUrl) {
                    if ($practice->images()->exists()) {
                        $currentImage = $practice->images()->first();
                        Storage::delete(str_replace('storage', 'public', $currentImage->url));
                        $currentImage->update(['url' => $newImageUrl]);
                    } else {
                        $practice->images()->create(['url' => $newImageUrl]);
                    }
                }
            });
        } catch (Exception $e) {
            if ($newImageUrl) {
                Storage::delete($newImagePath);
            }
            throw $e;
        }
        return $practice;
    }

    public function delete(string $id)
    {
        try {
            DB::transaction(function () use ($id) {
                $practice = $this->practice->findOrFail($id);
    
                $practice->fieldsOfPractice()->detach();
    
                if ($practice->images()->exists()) {
                    $currentImage = $practice->images()->first();
                    $imagePath = str_replace(Storage::url(''), '', $currentImage->url);
                    Storage::delete($imagePath);
                    $currentImage->delete();
                }

                $practice->delete();
            });
        } catch (Exception $e) {
            throw $e;
        }
    }
}