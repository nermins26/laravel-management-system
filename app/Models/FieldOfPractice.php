<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class FieldOfPractice extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function practices()
    {
        return $this->belongsToMany(Practice::class, 'field_of_practice_practice');
    }
}
